<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Users;
use App\Http\Utils\UserSession;

class SigninController extends BaseController
{
    public function signin(request $req){

        $users = Users::all();
        
    if($req->method() === 'GET'){
            //dump($req);
        return view('signin', [
            'users' => $users,
        ]);
      }else{
          $users = Users::all();
          //dump($users);
          foreach($users as $user){
              if($user["pseudo"] === $_POST["login"] && $user["pass"] === $_POST["pass"]) {
                  UserSession::connect($user["pseudo"], $user["id"]);
                  return redirect()->route('home');
              }
          }        
      } 

    }
}
