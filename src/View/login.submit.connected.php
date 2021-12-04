<?php $title = 'Connexion réussie !'; ?>

<?php ob_start(); ?>
<h1>Vous êtes bien connecté sous l'email suivant : <?php echo htmlspecialchars($_SESSION['user']->email); ?>
</h1>
<a href="index.php?action=home">Retour à l'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
