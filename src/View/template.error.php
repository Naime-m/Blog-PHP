<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Page non trouvée !</h1>
<a href ='http://mon-blog.test/index.php?'>Retourner à l'accueil</a>


<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>