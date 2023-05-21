<?php
namespace App\controllers;

use App\core\Controller;

class UserController extends Controller
{

    public function profile() {
        return $this->render('pages/profile');
    }

}