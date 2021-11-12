<?php

namespace App\Model\Repository;

use App\Model\Entity\User;

class UserRepository extends Repository {


    public function getOneByEmailandPassword($email, $password)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, email, password, lastname, firstname 
        FROM users WHERE email = $_POST[\'email\'], password = $_POST[\'password\']');
        $query->execute(array($email,$password));
        $user=$query->fetchAll(\PDO::FETCH_CLASS, User::class);
        return $user;
    }

}