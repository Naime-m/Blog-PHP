<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<?php

     $to      = 'naimemedjek@gmail.com';
     $subject = 'Blog PHP';
     $message = 'Bonjour'; //'De'. $_POST['nom'] . $_POST['prenom'] . ':'. $_POST['message'];

     mail($to, $subject, $message);
 ?>

<h1>Votre message a bien été envoyé !</h1>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>