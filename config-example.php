<?php
class config {
	const reachKey = ''; // Reach API key
	const useCloudFiles = true; // Right now, there is no other option (v0.1)
	const cloudFilesUser = ''; // Rackspace Cloud Files user
	const cloudFilesKey = ''; // Rackspace Cloud files API key
	const cloudFilesApplicationExecutedImageTTL = 604800; // Image cache TTL, in seconds, currently set to a week. (60 * 60 * 24 * 7)
}