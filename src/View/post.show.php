<?php $title = htmlspecialchars($post->title); ?>
<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?action=post.list">Retour à la liste des posts</a></p>

<div class="news">
    <h3>
        <?php echo $title; ?>
        <em>le <?php echo $post->getPostDateFr(); ?></em>
        rédigé par <?php echo $post->lastname; ?> <?php echo $post->firstname; ?>
    </h3>

    <p>
        <?php echo nl2br(htmlspecialchars($post->content)); ?>
    </p>
</div>
<h2>Commentaires</h2>
<?php if (isset($_SESSION['user'])) { ?>
<form action="index.php?action=comment.insert&id=<?php echo $post->id; ?>" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<?php } ?>

<?php foreach ($comments as $comment) { ?>
    <?php if($comment->comment_status_id == 2 ) { ?>
<p><strong><?php echo htmlspecialchars($comment->lastname); ?></strong>
    <strong><?php echo htmlspecialchars($comment->firstname); ?></strong> le
    <?php echo $comment->getCommentDateFr(); ?> statut :
    <?php echo $comment->comment_status_id; ?>
</p>
<p><?php echo nl2br(htmlspecialchars($comment->comment)); ?>
</p>

<?php if (isset($_SESSION['user']) && $_SESSION['user']->id == $comment->user_id || 1 == $_SESSION['user']->userType_id) { ?>
<a href="index.php?action=comment.modify&id=<?php echo $comment->comment_id; ?>">Modifier</a>
<a href="index.php?action=comment.delete&id=<?php echo $comment->comment_id; ?>">Supprimer</a>
<?php } ?>
<?php } ?>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
