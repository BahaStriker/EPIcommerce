<?php
db_mssql_check_xss();

if(isset($_POST['submit']))
{
	$Login 		= $_POST['username'];
    $Pass 		= $_POST['passwd'];
    $Repass 	= $_POST['repasswd'];
    $Email 		= $_POST['email'];
	$Name		= $_POST['name'];
	$LName		= $_POST['lastname'];
	$Address	= $_POST['address'];
	$City		= $_POST['city'];
	$State		= $_POST['state'];
	$Zip		= $_POST['zip'];
	$BDate		= $_POST['birth'];

    $Login 		= office_secure($Login);
    $Login 		= StrToLower(Trim($Login));
    $Pass 		= office_secure($Pass);
    $Repass 	= office_secure($Repass);
    $Email 		= Trim($Email);
	$Name		= office_secure($Name);
	$LName		= office_secure($LName);
	$Address	= office_secure($Address);
	$City		= office_secure($City);
	$State		= office_secure($State);
	$Zip		= office_secure($Zip);
	$BDate		= office_secure($BDate);
	$ip			= get_ip();
	
	//Checking if required fields are empty
	if (empty($Login) || empty($Pass) || empty($Repass) || empty($Email))
    {
        $ERROREG = "<div class='alert alert-danger'>One or more fields are empty.</div>";
    }
	elseif (preg_match("[^0-9a-zA-Z_-]", $Login, $Txt))
	{
		$ERROREG = "<div class='alert alert-danger'>Invalid Username format! <br>It must be in [0-9|a-z]</div>";
	}
	elseif (preg_match("[^0-9a-zA-Z_-]", $Pass, $Txt))
	{
		$ERROREG = "<div class='alert alert-danger'>Invalid Password format! <br>It must be in [0-9|a-z]</div>";
	}
	elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL))
	{
		$ERROREG = "<div class='alert alert-danger'>Invalid E-mail format!</div>";
	}
	elseif ($Pass != $Repass)
	{
		$ERROREG = "<div class='alert alert-danger'>Passwords mismatch!</div>";
	}
	elseif ((StrLen($Login) < 4) or (StrLen($Login) > 25))  
	{
		$ERROREG = "<div class='alert alert-danger'>Username must have at least 4 characters.</div>";
	}
	elseif ((StrLen($Pass) < 4) or (StrLen($Pass) > 25)) 
	{
		$ERROREG = "<div class='alert alert-danger'>Password must have at least 4 characters.</div>";
	}
	else
	{
		$Query = $mysqli->query("SELECT username FROM users WHERE username='{$Login}'");
		
		if ($Query->num_rows != 0)
		{
			$ERROREG 	= "<div class='alert alert-danger'>Username already exists!</div>";
			$CAN		=	false;
		}
		$Query->Close();
		$Query = $mysqli->query("SELECT email FROM users WHERE email='{$Email}'");
		if ($Query->num_rows != 0)
		{
			$ERROREG 	= "<div class='alert alert-danger'>E-mail is used by another user!</br>if you forgot your passowrd make sure to reset it.</div>";
			$CAN		=	false;
		}
		$Query->Close();
		
		if ($CAN)
		{
			$hash = base64_encode(md5($Login.$Pass, true));
			$mysqli->query("INSERT INTO users (`username`,`password`,`name`,`lastname`,`email`,`address`,`country`,`city`,`state`,`zip`,`birthdate`,`ip`) VALUES ('$Login', '$Salt', '$Name', '$LName', '$Email', '$Address', '$Country', '$City', '$State', '$Zip', '$BDate','$ip')");
			$Result	=	$mysqli->query("select * from `users` WHERE `username`='$Login'");
			
			$ERROREG = "<div class='alert alert-success'> 
									<strong>Success!</strong> Account <b>{$Login}</b> has been registered with</br>Password: <b>{$Pass}</b> 
								</div>";
		}
	}
}