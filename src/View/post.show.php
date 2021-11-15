<?php $title = htmlspecialchars($post->title); ?>
<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?action=post.list">Retour à la liste des posts</a></p>

<div class="news">
    <h3>
        <?= $title ?>
        <em>le <?= $post->getPostDateFr() ?></em>
        rédigé par <?= $post->lastname?> <?= $post->firstname ?>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </p>
</div>

<h2>Commentaires</h2>
<?php if (isset($_SESSION['user'])) : ?>
<form action="index.php?action=comment.insert&id=<?= $post->id ?>" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<?php endif ?>
<?php foreach ($comments as $comment) : ?>
<p><strong><?= htmlspecialchars($comment->lastname)?></strong>
    <strong><?= htmlspecialchars($comment->firstname)?></strong> le
    <?= $comment->getCommentDateFr() ?> statut :
    <?= $comment->comment_status_id ?>
</p>
<p><?= nl2br(htmlspecialchars($comment->comment)) ?>
</p>

<?php if (isset($_SESSION['user'])) /*&& $_SESSION['user']->id == $comment->user_id*/ : ?>
<a href="index.php?action=comment.modify&id=<?= $comment->id ?>">Modifier</a>
<a href="index.php?action=comment.delete&id=<?= $comment->id ?>">Supprimer</a>
<?php endif ?>
<?php endforeach ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php');
