<?php

class reachApiTools {
	const bungieUrl = 'http://www.bungie.net';
	private $logStorage;
	private $cloudFiles;
	private $cloudFilesContainer;
	public function getEmblemUri( $reachEmblem, $size = 100 ) {
		return self::bungieUrl . '/Stats/emblem.ashx?s=' . $size
		. '&0=' . $reachEmblem->change_colors[0]
		.	'&1=' . $reachEmblem->change_colors[1]
		. '&2=' . $reachEmblem->change_colors[2]
		. '&3=' . $reachEmblem->change_colors[3]
		. '&fi=' . $reachEmblem->foreground_index
		. '&bi=' . $reachEmblem->background_index
		. '&fl=' . $reachEmblem->flags
		. '&m=3';
	}
	public function __construct() {
		if ( config::useCloudFiles ) {
			$cloudFilesAuth = new CF_Authentication( config::cloudFilesUser, config::cloudFilesKey );
			$cloudFilesAuth->ssl_use_cabundle();
			$cloudFilesAuth->authenticate();
			$this->cloudFiles = new CF_Connection( $cloudFilesAuth );
			$this->cloudFilesContainer = $this->cloudFiles->get_container('haloheadshots');
			self::log( $this->cloudFilesContainer->list_objects() );
		}
	}
	public function getLogEntries() {
		return $this->logStorage;
	}
	public function reachDateToUnixTimestamp( $reachDate ) {
		preg_match('#/Date\((\d{10})#', $reachDate, $_matches );
		return (int)$_matches[1];
	}
	public function convertReachDate( $reachDate ) {
		return self::reachDateToUnixTimestamp( $reachDate );
	}
	public function cacheImage( $key, $imageUrl, $fileExtension = 'png' ) {
		try {
			$image = $this->cloudFilesContainer->get_object( $key );
			#self::log( $image );
			return $image->public_uri();
		} catch (NoSuchObjectException $e ) {
			$image = $this->cloudFilesContainer->create_object( $key );
			$data = file_get_contents( $imageUrl );
			$filename = '/dev/shm/' . rand(1, 9999) . '.' . $fileExtension;
			file_put_contents( $filename, $data );
			
			$image->load_from_filename( $filename );
			#self::log( $filename );
			#self::log( $image );
			return $image->public_uri();
		}
	}
	public function log( $data ) {
		$backtrace = debug_backtrace( true );
		#var_dump( $backtrace );
		if ( $backtrace[1]['function'] && $backtrace[1]['class'] ) {
			$handleStart = $backtrace[1]['class'] . '::' . $backtrace[1]['function'];
		} else if ( $backtrace[1]['function'] ) {
			$handleStart = $backtrace[1]['function'];
		} else if ( ! $backtrace[1] ) {
			$handleStart = preg_replace('#^.*/([^/]+)$#', '$1', $backtrace[0]['file'] );
		}
		
		$this->logStorage[ $handleStart . '<span style="display: none;">' . rand(0,999) . '</span>'] = $data;
	}
}