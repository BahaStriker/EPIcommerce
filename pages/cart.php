<?php
//creation of pannier
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
function isLock(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['Lock'])
   return true;
   else
   return false;
}
//add Prod if it doesn't exist else add quantity
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
//Delete Prod
//creat a new pannier without the elemnt we don't need then replace it 
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
            array_push( $tmp['ProdID'],$_SESSION['panier']['ProdId'][$i]);
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
   $CARTERROR	= "<div class='alert alert-danger'>A problem occured while adding a Item Speak with the Support.</div>";
}
//edit article
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
   $CARTERROR	= "<div class='alert alert-danger'>A problem occured while adding a Item Speak with the Support.</div>";