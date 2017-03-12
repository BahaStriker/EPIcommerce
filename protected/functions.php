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

function obfuscate_email($email)
{
    $em   = explode("@",$email);
    $name = implode(array_slice($em, 0, count($em)-1), '@');
    $len  = floor(strlen($name)/2);

    return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);
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
			(strpos($url, '--') !== false)
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

////////////////////////////// 

function Pannier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['ProdId'] = array();
      $_SESSION['panier']['ProdQuant'] = array();
      $_SESSION['panier']['ProdPrice'] = array();
      $_SESSION['panier']['Lock'] = false;
   }
   return true;
}

////////////////////////////// 

function isLock(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['Lock'])
   return true;
   else
   return false;
}

////////////////////////////// 

function ProdCount()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['ProdId']);
   else
   return 0;

}

//////////////////////////////

function Add($ProdID,$ProdQuant,$ProdPrice){

   //If it exist
   if (pannier() && !isVerrouille())
   {
      //If the Prod already exists add quantity
      $ProdPosition = array_search($ProdID,  $_SESSION['panier']['ProdId']);

      if ($ProdPosition !== false)
      {
         $_SESSION['panier']['ProdQuant'][$ProdPosition] += $ProdQuant ;
      }
      else
      {
         //else add Prod
         array_push( $_SESSION['panier']['ProdId'],$ProdID);
         array_push( $_SESSION['panier']['ProdQuant'],$ProdQuant);
         array_push( $_SESSION['panier']['ProdPrice'],$ProdPrice);
      }
   }
   else
   echo "A problem occured while adding a Item Speak with the Support.";
}

//////////////////////////////

function ProdDel($ProdID){
   //If pannier existes
   if (Pannier() && !isLock())
   {
      $tmp=array();
      $tmp['ProdId'] = array();
      $tmp['ProdQuant'] = array();
      $tmp['ProdPrice'] = array();
      $tmp['Lock'] = $_SESSION['panier']['Lock'];

      for($i = 0; $i < count($_SESSION['panier']['ProdId']); $i++)
      {
         if ($_SESSION['panier']['ProdId'][$i] !== $ProdID)
         {
            array_push( $tmp['ProdId'],$_SESSION['panier']['ProdId'][$i]);
            array_push( $tmp['ProdQuant'],$_SESSION['panier']['ProdQuant'][$i]);
            array_push( $tmp['ProdPrice'],$_SESSION['panier']['ProdPrice'][$i]);
         }

      }
      //We change the the pannier with our new one 
      $_SESSION['panier'] =  $tmp;
      //we delete our new pannier 
      unset($tmp);
   }
   else
   echo "A problem occured while adding a Item Speak with the Support.";
}

//////////////////////////////

function ProdEdit($ProdID,$ProdQuant){
   if (Pannier() && !isLock())
   {
      //If the quantity is positive or we delete
      if ($ProdQuant > 0)
      {
         //search the prod in the pannier
         $ProdPosition = array_search($ProdID,  $_SESSION['panier']['ProdId']);

         if ($ProdPosition !== false)
         {
            $_SESSION['panier']['ProdQuant'][$ProdPosition] = $ProdQuant ;
         }
      }
      else
      ProdDel($ProdID);
   }
   else
   echo "A problem occured while adding a Item Speak with the Support.";
}

//////////////////////////////

function PannierPrice(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['ProdId']); $i++)
   {
      $total += $_SESSION['panier']['ProdQuant'][$i] * $_SESSION['panier']['ProdPrice'][$i];
   }
   return $total;
   }
   
//////////////////////////////

function product()
{
	$mysql 		= new mysqli('localhost','striker','Qwerty123.','market');
  $Qeury = $mysql->query("SELECT * FROM product");
  while($a=$Qeury->fetch_array())
  {
    $value	=	$a['ProductId'];
    $b=$mysql->query("SELECT Ref FROM Data");
    $c=$mysql->query("SELECT name FROM product WHERE ProductId = {$value}");
    $e=$mysql->query("SELECT save From Data");
    $s=$mysql->query("SELECT type FROM Data WHERE ProductId = {$value}");
    array_push($prod,$value);
    array_push($prod[$value],$c);
    array_push($prod[$value],$s);
    array_push($prod[$value],$e);

  }
  $mysql->close();
return $prod;
}

//////////////////////////////

function Event()
{
	$mysql 		= new mysqli('localhost','striker','Qwerty123.','market');
	$Query	=	$mysql->query("SELECT * FROM users WHERE id={$_SESSION['id']}");
  $Date	=	$Query->fetch_assoc()['birthdate'];

  list ($Year, $Month, $Day) = explode('-', $Date);

  $CurrentDate	=	$value	=	gmdate("Y-m-d", time());

  list ($CYear, $CMonth, $CDay) = explode('-', $CurrentDate);
  $Day=(int)$Day;
  $CDay=(int)$CDay;
  if ($Month==$CMonth)
  {
    if ($Day-$CDay<3)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  $mysql->close();
}
//////////////////////////////
function history()
{
$mysql 		= new mysqli('localhost','striker','Qwerty123.','market');
$cat=$mysql->query("SELECT ProductId FROM history") ;
$cat2=$mysql->query("SELECT Ref FROM product WHERE ProductId=$cat");
$cat3=$mysql->query("SELECT name FROM category WHERE refcat=$cat2");

return $cat3;
}

//////////////////////////////

function sex()
{
$mysql 		= new mysqli('localhost','striker','Qwerty123.','market');
  if ($mysql->query("SELECT sexe FROM users='male'"))
  {
    return 'm';
  }
  else {
     {
       return'f';
     }
  }
  $mysql->close();
}

//////////////////////////////

function test($prod)
{

$mysql 		= new mysqli('localhost','striker','Qwerty123.','market');
  $intr=$mysql->query("SELECT interest FROM users");
  $hist=$mysql->query("SELECT ProductId FROM history ORDER BY ProductId LIMIT 5");
  if (sex()=='f')
  {
    if (Event() == true)
    {
      $sel1=$mysql->query("SELECT ref FROM product");
      $sel=$mysql->query("SELECT refcat From product WHERE ((Description='Women' OR Description='Girl') AND (save!=1) AND (name=$hist) OR (name=$intr))");
    }
    else {
      $sel=$mysql->query("SELECT refcat From product WHERE ((Description='Women' OR Description='Girl') AND (name=$hist) AND (name=$intr))");
    }
  }
  elseif (sex()=='m')
  {
    {
      if (Event() == true)
      {
        $sel1=$mysql->query("SELECT ref FROM product") ;
        $sel=$mysql->query("SELECT refcat From product WHERE ((Description='Boy' OR Description='Men') AND (save!=1) AND (name=$hist) OR (name=$intr))");
      }
      else {
        $sel=$mysql->query("SELECT refcat From category WHERE ((type='Women' OR type='Girl') AND (name=$hist) OR (name=$intr))");
      }
  }
  }
  $mysql->close();
}