<?php
 namespace App\Controllers;
use Sirius\Validation\Validator;
use App\models\User;
use App\Log;

class AuthController extends BaseController{
  public function getLogin(){

    return $this->render('login.twig');
  }

  public function postLogin(){
     $validador = new Validator();
     $validador->add('email', 'required');
     $validador->add('email', 'email');
     $validador->add('password', 'required');

     if($validador->validate($_POST)){
         $user = User::where('email', $_POST['email'])->first();
                 if($user){                         
                     if(password_verify($_POST['password'], $user->password)){
                         $_SESSION['userId'] = $user->id;
                         Log::logInfo('Login userId: ' . $user->id);
                         header('Location:' . BASE_URL . 'admin');
                         return null;
                     }
                 }
                 $validador->addMessage('email', 'Password or User incorect!');
     }
     $errors = $validador->getMessages();
    return $this->render('login.twig', [
        'errors' => $errors
    ]);

  }
  
  public function getLogout(){
      unset($_SESSION['userId']);
      header('Location: ' . BASE_URL . 'auth/login');
  }
}

