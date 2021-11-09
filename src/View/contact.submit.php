<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<?php
if(isset($_POST['email'])){
        $mailTo = "naimemedjek@gmail.com";
        $subject = "Mail blog php";
        $body = "Nouvel email
<br><br>
DE: ".$_POST['email']."<br>
NOM: ".$_POST['nom']."<br>
PRENOM: ".$_POST['prenom']."<br>
MESSAGE: ".$_POST['message']."<br>";   
        $headers = "A: Naime <".$mailTo.">\r\n";
        $headers .= "De: ".$_POST['nom']." ".$_POST['prenom']." <".$_POST['email'].">\r\n";
        $headers .= "Content-Type: text/html";
        $mail_success =  mail($mailTo, utf8_decode($subject), utf8_decode($body), $headers);        
}
?>  

<h1>Votre message a bien été envoyé !</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>