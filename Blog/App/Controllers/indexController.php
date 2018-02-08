<?php
 namespace App\Controllers;

class indexController{
  public function getIndex(){

    // la definimos global para que la importe de scope superior
    global $pdo;

    $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
    $query->execute();


    $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);
    return render('../views/index.php',['blogPost' => $blogPost]);

     // include '../views/index.php';
  }
}
 ?>
