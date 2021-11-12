<?php

namespace App\Controller;

class HomeController
{
    public function actionHome()
    {
        require('../src/View/home.show.php');
    }
}
