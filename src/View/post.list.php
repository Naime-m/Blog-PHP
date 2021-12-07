<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Derniers billets du blog :</h1>
<?php if (isset($_SESSION['user']) && 1 == $_SESSION['user']->userType_id) { ?>
<em><a href="index.php?action=post.create">Ajouter</a></em>
<?php } ?>
<?php foreach ($posts as $post) { ?>
<div class="news">
    <h3 class="title">
        <?php echo htmlspecialchars($post->title); ?>
        <em>le <?php echo htmlspecialchars($post->getPostDateFr()); ?></em>
        rédigé par <?php echo htmlspecialchars($post->lastname); ?> <?php echo htmlspecialchars($post->firstname); ?>
    </h3>

    <p>
        <?php echo nl2br(htmlspecialchars($post->content)); ?>
        <br />
    <div class=comment>
        <em><a href="index.php?action=post.show&id=<?php echo $post->id; ?>">Commentaires</a></em>
        <?php if (isset($_SESSION['user']) && 1 == $_SESSION['user']->userType_id) { ?>
        <em><a href="index.php?action=post.modify&id=<?php echo $post->id; ?>">Modifier</a></em>
        <em><a href="index.php?action=post.delete&id=<?php echo $post->id; ?>">Supprimer</a></em>
        <?php } ?>
    </div>
    </p>
</div>
<?php } ?>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
