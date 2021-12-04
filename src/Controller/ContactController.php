<?php

namespace App\Controller;

class ContactController
{
    public function actionSubmit()
    {
      $name = $_POST['nom'] .' '. $_POST['prenom'];
      $email = $_POST['email'];
      $content = $_POST['message'];
      $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
      $transport->setUsername(SMTP_USER)->setPassword(SMTP_PASSWORD);
      
      $mailer = new \Swift_Mailer($transport);
      
      $message = new \Swift_Message($content);
      $message
         ->setFrom([$email])
         ->setTo(['naimemedjek@gmail.com' => 'Destinataire'])
         ->setSubject('Blog PHP')
         ->setBody('Envoyé depuis l\'adresse : '. $email.' par ' . $name .' : '. $content, 'text/html');
      
      $result = $mailer->send($message);

        require '../src/View/contact.submit.php';
    }
}
