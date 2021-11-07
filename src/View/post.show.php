<?php $title = htmlspecialchars($post->title); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?action=post.list">Retour à la liste des posts</a></p>

<div class="news">
    <h3>
        <?= $title ?>
        <em>le <?= $post->getPostDateFr() ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=comment.insert&amp;id=<?= $post->id ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php foreach($comments as $comment): ?>
    <p><strong><?= htmlspecialchars($comment->author) ?></strong> le <?= $comment->getCommentDateFr() ?></p>
    <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
    <a href="index.php?action=comment.modify&amp;id=<?= $comment->id ?>">Modifier</a>
    <a href="index.php?action=comment.delete&amp;id=<?= $comment->id ?>">Supprimer</a>
<?php endforeach ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
