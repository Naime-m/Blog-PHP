<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?>
    </title>
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../public/img/favicon.ico" rel="icon" type="image/x-icon" />
</head>

<body>
    <div class="links">
        <a href='?'>Bienvenue</a>
        <a href='?action=post.list'>Les derniers articles !</a>

        <?php if (isset($_SESSION['user'])) { ?>
        <p>Bienvenue <?php echo htmlspecialchars($_SESSION['user']->lastname); ?> <?php echo htmlspecialchars($_SESSION['user']->firstname); ?> !
            <a href='?action=logout'>Se déconnecter</a>
            <?php } else { ?>
            <a href='?action=login.form'>Se connecter</a>
            <a href='?action=user.form'>S'inscrire</a>
            <?php } ?>
    </div>
    <?php echo $content; ?>
    <?php if (isset($_SESSION['user']) && 1 == $_SESSION['user']->userType_id) { ?>
    <a href="index.php?action=comment.admin">Gestion des commentaires</a>
    </p>
    <?php } ?>
</body>

</html>