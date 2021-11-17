<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
<?php if (isset($_SESSION['user'])) : ?>
<em><a href="index.php?action=post.create">Ajouter</a></em>
<?php endif ?>
<?php foreach ($posts as $post) : ?>
<div class="news">
    <h3>
        <?= htmlspecialchars($post->title) ?>
        <em>le <?= $post->getPostDateFr() ?></em>
        rédigé par <?= $post->lastname?> <?= $post->firstname?>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post->content)) ?>
        <br />

        <em><a href="index.php?action=post.show&id=<?= $post->id ?>">Commentaires</a></em>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']->id == $post->user_id) : ?>
        <em><a href="index.php?action=post.modify&id=<?= $post->id ?>">Modifier</a></em>
        <em><a href="index.php?action=post.delete&id=<?= $post->id ?>">Supprimer</a></em>
        <?php endif ?>

    </p>
</div>
<?php endforeach ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
