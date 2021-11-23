<?php $title = 'Modération des commentaires'; ?>

<?php ob_start(); ?>
<h1>Modération des commentaires</h1>
<?php foreach ($comments as $comment) { ?>
<p><strong><?php echo htmlspecialchars($comment->lastname); ?></strong>
    <strong><?php echo htmlspecialchars($comment->firstname); ?></strong> le
    <?php echo $comment->getCommentDateFr(); ?>
    <p><?php echo nl2br(htmlspecialchars($comment->comment)); ?>
</p>
<?php } ?>


<?php $content = ob_get_clean(); ?>

<?php require 'template.php';
