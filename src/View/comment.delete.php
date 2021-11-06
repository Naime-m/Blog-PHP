<?php $title = 'Supprimer un commentaire'; ?>

<?php ob_start(); ?>
<h1>Le commentaire a bien été supprimé</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>