<?php

namespace App\Controller;

use App\Model\Repository\UserRepository;

class UserController
{
    public function actionLoginForm()
    {
        require '../src/View/login.form.php';
    }

    public function actionLoginSubmit($email, $password)
    {
        $userManager = new UserRepository();
        $user = $userManager->getOneByEmailandPassword($email, $password);
        if (empty($user)) {
            header('Location: index.php?action=login.form&login=invalid');
        } else {
            $_SESSION['user'] = $user;
            require '../src/View/login.submit.connected.php';
        }
    }

    public function actionLogout()
    {
        session_unset();
        session_destroy();
        header('location: ?action=home');
    }

    public function actionCreate()
    {
        $userManager = new UserRepository();
        require '../src/View/user.form.php';
    }

    public function actionInsert($firstname, $lastname, $email, $password)
    {
        $userManager = new UserRepository();

        $user = $userManager->insert($firstname, $lastname, $email, $password);

        if (false === $user) {
            throw new \Exception('Impossible de s\'inscrire ! Réessayez !');
        } else {
            require '../src/View/user.insert.php';
        }
    }
}
