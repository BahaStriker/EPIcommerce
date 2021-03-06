<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Nexus Shop</title>
<link rel="icon" type="image/png" href="../style/css/img/logo.png" />
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<meta property="og:url" content="http://codepen.io/hrtzt/details/NPZKRN">
<meta property="og:image" content="https://pbs.twimg.com/media/CCNJN_XUMAAJSzU.jpg:large">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css'>
<link rel="stylesheet" href="../style/css/style.css">
<link rel="stylesheet" href="../style/css/theme.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<link rel="stylesheet" href="../style/css/owl.carousel.css">

	<link rel="stylesheet" href="../style/css/circle.css">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-primary bg-primary fixed-top">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	 <span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#"><img src="../style/css/img/logo.png" alt="" height="40px" width:"90px"></a>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">
	 <ul class="navbar-nav mr-auto">
		 <li class="nav-item active">
			 <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
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
		 <?php if(isset($USER)){echo $USER;} ?>
	 </ul>

	</div>

	 </form>
</div>
 </div>
</nav>
