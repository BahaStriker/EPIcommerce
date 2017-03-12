<?php
if (isset($_SESSION['id'])){
	
	header('Location: /');
}
$sessionname = session_name();
$sessionid = session_id();
?>
<div class="margi">
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
</div>
</div>
<div class="topi">
</div>
<div id="page-content-wrapper" class="topi">
<div class="container">
<h3><i class="fa fa-users"></i> Register to Nexus Shop</h3>
<?php 
if( (isset($ERROREG)) && (!empty($ERROREG)) )
{
echo $ERROREG;	
} 
?>
</br></br>
<form method="post">
<div class="form-group input-icon-left">
<input type="text" class="form-control" name="username" placeholder="Username" required>
</div>
<div class="form-group input-icon-left">
<input type="email" class="form-control" name="email" placeholder="Email" required>
</div>
<div class="form-group input-icon-left">
<input type="password" class="form-control" name="passwd" placeholder="Password" required>
</div>
<div class="form-group input-icon-left">
<input type="password" class="form-control" name="repasswd" placeholder="Repeat Password" required>
</div>
<div class="form-group input-icon-left">
<input type="text" class="form-control" name="name" placeholder="First Name">
</div>
<div class="form-group input-icon-left">
<input type="text" class="form-control" name="lastname" placeholder="Last Name">
</div>
<div class="form-group input-icon-left">
<input type="text" class="form-control" name="address" placeholder="Home Address">
</div>
<div class="form-group input-icon-left">
<input type="text" class="form-control" name="city" placeholder="City">
</div>
<div class="form-group input-icon-left">
<input type="text" class="form-control" name="state" placeholder="State">
</div>
<div class="form-group input-icon-left">
<input type="number" class="form-control" name="zip" placeholder="Zip Code">
</div>
<div class="form-group input-icon-left">
<input type="text" class="form-control" name="birth" placeholder="Birthdate (YYYY-MM-YY)">
</div>

<div class="form-actions">
By clicking "Register" You have read and agree on our <a href="?page=terms">Terms of Use</a>
</div>
</br>
<input type="submit" name="submit" class="btn btn-primary btn-block" value="Register">	
</form>
Already have an account? <a href="index.php?page=login">Login Now!</a>
</div>
</div>

