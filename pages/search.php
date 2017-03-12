<?php
if(isset($_POST['search'])
{
	$ITEM	=	trim($_POST['item']);
	$ITEM	=	office_secure($ITEM);
	
	$Query	=	$mysqli->query("SELECT * FROM `product` WHERE `Name` LIKE '%{$ITEM}%'");
	
	if($Query->num_rows == 0)
	{
		$SEARCHRESULTS	=	"<div class='alert alert-danger'>No searching results found.</div>";
	}
	else
	{
		while($Results	=	$Query->fetch_array())
		{
			$SEARCHRESULTS	.=	"<a href='#'>".$Results['Name']."</a></br>";
		}
	}
}