<?php

namespace APP\Controllers\Admin;
use App\models\User;
use App\Controllers\BaseController;

class UserController extends BaseController{
    public function  getIndex(){
        $users = User::all();
        return $this->render('admin/users.twig', [
            'users' => $users
        ]);

    }
}
