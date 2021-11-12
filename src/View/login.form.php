<?php $title = 'Créer un post'; ?>

<?php ob_start(); ?>
<h1>Se connecter</h1>

<form action="index.php?action=login.submit" method="post">
    <div>
        <?php if (isset($_GET['login']) and $_GET['login'] == 'invalid') : ?>
            <p>Identifiants erronés</p>
        <?php endif ?>
        <label for="email">Email</label><br />
        <input type="email" id="email" name="email" />
    </div>
    <div>
        <label for="password">Mot de passe</label><br />
        <input type="password" id="password" name="password">
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>