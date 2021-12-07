<?php $title = 'Modifier un post'; ?>

<?php ob_start(); ?>
<h1>Modifier un post</h1>

<form action="?action=post.update&id=<?php echo $post->id; ?>" method='post'>
    <input type="text" name="title" value="<?php echo htmlspecialchars ($post->title); ?>"><br>
    <textarea name="content" cols="30" rows="10"><?php echo htmlspecialchars($post->content); ?></textarea><br>

    <label for="author">Choisir un nouvel auteur:</label>

    <select name="user_id" id="user_id">
        <option value="">--Choisissez une option--</option>

        <?php foreach ($users as $user) { ?>
        <option value=<?php echo $user->id?> name="user"><?php echo htmlspecialchars($user->lastname) ?> <?php echo htmlspecialchars($user->firstname) ?>
        </option>
        <?php } ?>

    </select>
    <input type="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
