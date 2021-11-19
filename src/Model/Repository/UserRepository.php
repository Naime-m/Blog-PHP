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
        
    }

    }
