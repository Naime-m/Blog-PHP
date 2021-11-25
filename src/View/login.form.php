<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>
<h1>Se connecter</h1>

<form action="index.php?action=login.submit" method="post">
    <div>
        <?php if (isset($_GET['login']) && 'invalid' == $_GET['login']) { ?>
            <p>Identifiants erronés</p>
        <?php } ?>
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

<?php require 'template.php'; ?>