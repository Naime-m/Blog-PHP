<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur mon blog personnel !</h1>
<h2>Medjek Naime</h2>
<img src ="/img/logop5.png" alt ="logo">
<ul>
<li>Naime Medjek, développeur pour toutes vos applications !</li>
<li><a href="download.php?path=CV.pdf">Mon CV au format PDF</a></li>
<li>Les réseaux sociaux où l’on peut me suivre : <a href ="https://github.com/Naime-m">GitHub</a></li></ul>

<h2>Me contacter !</h2>
<form action="index.php?action=contact.submit" method="post">
    <div>
       <label for="nom">Nom</label><br />
        <input type="text" id="nom" name="nom" />
    </div>
    <div>
        <label for="prenom">Prénom</label><br />
        <input type="text"  id="prenom" name="prenom">
    </div>
    <div>
        <label for="email">Email</label><br />
        <input type="email" id="prenom" name="prenom">
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

<?php require 'template.php'; ?>