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
        $query->execute([$email, $password]);
        $users = $query->fetchAll(\PDO::FETCH_CLASS, User::class);

        return $users[0] ?? false;
    }

    public function getOneByEmail($email)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT  id, email, password, lastname, firstname, userType_id
         FROM users WHERE email= :email');
        $query->bindParam(':email', $email);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $user = $query->fetch();

        return $user;
    }

    public function insert($firstname, $lastname, $email, $password)
    {
        $hashpass = password_hash($password, PASSWORD_DEFAULT);
           $db = $this->dbConnect();
           $insert = $db->prepare('INSERT INTO users(firstname, lastname, email, password, userType_id)
                   VALUES (?, ?, ?, ?, 2)');
           $user = $insert->execute([$firstname, $lastname, $email, $hashpass]);
           return $user;
    }
}