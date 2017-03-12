<?php
session_start();

$mysqli 	= new mysqli('localhost','root','','members');

if ($mysqli->connect_errno)
{
	echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
}


if (isset($_POST['register']))
{
	if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['passwd']) AND !empty($_POST['repasswd']))
	{
		$login		= htmlspecialchars(trim($_POST['username']));
		$email		= htmlspecialchars(trim($_POST['email']));
		$passwd		= htmlspecialchars(trim($_POST['passwd']));
		$repasswd	= htmlspecialchars(trim($_POST['repasswd']));
		$salt		= base64_encode(md5 ($login.$passwd, true));


		if (!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$erreur 	= '<div class="panel panel-danger">
							<div class="panel-heading">
							<h5 class="panel-title">Please verify Your Email</h5>
							</div>
							</div>
							</div>';
		}
		elseif($passwd != $repasswd)
		{
			$erreur 	='<div class="panel panel-danger">
							<div class="panel-heading">
							<h5 class="panel-title">Please verify Your Password</h5>
							</div>
							</div>
							</div>';
		}
		else
		{
			$Query	=	$mysqli->query("INSERT INTO `accounts` (Username,Email,Password) VALUES ('{$login}', '{$email}', '{$salt}')");

			if($Query)
			{
				$erreur 	='<div class="panel panel-info">
							<div class="panel-heading">
							<h5 class="panel-title">Success!</h5>
							</div>
							</div>
							</div>';
			}
			else
			{
				$erreur 	='<div class="panel panel-danger">
							<div class="panel-heading">
							<h5 class="panel-title">Contact Striker</h5>
							</div>
							</div>
							</div>';
			}
		}
	}
	else
	{
		$erreur = '<div class="panel panel-danger">
					<div class="panel-heading">
					<h5 class="panel-title">Please verify u have entred all the requested informations</h5>
					</div>
					</div>
					</div>';

	}
}
if (isset($_POST['logon'])){
		$logon	= htmlspecialchars(trim($_POST['login']));
		$logpasswd		= htmlspecialchars(trim($_POST['logpasswd']));
		$salt		= base64_encode(md5 ($logon.$logpasswd, true));
		if(!empty($_POST['login']) AND !empty($_POST['logpasswd']))
		{
			$Query = $mysqli->query("SELECT * FROM `accounts` WHERE `Username` ='{$logon}' AND `Password`='{$salt}'");

			if($Query)
			{   $row = $Query->fetch_array();
				$_SESSION['id'] = $row['ID'];
				$_SESSION['login'] = $row['login'];
				$_SESSION['email'] = $row['email'];
			    $_SESSION['avatar'] = $row['avatar'];
				$_SESSION['admin'] = $row['admin'];
				header("location:home.php?id=".$row['ID']);
			}
			else
			{
				$erreur 	='<div class="panel panel-danger">
							<div class="panel-heading">
							<h5 class="panel-title">Contact Striker</h5>
							</div>
							</div>
							</div>';

			}
		}
		else
		{
			$erreur = '<div class="panel panel-danger">
					<div class="panel-heading">
					<h5 class="panel-title">check your informations</h5>
					</div>
					</div>
					</div>';
		}

}
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
	$extensionsvalides =array ('jpg', 'jpeg' , 'gif' , 'png');
$extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
if(in_array($extensionupload, $extensionsvalides  )){
	$chemin = "css/img/avatar/".$_SESSION['id'].".".$extensionupload;
    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

	if ($resultat)
	{
		$avatar = $_SESSION['id'].".".$extensionupload;
		$Query	=	$mysqli->query("UPDATE accounts SET avatar='{$avatar}' WHERE ID='{$_SESSION['id']}'");

		if($Query)
		{
			//success message
		}
	}
}


}
$bdd 	= new mysqli('localhost','root','','article');
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
	$insere =	$bdd->query("INSERT INTO `contenu` (Titre,contenu,writer,img,Time_uplo) VALUES ('{$Titre}', '{$Contenu}', '{$ecrivent}','{$image}', NOW())");
	} else {
		$updateA = $bdd->query("UPDATE contenu SET Titre='{$Titre}',contenu='{$Contenu}',writer='{$ecrivent}',img='{$image}'WHERE id='{$edit_id}'");
	}

	}
}else {
               }
     }else {
               }
      }else {
               }

}
$bdd 	= new mysqli('localhost','root','','article');

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
	$chemics = "css/img/Shop/".$imgn.".".$extensioncs;
	$resultats = move_uploaded_file($_FILES['imgs']['tmp_name'], $chemics);
	if ($resultats)
	{

		$images = $imgn.".".$extensioncs;


	$insere =	$bdd->query("INSERT INTO `sharticle` (Titres,Class,Designer,imgs) VALUES ('{$Titres}', '{$Class}', '{$designer}','{$images}')");
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
	$bc =	$bdd->query("UPDATE `broadcast` SET Message='{$broadcast}' WHERE id='1'");


}}
$bc =	$bdd->query("SELECT * FROM `broadcast` WHERE id='1'");
$bro = $bc->fetch_array();
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<div class="margi">
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
</div>
</div>
<div class="topi">
</div>
<div class="container">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-6">

<form method="post" enctype="multipart/form-data">
<div class="form-group">
<input type="text" class="form-control" placeholder="Title" name="article_title" <?php if ($mode_edition == 1) {?> value="<?=$edit_article['Titre'] ?> "<?php }?> >
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Author" name="author" <?php if ($mode_edition == 1) {?>value=" <?=$edit_article['writer']  ?>"<?php }?> >
</div>
<div class="form-group">
<textarea class="form-control" rows="7" placeholder="Content" name="article_content"><?php if ($mode_edition == 1) {?> <?= $edit_article['contenu']; ?><?php } ?></textarea>
</div>
<div class="text-center">
<input type="file" name="img" class="btn btn-block btn-social btn-pinterest" style="border-radius: 0; " <?php if ($mode_edition == 1) {?> value=" <?= $edit_article['img']  ?> "<?php }?> ><input type="submit" class="btn btn-primary btn-block" value="Send The New Article"></input>


</div>
</form>
</div>

</div>
</div>
