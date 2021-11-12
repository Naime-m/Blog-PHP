<?php
namespace App\Controller;

use App\Model\Repository\UserRepository;

class UserController
{

    public function actionLoginForm()

    {
        require('../src/View/login.form.php');
    }

    public function actionLoginSubmit($email,$password)
    {  
        session_start();
        $userManager = new UserRepository();
        $user = $userManager->getOneByEmailandPassword($email, $password);
        require('../src/View/login.submit.connected.php');
    }

}