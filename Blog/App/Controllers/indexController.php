<?php
 namespace App\Controllers;
 use App\models\BlogPost;
 
class indexController extends BaseController{
  public function getIndex(){
    $blogPost = BlogPost::query()->orderBy('id', 'desc')->get();

    return $this->render('index.twig',['blogPost' => $blogPost]);

     // include '../views/index.php';
  }
}
 ?>
