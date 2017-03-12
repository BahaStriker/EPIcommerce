<?php
if(isset($_SESSION['login']))
{
	$USER	=<<<HTML
	<li class="loga nav-item">
			 <a class="nav-link" href="?page=logout"><i class="icon fa fa-user"></i>Logout</a>
	</li>	 
HTML;
	
}
else
{
	$USER	=<<<HTML
	<li class="loga nav-item">
		<a class="nav-link" href="?page=login"><i class="icon fa fa-user"></i>login</a>
	</li>
	<li class="logaa nav-item">
		<a class="nav-link" href="?page=register"><i class="icon fa fa-pensil"></i>register</a>
	</li> 
HTML;

}