<?php

namespace App\Model\Repository;

class Repository
{
    protected function dbConnect()
    {
        $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];
        $db = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD, $options);

        return $db;
    }
}
