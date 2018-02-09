<?php
namespace APP\Controllers\Admin;

class PostController {
  public function getIndex(){
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
    $query->execute();


    $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);


    return render('../views/admin/posts.php', ['blogPost' => $blogPost]);
  }

    public function getCreate(){
      return render('../views/admin/insert-post.php');

    }

    public function postCreate(){
      global  $pdo;
      $sql = 'INSERT INTO blog_post(title, content) VALUES (:title, :content)';
      $query = $pdo->prepare($sql);
      $result = $query->execute([
        'title' => $_POST['title'],
        'content' => $_POST['content']

      ]);

     return render('../views/admin/insert-post.php',['result' => $result]);
    }
}

 ?>
