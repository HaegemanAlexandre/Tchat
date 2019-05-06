<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Messages;
use App\Users;
use Laravel\Lumen\Routing\Controller as BaseController;

class ChatController extends BaseController{

    public function loadMessage(){
        //header('Content-Type: application/json');
        $messages['message'] = Messages::all();
        $messages['session'] = $_SESSION['currentUser'];
        $messages['users'] = Users::all();
        //$user = Users::where('id', '=', $_GET['user'] )->get();
        //$messages['currentSender'] = $user;
    //$retour['results'] = $results;


    echo json_encode($messages, JSON_PRETTY_PRINT);
    }

    public function addMessage(request $req){

        $message = trim($_POST['message']);
    
        header('Content-Type: application/json');
        $messages = new Messages;
        if (isset($message) && !empty($message)){
                $messages->message = $message;
                $messages->users_id = $_SESSION['currentUser']['userId'];

                $messages->save();

                $result = "ok";
        }else{

            $result = "pas ok";
        }

        echo json_encode($result, JSON_PRETTY_PRINT);

    
        

        /*try {
            $pdo = new PDO('mysql:host=localhost;port=8888;dbname=tchat', 'tchat', 'tchat');
            $retour['success'] = true;
            $retour['message'] = "Connexion à la base de donnée";
        } catch(Exception $e){
            $retour['success'] = false;
            $retour['message'] = "Connexion à la base de donnée impossible";
        }

        if (isset($_POST['message'])){
            $requete = $pdo->prepare('INSERT INTO `messages` (`id`, `message`, `updated_at`, `created_at`, `users_id`) VALUES (NULL, '.$_POST['message'].', NULL, NULL, `1`);');
            //$requete->bindParam(':m', $_GET['message']);
            $requete->execute();
            $results = 'ajouté';
        
        }else{
            $results = "echoué";
        }

        
        echo json_encode($results, JSON_PRETTY_PRINT);*/


 

    }
}