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
            $hashpass = password_hash($password, PASSWORD_DEFAULT);
            $passcorrect = password_verify($password, $hashpass);
            if ($passcorrect == true) {
                require '../src/View/login.submit.connected.php';
                $_SESSION['user'] = $user;
            } elseif(password_verify($password, $hashpass) == false) {
                header('Location: index.php?action=login.form&login=invalid');
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
        require '../src/View/user.form.php';
    }

    public function actionInsert($firstname, $lastname, $email, $password)
    {
        $userManager = new UserRepository();
        $user = $userManager->getOneByEmail($email);
        if (!empty($user)) {
            throw new \Exception('L\'email est déja pris, réessayez !');
        } else {
            $user = $userManager->insert($firstname, $lastname, $email, $password);
        }
        require '../src/View/user.insert.php';
    }
}
