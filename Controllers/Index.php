<?php

namespace Controllers;

use Models\Users;

class Index extends \Core\BaseController
{
    protected string $Model = "Users";
    public function index()
    {
        $user= new Users();
        $user->getUsers();
        $Users = $user->getUsers();
        view('index/index' , compact('Users'));
    }

}