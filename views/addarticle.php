<?php
if ($_SESSION['role'] == 'seller')
{
?>	
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
<?php
}
else
{
?>
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

Forbidden for members!
</div>

</div>
</div>
<?php	
}
?>