<?php
namespace APP\Controllers\Admin;

use App\Controllers\BaseController;

class PostController extends BaseController {
  public function getIndex(){
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
    $query->execute();


    $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);


    return $this->render('admin/posts.twig', ['blogPost' => $blogPost]);
  }

    public function getCreate(){
      return $this->render('admin/insert-post.twig');

    }

    public function postCreate(){
      global  $pdo;
      $sql = 'INSERT INTO blog_post(title, content) VALUES (:title, :content)';
      $query = $pdo->prepare($sql);
      $result = $query->execute([
        'title' => $_POST['title'],
        'content' => $_POST['content']

      ]);

     return $this->render('admin/insert-post.twig',['result' => $result]);
    }
}

 ?>
