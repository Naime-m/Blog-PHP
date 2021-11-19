<?php $title = 'Créer un post'; ?>

<?php ob_start(); ?>
<h1>Créer un post</h1>

<form action="index.php?action=post.insert" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="content">Contenu</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>