<div class="topi">
</div>
<div id="page-content-wrapper" class="topi">
<div class="container">
<h3><i class="fa fa-users"></i> Nexus Shop</h3>
<?php 
if( (isset($RESULT)) && (!empty($RESULT)) )
{
echo $RESULT;	
} 
?>
</br></br>
<form method="POST">
<div class="form-group input-icon-left">
	<input type="text" style="text-transform:lowercase ;" class="form-control" name="username" placeholder="Username" required>
</div>
<div class="form-group input-icon-left">
	<input type="password" class="form-control" name="passwd" placeholder="Password" required>
</div>
</br>
</br>
<input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
</form>
	Don't have an account? <a href="?page=register">Register Now</a>
</div>
</div>