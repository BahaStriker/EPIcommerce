<?php
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('Add', 'Delete', 'refresh')))
   $erreur=true;

   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //delete vertical spacing
   $l = preg_replace('#\v#', '',$l);
  //verif $p is a float
   $p = floatval($p);

   //how to act with $q int or array of int

   if (is_array($q)){
      $ProdQuant = array();
      $i=0;
      foreach ($q as $cont){
         $ProdQuant[$i++] = intval($cont);
      }
   }
   else
   $q = intval($q);

}

if (!$erreur){
   switch($action){
      Case "Add":
         Pannier($l,$q,$p);
         break;

      Case "Delete":
         ProdDel($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($ProdQuant) ; $i++)
         {
            modifierProdQuant($_SESSION['panier']['ProdId'][$i],round($ProdQuant[$i]));
         }
         break;

      Default:
         break;
   }
}

echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Your Cart</title>
</head>
<body>

<form method="post">
  <div class="card">
    <div class="card-block">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      </div>
    </div>



	<?php
	if (Pannier())
	{
	   $ProdNbr=count($_SESSION['panier']['ProdId']);
	   if ($ProdNbr <= 0)
	   echo "<tr><td>Votre panier est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $ProdNbr ; $i++)
	      {
	         echo "<tr>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['ProdId'][$i])."</ td>";
	         echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['ProdPrice'][$i])."</td>";
	         echo "<td><a href=\"".htmlspecialchars("pannier.php?action=delete&l=".rawurlencode($_SESSION['panier']['ProdId'][$i]))."\">XX</a></td>";
	         echo "</tr>";
	      }

	      echo "<tr><td colspan=\"2\"> </td>";
	      echo "<td colspan=\"2\">";
	      echo "Total : ".MontantGlobal();
	      echo "</td></tr>";

	      echo "<tr><td colspan=\"4\">";
	      echo "<input type=\"submit\" value=\"Done\"/>";
	      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

	      echo "</td></tr>";
	   }
	}
	?>
</table>
</form>
</body>
</html>
