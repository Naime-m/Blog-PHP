<?php $title = htmlspecialchars($post->title); ?>
<?php ob_start(); ?>
<p><a href="index.php?action=post.list">Retour à la liste des posts</a></p>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($title); ?>
        <em>le <?php echo htmlspecialchars($post->getPostDateFr()); ?></em>
        rédigé par <?php echo htmlspecialchars($post->lastname); ?> <?php echo htmlspecialchars($post->firstname); ?>
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
<?php if (2 == $comment->comment_status_id) { ?>
<p>Par <strong><?php echo htmlspecialchars($comment->lastname); ?></strong>
    <strong><?php echo htmlspecialchars($comment->firstname); ?></strong> le
    <?php echo htmlspecialchars($comment->getCommentDateFr()); ?>
</p>
<p><?php echo nl2br(htmlspecialchars($comment->comment)); ?>
</p>

<?php if (isset($_SESSION['user']) && 1 == $_SESSION['user']->userType_id) { ?>
<a href="index.php?action=comment.modify&id=<?php echo $comment->comment_id; ?>">Modifier</a>
<a href="index.php?action=comment.delete&id=<?php echo $comment->comment_id; ?>">Supprimer</a>
<?php } ?>
<?php } ?>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
