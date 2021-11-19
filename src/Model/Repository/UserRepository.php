<?php

namespace App\Model\Repository;

use App\Model\Entity\User;
use Exception;

class UserRepository extends Repository
{
    public function getOneByEmailandPassword($email, $password)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, email, password, lastname, firstname, userType_id
        FROM users WHERE email =  ?  AND password =  ?');
        $query->execute(array($email, $password));
        $user = $query->fetchAll(\PDO::FETCH_CLASS, User::class);
        return $user[0];
    }
    public function insert($firstname, $lastname, $email, $password)
    {
        $db = $this->dbConnect();
        // Vérifier pourquoi le mail était entré à la place du password ici
       $email = $_POST['email'];
        $query = $db->prepare("SELECT email FROM users WHERE email= '.$email.'");
        $query->execute(array($email));
        if (!isset($email)) {
            throw new Exception('L\'email est déja pris, réessayez !');
        } else {
            $insert = $db->prepare('INSERT INTO users(firstname, lastname, password, email, userType_id)
              VALUES (?, ?, ?, ?, 2)');
            $user =  $insert->execute(array($firstname, $lastname, $email, $password));
            return $user;
        }
    }
}
