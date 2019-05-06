<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get(
    '/',
    [
        'as' => 'home',
        'uses' => 'HomeController@home'
    ]
);

$router->get(
    '/signup',
    [
        'as' => 'signup',
        'uses' => 'SignupController@signup'
    ]
);

$router->post(
    '/signup',
    [
        'as' => 'signup',
        'uses' => 'SignupController@signup'
    ]
);

$router->get(
    '/signin',
    [
        'as' => 'signin',
        'uses' => 'SigninController@signin'
    ]
);

$router->post(
    '/signin',
    [
        'as' => 'signin',
        'uses' => 'SigninController@signin'
    ]
);

$router->get(
    '/signout',
    [
        'as' => 'signout',
        'uses' => 'SignoutController@signout'
    ]
);

$router->get(
    '/loadmessage',
    [
        'as' => 'loadmessage',
        'uses' => 'ChatController@loadMessage'
    ]
);

$router->post(
    '/addmessage',
    [
        'as' => 'addmessage',
        'uses' => 'ChatController@addMessage'
    ]
);
