<?php

namespace App\Model\Repository;

use App\Model\Entity\User;

class UserRepository extends Repository
{


    public function getOneByEmailandPassword($email, $password)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, email, password, lastname, firstname 
        FROM users WHERE email =  ?  AND password =  ?');
        var_dump($query);
        $query->execute(array($email, $password));
        $user = $query->fetchAll(\PDO::FETCH_CLASS, User::class);
        var_dump($user);
        return $user[0];
    }
}
