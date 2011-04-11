<?php
require 'config.php';

# This script is heavily dependent on the reachApiTools class
require 'reachApiTools.php';

require 'reachApiJson.php';
require 'Savant3.php';
require 'tools.class.php';
require '/home/jwandborg/git/php-cloudfiles/cloudfiles.php';
require '/home/jwandborg/git/predis/lib/Predis.php'; # // Not needed as long as ajax/autocomplete isn't working.

ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.7 (KHTML, like Gecko) Chrome/7.0.517.8 Safari/534.7');

$reachTools = new reachApiTools;

function shutDownFunction() {
	# Empty
}

register_shutdown_function('shutDownFunction');

$api = new reachJsonApi( config::reachKey );


$page = new Savant3;
$nav = new Savant3;
$page->navigation = $nav->fetch('templates/navigation.tpl.php');


switch ( $_GET['p'] ) {
	case 'phpinfo':
		phpinfo();
		break;
	case 'ajax':
		$page->ajax = true;
		/* Deactivated, this does not even work at the moment.
		 * You can however use this as a sketch of what I have though the search autocomplete to be like 
		switch ( $_GET['op'] ) {
			case 'gamertagAutocomplete':
				$result = $api->cacheGet('gamertagAutocomplete');
				foreach ( (array)$result as $key => $val ) {
					if ( stristr( $val['gamertag'], $_GET['str'] ) ) {
						$found[] = $result[ $key ];
					}
				}
				#tools::preint_r( $found );
				echo json_encode( $found );
				break;
		}*/
		/*
		$redis = new Redis();
		if(!$redis->exists(":compl")) {
			echo "Loading entries in the Redis DB\n";
			$file = file("female-names.txt");
			foreach($file as $line) {
				$line = trim($line);
				for($i=0 ; $i < strlen($line); $i++) {
					$prefix = substr($line, 0, $i);
					$redis->zAdd(":compl", 0,$prefix);
				}
				$redis->zAdd(":compl", 0, $line . "*");
			}
		} else {
			echo "NOT loading entries, there is already a 'compl' key \n";
		}
		
		function complete($redis, $prefix, $count) {
			$results = array();
			$rangeLen = 50;
			$start = $redis->zRank(":compl", $prefix);
			if(!$start) {
				return $results;
			}
		
			while( count( $results ) != $count ) {
				$range = $redis->zRange(":compl", $start, $start+$rangeLen-1);
				$start += $rangeLen;
				if(!$range || count($range) == 0) {
					break;
				}
				foreach( $range as $entry ) {
					$minLen = min( strlen( $entry ), strlen( $prefix ) );
					if ( substr( $entry, 0, $minLen ) !=  substr($prefix, 0, $minLen ) ) {
						$count = count($results);
					}
					if ( substr($entry, -1) == "*" && count($results) != $count ) {
						$results[] = substr($entry, 0, -1);
					}
				}
			}
			return $results;
		}
		
		$results = complete($redis, "marcell", 50);
		foreach($results as $res) {
			echo $res . "\n";
		}
		*/
		break;
	case 'headshots':
		$result = $api->getPlayerDetailsWithStatsByPlaylist( $_GET['gt'] );
		$reachTools->log( $result );
		break;
	default:
		$metadata = $api->getGameMetadata();
		$result = $api->getPlayerDetailsWithNoStats( $_GET['gt'] ? $_GET['gt'] : 'Stvafel');
		$page->title = 'Dev - Haloheadshots';
		
		$reachTools->log( $result );
		
		$playerDetails = new Savant3;
		$playerDetails->data = $result;
		
		$node = new Savant3;
		
		# Map commendation data
		foreach ( $result->Player->CommendationState as $key => &$val ) {
			$val->Data = $metadata->Data->AllCommendationsById[ $val->Key ]->Value;
		}
		
		# Sort commendations by best
		#usort();
		function calculateCommendationValue( $val, $iron, $bronze, $silver, $gold, $onyx, $max ) {
			$points = (object)array(
				'normal' => 0,
				'bonus' => 0
			);
			if ( $val >= $iron ) {
				$points->normal++;
				$valueSurplus = $val - $iron;
				$pointsToNextRankFromThisRank = $bronze - $iron;
			}
			if ( $val >= $bronze ) {
				$points->normal++;
				$valueSurplus = $val - $bronze;
				$pointsToNextRankFromThisRank = $silver - $bronze;
			}
			if ( $val >= $silver ) {
				$points->normal++;
				$valueSurplus = $val - $silver;
				$pointsToNextRankFromThisRank = $gold - $silver;
			}
			if ( $val >= $gold ) {
				$points->normal++;
				$valueSurplus = $val - $gold;
				$pointsToNextRankFromThisRank = $onyx - $gold;
			}
			if ( $val >= $onyx ) {
				$points->normal++;
				$valueSurplus = $val - $onyx;
				$pointsToNextRankFromThisRank = $max - $onyx;
			}
			if ( $val >= $max ) {
				$points->normal++;
			}
		}
		function sortCommendationsDesc( $a, $b ) {
			#if ( $a->Value >= $a->Data->Iron )
		}
		
		if ( $result->Player && $_GET['gt'] ) {
			$node->title = 'View player - HHS';
			$gamerTagAutocomplete = $api->cacheGet('gamertagAutocomplete');
			if ( empty( $gamerTagAutocomplete[ $result->Player->gamertag ] ) ) {
				$gamerTagAutocomplete[ $result->Player->gamertag ] = array(
					'gamertag' => $result->Player->gamertag,
					'serviceTag' => $result->Player->service_tag
				);
				if ( $api->cacheGet('gamertagAutocomplete') ) {
					$api->memcache->replace('gamertagAutocomplete', $gamerTagAutocomplete, false, 60 * 60 * 24 * 30 );
				} else {
					if ( ! $api->cacheSet('gamertagAutocomplete', $gamerTagAutocomplete, false, 60 * 60 * 24 * 30 ) ) {
						throw new Exception('Could not set cache for gamertagAutocomplete');
					}
				}
			}
		} else if ( $result->Player && ! $_GET['gt'] ) {
			$node->title = 'Home - HHS';
		}	else {
			$node->title = 'Error - HHS';
		}
		
		if ( $result->Player ) {
			if ( $result->Player->games_total ) {
				$result->Player->games_per_day = $result->Player->games_total / max( 1, ( 
					reachApiTools::convertReachDate( $result->Player->last_active ) - reachApiTools::convertReachDate( $result->Player->first_active ) 
				) / 86400 );
			}
			if ( $result->Player->daily_challenges_completed ) {
				$result->Player->daily_challenges_per_day = $result->Player->daily_challenges_completed / max( 1, ( 
					reachApiTools::convertReachDate( $result->Player->last_active ) - reachApiTools::convertReachDate( $result->Player->first_active ) 
				) / 86400 );
			}
			if ( $result->Player->weekly_challenges_completed ) {
				$result->Player->weekly_challenges_per_week = $result->Player->weekly_challenges_completed / max( 1, ( 
					reachApiTools::convertReachDate( $result->Player->last_active ) - reachApiTools::convertReachDate( $result->Player->first_active ) 
				) / 86400 * 7 );
			}
		}
		
		$node->contents[] = $playerDetails->fetch('templates/playerDetails.tpl.php');
		$page->content = $node->fetch('templates/node.tpl.php');
		break;
}
$page->logs = $reachTools->getLogEntries();
$page->display('templates/page.tpl.php');