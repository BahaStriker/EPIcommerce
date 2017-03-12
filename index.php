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

//Checking if there's a session or not
if(session_id() == '') 
{
    session_start();
}

//making sure allowing access only from the domain
if($dom	==	'localhost' || $dom	==	'epi-challenge' || $dom	==	'epi-challenge.tk')	
{
	
	if(isset($_SESSION['log']))
	{
		$USER	=	'<li class="loga nav-item">
			 <a class="nav-link" href="?page=logout"><i class="icon fa fa-user"></i> Logout</a>
				</li>';
		require	"views/header.php";
		if($_SESSION['log']	==	1)
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
				case "article":		require "pages/article.php";
									require "views/addarticle.php";
									break;	
				case "test":		require "views/test.php";
									break;
				case "logout":		session_unset();
									session_destroy();
									header('Location: /');
									break;
									
				default:			require 'views/404.php';
									break;					
			}
		}
	}
	else
	{
		$USER	=	'<li class="loga nav-item">
			 <a class="nav-link" href="?page=login"><i class="icon fa fa-user"></i> login</a>
		 </li>
		 <li class="logaa nav-item">
			<a class="nav-link" href="?page=register"><i class="icon fa fa-pencil-square-o"></i> register</a>
		</li>';
		require	"views/header.php";
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