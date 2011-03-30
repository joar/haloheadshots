<?php

/**
 * 
 * Generated Proxy Class : reachStatsApiClass (to interact with SOAP server at http://www.bungie.net/api/reach/ReachApiSoap.svc?wsdl)
 * @package reachStatsApi
 * @version 1.00
 * @author www.ApiGenerator.com - Copyright (c) 2010. All rights reserved.
 * 
 * We take no responsibility for the accuracy of this generated code. Use or edit at your own risk.
 * 
 */

class reachStatsApi {
	var $client = null;
	var $soapUrl = 'http://www.bungie.net/api/reach/ReachApiSoap.svc?wsdl';
	var $options = array(); 
	
	/**
	 * 
	 * Class: reachStatsApi - Construct Method
	 * 
	 */
	
	function __construct()
	{
	$this->client = new SoapClient($this->soapUrl, $this->options);
	//Insert Additional Constructor Code
	}
	
	/**
	 * 
	 * Class: reachStatsApi - Destruct Method
	 * 
	 */
	
	function __destruct()
	{
	unset ($this->client);
	//Insert Destructor Code
	}
	
	function GetGameMetadata($parameters ){
		try {
			$funcRet = $this->client->GetGameMetadata($parameters );
		} catch ( Exception $e ) {
			echo '(GetGameMetadata) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetGameHistory($parameters ){
		try {
			$funcRet = $this->client->GetGameHistory($parameters );
		} catch ( Exception $e ) {
			echo '(GetGameHistory) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetGameDetails($parameters ){
		try {
			$funcRet = $this->client->GetGameDetails($parameters );
		} catch ( Exception $e ) {
			echo '(GetGameDetails) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerDetailsWithStatsByMap($parameters ){
		try {
			$funcRet = $this->client->GetPlayerDetailsWithStatsByMap($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerDetailsWithStatsByMap) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerDetailsWithStatsByPlaylist($parameters ){
		try {
			$funcRet = $this->client->GetPlayerDetailsWithStatsByPlaylist($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerDetailsWithStatsByPlaylist) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerDetailsWithNoStats($parameters ){
		try {
			$funcRet = $this->client->GetPlayerDetailsWithNoStats($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerDetailsWithNoStats) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerFileShare($parameters ){
		try {
			$funcRet = $this->client->GetPlayerFileShare($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerFileShare) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetFileDetails($parameters ){
		try {
			$funcRet = $this->client->GetFileDetails($parameters );
		} catch ( Exception $e ) {
			echo '(GetFileDetails) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerRecentScreenshots($parameters ){
		try {
			$funcRet = $this->client->GetPlayerRecentScreenshots($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerRecentScreenshots) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerFileSets($parameters ){
		try {
			$funcRet = $this->client->GetPlayerFileSets($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerFileSets) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerFileSetFiles($parameters ){
		try {
			$funcRet = $this->client->GetPlayerFileSetFiles($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerFileSetFiles) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function GetPlayerRenderedVideos($parameters ){
		try {
			$funcRet = $this->client->GetPlayerRenderedVideos($parameters );
		} catch ( Exception $e ) {
			echo '(GetPlayerRenderedVideos) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}
	
	
	
	function ReachFileSearch($parameters ){
		try {
			$funcRet = $this->client->ReachFileSearch($parameters );
		} catch ( Exception $e ) {
			echo '(ReachFileSearch) SOAP Error: - ' . $e->getMessage ();
		}
		return $funcRet; 
	}		
}