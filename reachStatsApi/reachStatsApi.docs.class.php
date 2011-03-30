
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


/**
 * SOAP Function: GetGameMetadata
 * 	Type Description:
 * 
 * 	 GetGameMetadata (string identifier)
 * 
 * 	 GetGameMetadataResponse (MetaDataResponse GetGameMetadataResult)
 * 
 * 		GetGameMetadataResult = (GameMetadata Data)
 * 
 * 			Data = (ArrayOfKeyValueOfintCommendation93kMfpyL AllCommendationsById,ArrayOfKeyValueOfintEnemyFBdO_PvP0 AllEnemiesById,ArrayOfKeyValueOfunsignedIntMapFBdO_PvP0 AllMapsById,ArrayOfKeyValueOfintMedalFBdO_PvP0 AllMedalsById,ArrayOfKeyValueOfintWeaponFBdO_PvP0 AllWeaponsById,ArrayOfKeyValueOfstringint GameVariantClassesKeysAndValues)
 * 
 * 
 * 
 *  @param GetGameMetadata $parameters (string identifier)
 *  @return GetGameMetadataResponse (MetaDataResponse GetGameMetadataResult)
 * 
 */

function GetGameMetadata($parameters ){
	try {
		$funcRet = $this->client->GetGameMetadata($parameters );
	} catch ( Exception $e ) {
		echo '(GetGameMetadata) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetGameHistory
 * 	Type Description:
 * 
 * 	 GetGameHistory (string identifier,string gamertag,string variant_class_string,string iPage)
 * 
 * 	 GetGameHistoryResponse (GameHistoryResponse GetGameHistoryResult)
 * 
 * 		GetGameHistoryResult = (boolean HasMorePages,ArrayOfGameSummary RecentGames)
 * 
 * 			RecentGames = (GameSummary GameSummary)
 * 
 * 
 * 
 *  @param GetGameHistory $parameters (string identifier,string gamertag,string variant_class_string,string iPage)
 *  @return GetGameHistoryResponse (GameHistoryResponse GetGameHistoryResult)
 * 
 */

function GetGameHistory($parameters ){
	try {
		$funcRet = $this->client->GetGameHistory($parameters );
	} catch ( Exception $e ) {
		echo '(GetGameHistory) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetGameDetails
 * 	Type Description:
 * 
 * 	 GetGameDetails (string identifier,string gameId)
 * 
 * 	 GetGameDetailsResponse (GameDetailsResponse GetGameDetailsResult)
 * 
 * 		GetGameDetailsResult = (Game GameDetails)
 * 
 * 			GameDetails = (string BaseMapName,string CampaignDifficulty,int CampaignGlobalScore,boolean CampaignMetagameEnabled,int GameDuration,unsignedLong GameId,dateTime GameTimestamp,ReachGameVariantClass GameVariantClass,long GameVariantHash,string GameVariantName,boolean HasDetails,boolean IsTeamGame,string MapName,long MapVariantHash,int PlayerCount,ArrayOfPlayerGameReach Players,string PlaylistName,ArrayOfTeamResultsReach Teams)
 * 
 * 
 * 
 *  @param GetGameDetails $parameters (string identifier,string gameId)
 *  @return GetGameDetailsResponse (GameDetailsResponse GetGameDetailsResult)
 * 
 */

function GetGameDetails($parameters ){
	try {
		$funcRet = $this->client->GetGameDetails($parameters );
	} catch ( Exception $e ) {
		echo '(GetGameDetails) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerDetailsWithStatsByMap
 * 	Type Description:
 * 
 * 	 GetPlayerDetailsWithStatsByMap (string identifier,string gamertag)
 * 
 * 	 GetPlayerDetailsWithStatsByMapResponse (PlayerDetailsResponse GetPlayerDetailsWithStatsByMapResult)
 * 
 * 		GetPlayerDetailsWithStatsByMapResult = (ArrayOfPlayerAiAggregateDetailReach AiStatistics,ArrayOfPlayerArenaDetail CurrentSeasonArenaStatistics,PlayerDetailReachAggregate Player,string PlayerModelUrl,string PlayerModelUrlHiRes,ArrayOfPlayerArenaDetail PriorSeasonArenaStatistics,ArrayOfPlayerAggregateDetailReach StatisticsByMap,ArrayOfPlayerAggregateDetailReach StatisticsByPlaylist)
 * 
 * 			AiStatistics = (PlayerAiAggregateDetailReach PlayerAiAggregateDetailReach)
 * 
 * 			CurrentSeasonArenaStatistics = (PlayerArenaDetail PlayerArenaDetail)
 * 
 * 			Player = (ArrayOfKeyValueOfintshort CommendationState,float commendation_completion_percentage)
 * 
 * 			PriorSeasonArenaStatistics = (PlayerArenaDetail PlayerArenaDetail)
 * 
 * 			StatisticsByMap = (PlayerAggregateDetailReach PlayerAggregateDetailReach)
 * 
 * 			StatisticsByPlaylist = (PlayerAggregateDetailReach PlayerAggregateDetailReach)
 * 
 * 
 * 
 *  @param GetPlayerDetailsWithStatsByMap $parameters (string identifier,string gamertag)
 *  @return GetPlayerDetailsWithStatsByMapResponse (PlayerDetailsResponse GetPlayerDetailsWithStatsByMapResult)
 * 
 */

function GetPlayerDetailsWithStatsByMap($parameters ){
	try {
		$funcRet = $this->client->GetPlayerDetailsWithStatsByMap($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerDetailsWithStatsByMap) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerDetailsWithStatsByPlaylist
 * 	Type Description:
 * 
 * 	 GetPlayerDetailsWithStatsByPlaylist (string identifier,string gamertag)
 * 
 * 	 GetPlayerDetailsWithStatsByPlaylistResponse (PlayerDetailsResponse GetPlayerDetailsWithStatsByPlaylistResult)
 * 
 * 		GetPlayerDetailsWithStatsByPlaylistResult = (ArrayOfPlayerAiAggregateDetailReach AiStatistics,ArrayOfPlayerArenaDetail CurrentSeasonArenaStatistics,PlayerDetailReachAggregate Player,string PlayerModelUrl,string PlayerModelUrlHiRes,ArrayOfPlayerArenaDetail PriorSeasonArenaStatistics,ArrayOfPlayerAggregateDetailReach StatisticsByMap,ArrayOfPlayerAggregateDetailReach StatisticsByPlaylist)
 * 
 * 			AiStatistics = (PlayerAiAggregateDetailReach PlayerAiAggregateDetailReach)
 * 
 * 			CurrentSeasonArenaStatistics = (PlayerArenaDetail PlayerArenaDetail)
 * 
 * 			Player = (ArrayOfKeyValueOfintshort CommendationState,float commendation_completion_percentage)
 * 
 * 			PriorSeasonArenaStatistics = (PlayerArenaDetail PlayerArenaDetail)
 * 
 * 			StatisticsByMap = (PlayerAggregateDetailReach PlayerAggregateDetailReach)
 * 
 * 			StatisticsByPlaylist = (PlayerAggregateDetailReach PlayerAggregateDetailReach)
 * 
 * 
 * 
 *  @param GetPlayerDetailsWithStatsByPlaylist $parameters (string identifier,string gamertag)
 *  @return GetPlayerDetailsWithStatsByPlaylistResponse (PlayerDetailsResponse GetPlayerDetailsWithStatsByPlaylistResult)
 * 
 */

function GetPlayerDetailsWithStatsByPlaylist($parameters ){
	try {
		$funcRet = $this->client->GetPlayerDetailsWithStatsByPlaylist($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerDetailsWithStatsByPlaylist) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerDetailsWithNoStats
 * 	Type Description:
 * 
 * 	 GetPlayerDetailsWithNoStats (string identifier,string gamertag)
 * 
 * 	 GetPlayerDetailsWithNoStatsResponse (PlayerDetailsResponse GetPlayerDetailsWithNoStatsResult)
 * 
 * 		GetPlayerDetailsWithNoStatsResult = (ArrayOfPlayerAiAggregateDetailReach AiStatistics,ArrayOfPlayerArenaDetail CurrentSeasonArenaStatistics,PlayerDetailReachAggregate Player,string PlayerModelUrl,string PlayerModelUrlHiRes,ArrayOfPlayerArenaDetail PriorSeasonArenaStatistics,ArrayOfPlayerAggregateDetailReach StatisticsByMap,ArrayOfPlayerAggregateDetailReach StatisticsByPlaylist)
 * 
 * 			AiStatistics = (PlayerAiAggregateDetailReach PlayerAiAggregateDetailReach)
 * 
 * 			CurrentSeasonArenaStatistics = (PlayerArenaDetail PlayerArenaDetail)
 * 
 * 			Player = (ArrayOfKeyValueOfintshort CommendationState,float commendation_completion_percentage)
 * 
 * 			PriorSeasonArenaStatistics = (PlayerArenaDetail PlayerArenaDetail)
 * 
 * 			StatisticsByMap = (PlayerAggregateDetailReach PlayerAggregateDetailReach)
 * 
 * 			StatisticsByPlaylist = (PlayerAggregateDetailReach PlayerAggregateDetailReach)
 * 
 * 
 * 
 *  @param GetPlayerDetailsWithNoStats $parameters (string identifier,string gamertag)
 *  @return GetPlayerDetailsWithNoStatsResponse (PlayerDetailsResponse GetPlayerDetailsWithNoStatsResult)
 * 
 */

function GetPlayerDetailsWithNoStats($parameters ){
	try {
		$funcRet = $this->client->GetPlayerDetailsWithNoStats($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerDetailsWithNoStats) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerFileShare
 * 	Type Description:
 * 
 * 	 GetPlayerFileShare (string identifier,string gamertag)
 * 
 * 	 GetPlayerFileShareResponse (FileResponse GetPlayerFileShareResult)
 * 
 * 		GetPlayerFileShareResult = (ArrayOfReachFileSet FileSets,ArrayOfReachFile Files)
 * 
 * 			FileSets = (ReachFileSet ReachFileSet)
 * 
 * 			Files = (ReachFile ReachFile)
 * 
 * 
 * 
 *  @param GetPlayerFileShare $parameters (string identifier,string gamertag)
 *  @return GetPlayerFileShareResponse (FileResponse GetPlayerFileShareResult)
 * 
 */

function GetPlayerFileShare($parameters ){
	try {
		$funcRet = $this->client->GetPlayerFileShare($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerFileShare) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetFileDetails
 * 	Type Description:
 * 
 * 	 GetFileDetails (string identifier,string fileId)
 * 
 * 	 GetFileDetailsResponse (FileResponse GetFileDetailsResult)
 * 
 * 		GetFileDetailsResult = (ArrayOfReachFileSet FileSets,ArrayOfReachFile Files)
 * 
 * 			FileSets = (ReachFileSet ReachFileSet)
 * 
 * 			Files = (ReachFile ReachFile)
 * 
 * 
 * 
 *  @param GetFileDetails $parameters (string identifier,string fileId)
 *  @return GetFileDetailsResponse (FileResponse GetFileDetailsResult)
 * 
 */

function GetFileDetails($parameters ){
	try {
		$funcRet = $this->client->GetFileDetails($parameters );
	} catch ( Exception $e ) {
		echo '(GetFileDetails) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerRecentScreenshots
 * 	Type Description:
 * 
 * 	 GetPlayerRecentScreenshots (string identifier,string gamertag)
 * 
 * 	 GetPlayerRecentScreenshotsResponse (FileResponse GetPlayerRecentScreenshotsResult)
 * 
 * 		GetPlayerRecentScreenshotsResult = (ArrayOfReachFileSet FileSets,ArrayOfReachFile Files)
 * 
 * 			FileSets = (ReachFileSet ReachFileSet)
 * 
 * 			Files = (ReachFile ReachFile)
 * 
 * 
 * 
 *  @param GetPlayerRecentScreenshots $parameters (string identifier,string gamertag)
 *  @return GetPlayerRecentScreenshotsResponse (FileResponse GetPlayerRecentScreenshotsResult)
 * 
 */

function GetPlayerRecentScreenshots($parameters ){
	try {
		$funcRet = $this->client->GetPlayerRecentScreenshots($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerRecentScreenshots) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerFileSets
 * 	Type Description:
 * 
 * 	 GetPlayerFileSets (string identifier,string gamertag)
 * 
 * 	 GetPlayerFileSetsResponse (FileResponse GetPlayerFileSetsResult)
 * 
 * 		GetPlayerFileSetsResult = (ArrayOfReachFileSet FileSets,ArrayOfReachFile Files)
 * 
 * 			FileSets = (ReachFileSet ReachFileSet)
 * 
 * 			Files = (ReachFile ReachFile)
 * 
 * 
 * 
 *  @param GetPlayerFileSets $parameters (string identifier,string gamertag)
 *  @return GetPlayerFileSetsResponse (FileResponse GetPlayerFileSetsResult)
 * 
 */

function GetPlayerFileSets($parameters ){
	try {
		$funcRet = $this->client->GetPlayerFileSets($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerFileSets) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerFileSetFiles
 * 	Type Description:
 * 
 * 	 GetPlayerFileSetFiles (string identifier,string gamertag,string fileSetId)
 * 
 * 	 GetPlayerFileSetFilesResponse (FileResponse GetPlayerFileSetFilesResult)
 * 
 * 		GetPlayerFileSetFilesResult = (ArrayOfReachFileSet FileSets,ArrayOfReachFile Files)
 * 
 * 			FileSets = (ReachFileSet ReachFileSet)
 * 
 * 			Files = (ReachFile ReachFile)
 * 
 * 
 * 
 *  @param GetPlayerFileSetFiles $parameters (string identifier,string gamertag,string fileSetId)
 *  @return GetPlayerFileSetFilesResponse (FileResponse GetPlayerFileSetFilesResult)
 * 
 */

function GetPlayerFileSetFiles($parameters ){
	try {
		$funcRet = $this->client->GetPlayerFileSetFiles($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerFileSetFiles) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: GetPlayerRenderedVideos
 * 	Type Description:
 * 
 * 	 GetPlayerRenderedVideos (string identifier,string gamertag,string iPage)
 * 
 * 	 GetPlayerRenderedVideosResponse (FileResponse GetPlayerRenderedVideosResult)
 * 
 * 		GetPlayerRenderedVideosResult = (ArrayOfReachFileSet FileSets,ArrayOfReachFile Files)
 * 
 * 			FileSets = (ReachFileSet ReachFileSet)
 * 
 * 			Files = (ReachFile ReachFile)
 * 
 * 
 * 
 *  @param GetPlayerRenderedVideos $parameters (string identifier,string gamertag,string iPage)
 *  @return GetPlayerRenderedVideosResponse (FileResponse GetPlayerRenderedVideosResult)
 * 
 */

function GetPlayerRenderedVideos($parameters ){
	try {
		$funcRet = $this->client->GetPlayerRenderedVideos($parameters );
	} catch ( Exception $e ) {
		echo '(GetPlayerRenderedVideos) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


/**
 * SOAP Function: ReachFileSearch
 * 	Type Description:
 * 
 * 	 ReachFileSearch (string identifier,string file_category,string MapFilter,string engineFilter,string DateFilter,string SortFilter,string iPage,string tags)
 * 
 * 	 ReachFileSearchResponse (FileResponse ReachFileSearchResult)
 * 
 * 		ReachFileSearchResult = (ArrayOfReachFileSet FileSets,ArrayOfReachFile Files)
 * 
 * 			FileSets = (ReachFileSet ReachFileSet)
 * 
 * 			Files = (ReachFile ReachFile)
 * 
 * 
 * 
 *  @param ReachFileSearch $parameters (string identifier,string file_category,string MapFilter,string engineFilter,string DateFilter,string SortFilter,string iPage,string tags)
 *  @return ReachFileSearchResponse (FileResponse ReachFileSearchResult)
 * 
 */

function ReachFileSearch($parameters ){
	try {
		$funcRet = $this->client->ReachFileSearch($parameters );
	} catch ( Exception $e ) {
		echo '(ReachFileSearch) SOAP Error: - ' . $e->getMessage ();
	}
	return $funcRet; 
}


		
}

?>
