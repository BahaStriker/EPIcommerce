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

//loading configs & functions
chdir(__dir__);
require "protected/config.php";
require "protected/functions.php";
require "pages/logincontrol.php";

//Checking if there's a session or not
if(session_id() == '') 
{
    session_start();
}

//making sure allowing access only from the domain
if($dom	==	'localhost' || $dom	==	'epi-challenge' || $dom	==	'epi-challenge.tk')	
{
	require	"views/header.php";
	if(isset($_SESSION['login']))
	{
		if($_SESSION['login']	==	0)
		{
			switch($page)
			{
				case NULL:
				case "":
				case "home":
				case "index.php":	require "views/main.php";
									break;	
				
				case "cart":		require "pages/cart.php";
									break;	
				
				case "search":		require "pages/search.php";
									require "views/search.php";
									break;
				case "logout":		session_unset();
									session_destroy();
									header('Location: /');
									break;
									
				default:			require 'views/404.php';
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
				
				case "register":	require "pages/register.php";
									require "views/register.php";
									break;	
				
				case "cart":		require "pages/cart.php";
									break;
				
				case "login":		require "pages/login.php";
									require "views/login.php";
									break;
				
				case "search":		require "pages/search.php";
									require "views/search.php";
									break;
				
				default:			require 'views/404.php';
									break;
			}
	}
	require	"views/footer.php";
}
else
{
	die("Unauthorized Access!");
}