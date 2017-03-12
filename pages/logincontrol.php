<?php
if(isset($_SESSION['log']))
{
	if($_SESSION['log']	==	1)
	{
		$USER	=<<<HTML
		<ul class="navbar-nav mr-auto">
		 <li class="nav-item active">
			 <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
		 </li>
		 
		 <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
			 <div class="dropdown-menu" aria-labelledby="dropdown01">
				 <a class="dropdown-item" href="#">Action</a>
				 <a class="dropdown-item" href="#">Another action</a>
				 <a class="dropdown-item" href="#">Something else here</a>
			 </div>
		 </li>
		 <form class="form-inline my-2 my-lg-0 pad" method="POST" action="?page=search">
			 <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			 <input class="form-control mr-sm-2" type="text" name="item" placeholder="Search">
			 <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="search" value="Search">
		 </form>
		 <li class="loga nav-item">
			 <a class="nav-link" href="?page=logout"><i class="icon fa fa-user"></i>Logout</a>
		</li>
		<li class="logaaa nav-item">
			<a class="nav-link" href=""><i class="icon fa fa-cart-arrow-down"></i></a>
	 </li>
	 </ul>
HTML;
	}
	else
	{
		$USER	=<<<HTML
	<ul class="navbar-nav mr-auto">
		 <li class="nav-item active">
			 <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
		 </li>
		 <li class="nav-item">
			 <a class="nav-link" href="#">Contact Us</a>
		 </li>
		 <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
			 <div class="dropdown-menu" aria-labelledby="dropdown01">
				 <a class="dropdown-item" href="#">Action</a>
				 <a class="dropdown-item" href="#">Another action</a>
				 <a class="dropdown-item" href="#">Something else here</a>
			 </div>
		 </li>
		 <form class="form-inline my-2 my-lg-0 pad" method="POST" action="?page=search">
			 <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			 <input class="form-control mr-sm-2" type="text" name="item" placeholder="Search">
			 <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="search" value="Search">
		 </form>
		 <li class="loga nav-item">
			 <a class="nav-link" href="#"><i class="icon fa fa-lock"></i>Locked</a>
		</li>
	 </ul>
HTML;
	}
}
else
{
	$USER	=<<<HTML
	<ul class="navbar-nav mr-auto">
		 <li class="nav-item active">
			 <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
		 </li>
		 <li class="nav-item">
			 <a class="nav-link" href="#">Contact Us</a>
		 </li>
		 <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
			 <div class="dropdown-menu" aria-labelledby="dropdown01">
				 <a class="dropdown-item" href="#">Action</a>
				 <a class="dropdown-item" href="#">Another action</a>
				 <a class="dropdown-item" href="#">Something else here</a>
			 </div>
		 </li>
		 <form class="form-inline my-2 my-lg-0 pad" method="POST" action="?page=search">
			 <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			 <input class="form-control mr-sm-2" type="text" name="item" placeholder="Search">
			 <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="search" value="Search">
		 </form>
		 <li class="loga nav-item">
			 <a class="nav-link" href="?page=login"><i class="icon fa fa-user"></i>  login</a>
		 </li>
		 <li class="logaa nav-item">
			<a class="nav-link" href="?page=register"><i class="icon fa fa-pensil"></i>register</a>
		</li>
	 </ul>
HTML;
}
