<?php
db_mssql_check_xss();

$email = $mysqli->query("select * from `users` WHERE `id` = '{$_SESSION['id']}'");
if ($email->num_rows > 0)
{
	$showemail	=	obfuscate_email($email->fetch_assoc()['email']);
}
else
{
	$showemail	= 'error';
}

/* Logs */

$Query = $mysqli->query("select * from `history` WHERE `accId` = '{$_SESSION['id']}'");
if ($Query->num_rows > 0)
{
	while ($Log = $Query->fetch_array())
	{
		$Log['email'] = obfuscate_email($Log['email']);
		@$HISTORY .= <<<HTML
	<tr><td>{$Log['ProductId']}&nbsp;&nbsp;</td><td>{$Log['BuyDate']}&nbsp;</td><td>{$showemail}&nbsp;</td></tr>\n
HTML;
	
	}
}
else
{
	@$HISTORY 	= "Nothing to display";
}
