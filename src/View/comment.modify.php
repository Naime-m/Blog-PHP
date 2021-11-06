<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>
<h1>Modifier un commentaire</h1>

<form action="?action=comment.update&id=<?=$comment->id?>" method='post'>
    <input type="text" name="author" value="<?=$comment->author?>"><br>
    <textarea name="comment" cols="30" rows="10"><?=$comment->comment?></textarea><br>
    <input type="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>