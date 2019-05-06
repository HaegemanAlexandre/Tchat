<?php

namespace App\Http\Controllers;
use App\Users;
use App\Http\Utils\UserSession;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class SignupController extends BaseController
{

    public function signup(request $req){

        $errors = [];

       if($req->method() === "POST"){
            
            if ($_POST['pass'] != $_POST['passconfirm']) {
                $errors[] = 'Les deux mots de passes ne sont pas identiques';

        
            }

            if (empty($errors)) {

                $users = new Users;

                $users->pseudo = $_POST['login'];
                $users->pass = $_POST['pass'];

                $users->save();
                $_SESSION['success'] = 'Votre compte à été créé';
                return redirect()->route('signin');

            }
            
        }


            return view('signup',
            [
                'errors' => $errors
                
            ]);
            
    }
}
