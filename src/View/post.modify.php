<?php $title = 'Modifier un post'; ?>

<?php ob_start(); ?>
<h1>Modifier un post</h1>

<form action="?action=post.update&id=<?php echo $post->id; ?>" method='post'>
    <input type="text" name="title" value="<?php echo $post->title; ?>"><br>
    <textarea name="content" cols="30" rows="10"><?php echo $post->content; ?></textarea><br>
    <input type="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>