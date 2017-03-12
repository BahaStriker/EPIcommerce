<?php
db_mssql_check_xss();

if(	isset($_POST['login']))
{
	if(	empty($_POST['username']))
	{
		$RESULT = "<div class='alert alert-danger'>Username field is empty.</div>";
	}
	elseif(	empty($_POST['passwd'])	)
	{
		$RESULT = "<div class='alert alert-danger'>Password field is empty.</div>";
	}
	elseif (	preg_match("[^0-9a-zA-Z_-]", $_POST['username'], $Txt)	)
	{
		$RESULT = "<div class='alert alert-danger'>Invalid Username format!</div>";
	}
	elseif (	preg_match("[^0-9a-zA-Z_-]", $_POST['passwd'], $Txt)	)
	{
		$RESULT = "<div class='alert alert-danger'>Invalid Password format!</div>";
	}
	elseif(	empty($RESULT)	)
	{
		$login = office_secure($_POST['username']);
		$login = StrToLower(Trim($_POST['username']));
		$password = office_secure($_POST['passwd']);
		$password = StrToLower(Trim($_POST['passwd']));
		$password = base64_encode(md5($login.$password, true));
		
		$Query = $mysqli->query("select * from `users` WHERE `username`='{$login}' AND `password`='{$password}'");
		
		if	($Query->num_rows == 1)
		{
			$row = $Query->fetch_assoc();
			$_SESSION['log']		=	1;
			$_SESSION['login']		=	$row['banned'];
			$_SESSION['id'] 		= 	$row['id'];
			$_SESSION['user'] 		= 	$row['username'];
			$_SESSION['email'] 		= 	$row['email'];
			$_SESSION['role'] 		= 	$row['role'];
			header('Location: /');
		}
		else
		{
			$RESULT = "<div class='alert alert-danger' role='alert'>Incorrect Username or Password.</div>";
		}
	}
}