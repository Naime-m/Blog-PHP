<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>


<?php if ($result == true) { ?>
<h1>Votre message a bien été envoyé ! </h1>
<?php } ?>

<?php if ($result == false) { ?>
<h1>Erreur : réessayez ! </h1>
<?php } ?>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
