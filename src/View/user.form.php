<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
<h1>Inscription</h1>

<form action="index.php?action=user.insert" method="post">
    <div>
        <label for="firstname">Prénom</label><br />
        <input type="text" id="firstname" name="firstname" />
    </div>
    <div>
        <label for="lastname">Nom</label><br />
        <input type="text" id="lastname" name="lastname" />
    </div>
    <div>
        <label for="email">Email</label><br />
        <input type="email" id="email" name="email" />
    </div>
    <div>
        <label for="password">Mot de passe</label><br />
        <input type="password" id="password" name="password" />
    </div>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
