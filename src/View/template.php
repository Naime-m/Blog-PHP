<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?>
    </title>
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <a href='?' class='accueil'>Bienvenue</a>
    <a href='?action=post.list' class='articles'>Les derniers articles !</a>

    <?php if (isset($_SESSION['user'])) { ?>
    <p>Bienvenue <?php echo $_SESSION['user']->lastname; ?> <?php echo $_SESSION['user']->firstname; ?> !
        <a href='?action=logout'>Se déconnecter</a>
        <?php } else { ?>
        <a href='?action=login.form'>Se connecter</a>
        <a href='?action=user.form'>S'inscrire</a>
        <?php } ?>
        <?php echo $content; ?>
        <a href="index.php?action=comment.admin&status=<?php echo $_SESSION['user']->userType_id?>">Gestion des commentaires</a></p>
</body>

</html>