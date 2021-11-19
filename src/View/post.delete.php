<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Le post a bien été supprimé</h1>


<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>