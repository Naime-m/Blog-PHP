<?php $title = 'Inscription réussie'; ?>

<?php ob_start(); ?>


<h1>Vous êtes désormais inscrit ! Vous pouvez vous connecter.</h1>
<a href ="index.php?action=post.list">Retour à liste des posts</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>