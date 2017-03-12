<?php
if(isset($_SESSION['id']))
{
	if($_SESSION['login']	==	0)
	{
		$USER	='
	<li class="loga nav-item">
			 <a class="nav-link" href="?page=logout"><i class="icon fa fa-user"></i>Logout</a>
	</li>';
	}
	else
	{
		$USER	='
	<li class="loga nav-item">
		<a class="nav-link" href="#"><i class="icon fa fa-lock"></i>Locked</a>
	</li>
	';
	}
}
else
{
	$USER	='
	<li class="loga nav-item">
		<a class="nav-link" href="?page=login"><i class="icon fa fa-user"></i>login</a>
	</li>
	<li class="logaa nav-item">
		<a class="nav-link" href="?page=register"><i class="icon fa fa-pensil"></i>register</a>
	</li>';

}