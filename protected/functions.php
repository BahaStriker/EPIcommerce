<?php
function get_ip() 
{
	//Just get the headers if we can or else use the SERVER global
	if ( function_exists( 'apache_request_headers' ) ) 
	{
		$headers = apache_request_headers();
	} 
	else 
	{
		$headers = $_SERVER;
	}
	//Get the forwarded IP if it exists
	if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) 
	{
		$the_ip = $headers['X-Forwarded-For'];
	} 
	elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )) 
	{
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} 
	else 
	{		
		$the_ip = filter_var( $_SERVER["HTTP_CF_CONNECTING_IP"], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
	}
	
	return $the_ip;
}


////////////////////////////// 

function db_mssql_check_xss () {
	$url = html_entity_decode(urldecode($_SERVER['QUERY_STRING']));
	if ($url) {
		if ((strpos($url, '<') !== false) ||
			(strpos($url, '>') !== false) ||
			(strpos($url, '"') !== false) ||
			(strpos($url, '\'') !== false) ||
			(strpos($url, './') !== false) ||
			(strpos($url, '../') !== false) ||
			(strpos($url, '--') !== false) ||
			(strpos($url, '.php') !== false)
		   )
		{
			die("You're not Authorized!");
		}
	}
	$url = html_entity_decode(urldecode($_SERVER['REQUEST_URI']));
	if ($url) {
		if ((strpos($url, '<') !== false) ||
			(strpos($url, '>') !== false) ||
			(strpos($url, '"') !== false) ||
			(strpos($url, '\'') !== false)
		   )
		{
			die("You're not Authorized!");
		}
	}

}

////////////////////////////// 

function office_secure($check_string)
{
    $ret_string = $check_string;
    $ret_string = htmlspecialchars ($ret_string);
    $ret_string = strip_tags ($ret_string);
    $ret_string = trim ($ret_string);
    $ret_string = str_replace ('\\l', '', $ret_string);
    $ret_string  = str_replace("'", "", $ret_string );
    $ret_string  = str_replace("\"", "",$ret_string );
    $ret_string  = str_replace("--", "",$ret_string );
    $ret_string  = str_replace("#", "",$ret_string );
    $ret_string  = str_replace("$", "",$ret_string );
    $ret_string  = str_replace("%", "",$ret_string );
    $ret_string  = str_replace("^", "",$ret_string );
    $ret_string  = str_replace("&", "",$ret_string );
    $ret_string  = str_replace("(", "",$ret_string );
    $ret_string  = str_replace(")", "",$ret_string );
    $ret_string  = str_replace("=", "",$ret_string );
    $ret_string  = str_replace("+", "",$ret_string );
    $ret_string  = str_replace("%00", "",$ret_string );
    $ret_string  = str_replace(";", "",$ret_string );
    $ret_string  = str_replace(":", "",$ret_string );
    $ret_string  = str_replace("|", "",$ret_string );
    $ret_string  = str_replace("<", "",$ret_string );
    $ret_string  = str_replace(">", "",$ret_string );
    $ret_string  = str_replace("~", "",$ret_string );
    $ret_string  = str_replace("`", "",$ret_string );
    $ret_string  = str_replace("%20and%20", "",$ret_string );
    $ret_string = stripslashes ($ret_string);
    return $ret_string;
}
