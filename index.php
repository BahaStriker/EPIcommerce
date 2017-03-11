<?php
//Checking Server's access URL
$dom	=	$_SERVER['HTTP_HOST'];
$dom	=	str_replace("www.","",$dom);
$dom	=	explode(":",$dom);
$dom	=	array_shift($dom);
$dom	=	explode(".",$dom);
$dom	=	array_shift($dom);

//Checking Page GET
if(isset($_GET["page"])) 
{
	$page = strtolower($_GET["page"]);
}
else 
{ 
	$page = NULL; 
}

unset($_GET["page"]);
unset($_GET["_"]);


//Checking if there's a session or not
if(session_id() == '') 
{
    session_start();
}

//making sure allowing access only from the domain
if($dom	==	'localhost' || $dom	==	'epi-challenge' || $dom	==	'epi-challenge.tk')	
{
	if(isset($_SESSION['loging']))
	{
		if($_SESSION['loging']	==	1)
		{
			switch($page)
			{
				case NULL:
				case "":
				case "home":
				case "index.php":	require "views/main.php";
									break;
									
				default:			require '404.php';
									break;					
			}
		}
		else
		{
			die("Your account has been banned!");
		}
	}
	else
	{
		switch($page)
			{
				case NULL:
				case "":
				case "home":
				case "index.php":	require "views/main.php";
									break;
				
				default:			require '404.php';
									break;
			}
	}
}
else
{
	die("Unauthorized Access!");
}
