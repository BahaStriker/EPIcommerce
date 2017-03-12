<?php
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
	$mode_edition = 1;
	$edit_id = htmlspecialchars($_GET['edit']);
	$edit_article = $bdd->query("SELECT * FROM `contenu` WHERE `id` ='{$edit_id}' ");
	if($edit_article->num_rows == 1){
		$edit_article = $edit_article->fetch_array();
	}else {
		die('erreur :the article dosnt exist..');
	}
}
if(isset($_POST['article_title'],$_POST['author'],$_POST['article_content'])){
if (!empty($_POST['article_title'] AND $_POST['author'] AND $_POST['article_content'])) {
	if (isset($_FILES['img']) AND !empty($_FILES['img']['name'])) {
	$Titre		= htmlspecialchars(trim($_POST['article_title']));
    $Contenu		= htmlspecialchars(trim($_POST['article_content']));
	$ecrivent		= htmlspecialchars(trim($_POST['author']));


$extensionsvalides =array ('jpg', 'jpeg' , 'gif' , 'png');
$extensionc = strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1));
if(in_array($extensionc, $extensionsvalides  )){
	$chemic = "css/img/article/".$Titre.".".$extensionc;
	$resultat = move_uploaded_file($_FILES['img']['tmp_name'], $chemic);
	if ($resultat)
	{

		$image = $Titre.".".$extensionc;

	if ($mode_edition == 0) {
		$Now	=	date();
	$insere =	$mysqli->query("INSERT INTO `contenu` (Titre,contenu,writer,img,Time_uplo) VALUES ('{$Titre}', '{$Contenu}', '{$ecrivent}','{$image}', {$Now})");
	} else {
		$updateA = $mysqli->query("UPDATE contenu SET Titre='{$Titre}',contenu='{$Contenu}',writer='{$ecrivent}',img='{$image}'WHERE id='{$edit_id}'");
	}

	}
}
     }
      }

}

if(isset($_POST['titres'],$_POST['designer'],$_POST['class'])){
if (!empty($_POST['titres'] AND $_POST['designer'] AND $_POST['class'])) {
	if (isset($_FILES['imgs']) AND !empty($_FILES['imgs']['name'])) {
	$Titres		= htmlspecialchars(trim($_POST['titres']));
    $Class		= htmlspecialchars(trim($_POST['class']));
	$designer		= htmlspecialchars(trim($_POST['designer']));
	$imgn		= str_replace(' ','',$Titres);


    $extensionsvalidess =array ('jpg', 'jpeg' , 'gif' , 'png');
$extensioncs = strtolower(substr(strrchr($_FILES['imgs']['name'], '.'), 1));
if(in_array($extensioncs, $extensionsvalidess  )){
	$chemics = "style/css/img/Shop/".$imgn.".".$extensioncs;
	$resultats = move_uploaded_file($_FILES['imgs']['tmp_name'], $chemics);
	if ($resultats)
	{

		$images = $imgn.".".$extensioncs;


	$insere =	$mysqli->query("INSERT INTO `sharticle` (Titres,Class,Designer,imgs) VALUES ('{$Titres}', '{$Class}', '{$designer}','{$images}')");
     if ($insere){

	 }
	}
}
     }
      }

}
if (isset($_POST['bsubmit'])){
if(isset($_POST['broadcast']) AND !empty($_POST['broadcast']) ){
	$broadcast = $_POST['broadcast'];
	$bc =	$mysqli->query("UPDATE `broadcast` SET Message='{$broadcast}' WHERE id='1'");


}}
$bc =	$mysqli->query("SELECT * FROM `broadcast` WHERE id='1'");
$bro = $bc->fetch_array();
