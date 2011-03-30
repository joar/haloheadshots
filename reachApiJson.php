<?php
/*
* Halo: Reach API PHP Class
* Released under a creative commons GNU General Public License
* http://creativecommons.org/licenses/GPL/2.0/
* Originally created and written by A Baked Grunt/iGrunt,
* and released on the Bungie.net Reach API Group.
* Please keep this notice intact. :)
* 
* Small fixes and memcache implementation by Joar Wandborg <http://github.com/jwandborg>
*/

class reachJsonApi {

	/*
	* Instance variables
	*/
	private $apikey;
	private $apiService;
	private $userAgent = 'reachApiJson/1.0';
	private $assoc;
	public $memcache;
	private $memcacheServer = 'localhost';
	private $memcachePort = 11211;

	/*
	* Constructor
	*/
	public function __construct($apikey, $returnType=OBJECT, $cacheMechanism = 'memcache' )
	{
		$this->apiService = "http://www.bungie.net/api/reach/reachapijson.svc"; 
		$this->apikey = $apikey;
		if($returnType == ASSOC_ARRAY) {
			$this->assoc = true;
		} else {
			$this->assoc = false;
		}
		switch( $cacheMechanism ) {
			case 'memcache':
				$this->memcache = new Memcache;
				if ( ! $this->memcache->connect( $this->memcacheServer, $this->memcachePort ) ) {
					throw new Exception('Memcache could not connect');
				}
				#var_dump( $this->memcache->getExtendedStats() );
				break;
		}
	}
	
	private function cache( $key, $data, $flags = false, $expire = 3600 ) {
		if ( ( $cacheData = $this->memcache->get( $key, $flags ) ) ) {
			return $cacheData;
		} else {
			if ( ! $this->memcache->set( $key, $data, $flags, $expire ) ) {
				throw new Exception('Could not set data');
			}
			return $data;
		}
	}
	public function cacheSet( $key, $data, $flags = false, $expire = 3600 ) {
		if ( ! $this->memcache->set( $key, $data, $flags, $expire ) ) {
			throw new Exception('Could not set cache ' . $key );
		} else {
			return true;
		}
	}
	
	public function cacheGet( $key, $flags = false ) {
		if ( $this->memcache->get( $key, $flags ) ) {
			global $reachTools; $reachTools->log( $key . ': Cache hit');
			return $this->memcache->get( $key, $flags );
		} else {
			global $reachTools; $reachTools->log( $key . ': Cache miss');
			#var_dump( $this->memcache->get( $key ) );
			return false;
		}
	}

	/*
	* cURL function
	*/
	private function API_cURL($endpoint) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->apiService . $endpoint);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}

	/*
	* API Functions as described in the official
	* Reach stats API documentation <http://haloreachapi.net/wiki/Official_stats_API_documentation>
	*/
	public function getGameMetadata() {
		$cacheKey = __FUNCTION__ . ':';
		if ( $cacheData = $this->cacheGet( $cacheKey ) ) {
			return $cacheData;
		} else {
			$json_result = $this->API_cURL("/game/metadata/{$this->apikey}");
			$returnData = json_decode($json_result, $this->assoc);
			$this->cache( $cacheKey, $returnData );
			return $returnData;
		}
	}
	
	/*
	 * Undocumented
	 */
	public function getGameHistory($gamertag, $variant_class, $iPage) {
		$gamertag = rawurlencode($gamertag);
		$json_result = cURL("/player/gamehistory/{$this->apikey}/{$gamertag} /{$variant_class}/{$iPage}");
		return json_decode($json_result, $this->assoc);
	}
	
	/*
	 * Undocumented
	 */
	public function getGameDetails($gameID) {
		$json_result = $this->API_cURL("/game/details/{$this->apikey}/{$gameID}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getPlayerDetailsWithStatsByMap($gamertag) {
		$gamertag = rawurlencode($gamertag);
		$json_result = $this->API_cURL("/player/details/bymap/{$this->apikey}/{$gamertag}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getPlayerDetailsWithStatsByPlaylist($gamertag) {
		$gamertag = rawurlencode($gamertag);
		$json_result = $this->API_cURL("/player/details/byplaylist/{$this->apikey}/{$gamertag}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getPlayerDetailsWithNoStats($gamertag) {
		$cacheKey = __FUNCTION__ . ':' . strtolower( $gamertag );
		#var_dump($cacheKey);
		if ( $cacheData = $this->cacheGet( $cacheKey ) ) {
			return $cacheData;
		} else {
			$gamertag = rawurlencode($gamertag);
			$json_result = $this->API_cURL("/player/details/nostats/{$this->apikey}/{$gamertag}");
			$returnData = json_decode($json_result, $this->assoc);
			$this->cache( $cacheKey, $returnData );
			return $returnData;
		}
	}

	/*
	 * Undocumented
	 */
	public function getPlayerFileShare($gamertag) {
		$gamertag = rawurlencode($gamertag);
		$json_result = $this->API_cURL("/file/share/{$this->apikey}/{$gamertag}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getFileDetails($fileID) {
		$json_result = $this->API_cURL("/file/details/{$this->apikey}/{$fileID}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getPlayerRecentScreenshots($gamertag) {
		$gamertag = rawurlencode($gamertag);
		$json_result = $this->API_cURL("/file/screenshots/{$this->apikey}/{$gamertag}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getPlayerFileSets($gamertag) {
		$gamertag = rawurlencode($gamertag);
		$json_result = $this->API_cURL("/file/sets/{$this->apikey}/{$gamertag}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getPlayerFileSetFiles($gamertag, $fileSetID) {
		$gamertag = rawurlencode($gamertag);
		$json_result = $this->API_cURL("/file/sets/files/{$this->apikey}/{$gamertag}/{$fileSetID}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function getPlayerRenderedVideos($gamertag, $iPage) {
		$gamertag = rawurlencode($gamertag);
		$json_result = $this->API_cURL("/file/videos/{$this->apikey}/{$gamertag}/{$iPage}");
		return json_decode($json_result, $this->assoc);
	}

	/*
	 * Undocumented
	 */
	public function reachFileSearch($file_category, $mapFilter, $engineFilter, $dateFilter, $sortFilter, $iPage, $tags) {
		$json_result = $this->API_cURL("/file/search/{$this->apikey}/{$file_category}/{$mapFilter}/{$engineFilter}/{$dateFilter}/{$sortFilter}/{$iPage}?tags={$tags}");
		return json_decode($json_result, $this->assoc);
	}
}