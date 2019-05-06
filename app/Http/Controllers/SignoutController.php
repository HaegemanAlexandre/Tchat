<?php

namespace App\Http\Controllers;
use App\Users;
use App\Http\Utils\UserSession;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class SignoutController extends BaseController
{
    public function signout()
    {
        UserSession::disconnect();
        return redirect()->route('home');
    }
}