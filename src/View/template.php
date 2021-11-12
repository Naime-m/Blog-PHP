<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <a href='?' class='accueil'>Bienvenue</a>
    <a href='?action=post.list' class='articles'>Les derniers articles !</a>

    <?php if (isset($_SESSION['user'])) : ?>
        <p>Bienvenue <?= $_SESSION['user']->lastname ?> <?= $_SESSION['user']->firstname ?> !
            <a href='?action=logout'>Se déconnecter</a>
        <?php else : ?>
            <a href='?action=login.form'>Se connecter</a>
        <?php endif ?>



        <?= $content ?>
</body>

</html>