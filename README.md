# Halo Headshots

This is the code currently hosted on the site http://dev.haloheadshots.com/.

# Dependencies

*	To get this code up and running, you must have a Rackspace Cloud Files 
account. [Sign up for Rackspace Cloud Files](https://signup.rackspacecloud.com/signup).
	*	Rackspace Cloud Files are used for caching of player images and emblems. 
You can of course extend or modify this code to eliminate the need for a 
Rackspace Cloud Files account. The recommendation is to cache images locally,
or at Amazon S3 if you are that kind of a person. Bungie does not like the
thought of serving over 9000 images every 9000th of a second via an IIS/7.5 
server.
*	Reach Stats API key


# Setup

1.	Rename `config-example.php` to `config.php` and insert the relevant information
2.	You should be good to go.
