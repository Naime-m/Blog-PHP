<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
    
    <body>
    <a href='?action=home' class='accueil'>Accueil</a>
    <a href='?action=post.list' class='articles'>Nos derniers articles !</a>
        <?= $content ?>
    </body>
</html>