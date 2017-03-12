<?php
if(isset($_POST['search']))
{
	$ITEM	=	trim($_POST['item']);
	$ITEM	=	office_secure($ITEM);
	
	if(empty($ITEM))
	{
		$SEARCHRESULTS	=	"<div class='alert alert-danger'>Search field cannot be empty.</div>";
	}
	else
	{
		$Query	=	$mysqli->query("SELECT * FROM `product` WHERE `Name` LIKE '%{$ITEM}%'");
		
		if($Query->num_rows == 0)
		{
			$SEARCHRESULTS	=	"<div class='alert alert-danger'>No searching results found.</div>";
		}
		else
		{
			while($Results	=	$Query->fetch_array())
			{
				$SEARCHRESULTS	.=	"<tr><td><img src=style/css/img/".$Results['Img']." height='150' width='150'/>&nbsp;&nbsp;</td><td><a href='#'>".$Results['Name']."</a>&nbsp;&nbsp;&nbsp;</td><td>Price : ".$Results['Prix']."DT&nbsp;&nbsp;&nbsp;</td><td>".$Results['Quant']."Units left&nbsp;&nbsp;&nbsp;</td></tr>";
			}
		}
	}
}