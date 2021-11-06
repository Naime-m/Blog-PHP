<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>
<h1>Le commentaire a bien été modifié</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>