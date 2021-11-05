<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="css/style.css" rel="stylesheet" /> 
    </head>
    
    <body>
    <a href='?' class='accueil'>Accueil</a>
    <a href='?action=post.list' class='articles'>Les derniers articles !</a>
        <?= $content ?>
    </body>
</html>
