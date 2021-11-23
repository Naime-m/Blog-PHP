<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
<?php if (isset($_SESSION['user'])) { ?>
<em><a href="index.php?action=post.create">Ajouter</a></em>
<?php } ?>
<?php foreach ($posts as $post) { ?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($post->title); ?>
        <em>le <?php echo $post->getPostDateFr(); ?></em>
        rédigé par <?php echo $post->lastname; ?> <?php echo $post->firstname; ?>
    </h3>

    <p>
        <?php echo nl2br(htmlspecialchars($post->content)); ?>
        <br />

        <em><a href="index.php?action=post.show&id=<?php echo $post->id; ?>">Commentaires</a></em>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']->userType_id == 1) { ?>
        <em><a href="index.php?action=post.modify&id=<?php echo $post->id; ?>">Modifier</a></em>
        <em><a href="index.php?action=post.delete&id=<?php echo $post->id; ?>">Supprimer</a></em>
        <?php } ?>

    </p>
</div>
<?php } ?>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
