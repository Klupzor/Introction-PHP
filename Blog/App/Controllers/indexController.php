<?php
 namespace App\Controllers;

class indexController extends BaseController{
  public function getIndex(){

    // la definimos global para que la importe de scope superior
    global $pdo;

    $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
    $query->execute();


    $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);
    return $this->render('index.twig',['blogPost' => $blogPost]);

     // include '../views/index.php';
  }
}
 ?>
