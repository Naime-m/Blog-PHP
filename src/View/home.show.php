<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur mon blog!</h1>
<h2>Medjek Naime</h2>
<img src="/img/logop5.png" alt="logo">
<div class='presentation'>
    <div>
        <p>Naime Medjek, développeur pour toutes vos applications !</p>
        <p><a href="download.php?path=CV.pdf" class="logo">Mon CV au format PDF</a></p>
        <p>Les réseaux sociaux où l’on peut me suivre : <a href="https://github.com/Naime-m">GitHub</a></p>
    </div>
    <h2>Me contacter !</h2>
    <form action="index.php?action=contact.submit" method="post">
        <div>
            <label for="nom">Nom</label><br />
            <input type="text" id="nom" name="nom" />
        </div>
        <div>
            <label for="prenom">Prénom</label><br />
            <input type="text" id="prenom" name="prenom">
        </div>
        <div>
            <label for="email">Email</label><br />
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="message">Message</label><br />
            <textarea id="message" name="message"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

    <?php $content = ob_get_clean(); ?>

    <?php require 'template.php';
