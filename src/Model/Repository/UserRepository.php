<?php

namespace App\Model\Repository;

use App\Model\Entity\User;

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
        // $query = $db->prepare('INSERT INTO users(firstname, lastname, email, password, userType_id)
        $query = $db->prepare('INSERT INTO users(firstname, lastname, password, email, userType_id)
        VALUES (?, ?, ?, ?, 2)');
        $user =  $query->execute(array($firstname, $lastname, $email, $password));
        return $user;
    }
}
