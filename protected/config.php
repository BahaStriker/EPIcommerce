<?php
/* Config File*/

date_default_timezone_set("Africa/Tunis");  //Server Timzone

$SQL		= array(
'host'		=>	'localhost',
'user'		=>	'root',
'pass'		=>	'Qwerty123.',
'db'		=>	'market'
);

/* Connecting Database */
$mysqli 	= new mysqli($SQL['host'],$SQL['user'],$SQL['pass'],$SQL['db']);

if ($mysqli->connect_errno)
{
	echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
}