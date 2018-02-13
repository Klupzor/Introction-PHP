<?php
namespace APP\Controllers\Admin;

use App\Controllers\BaseController;
use App\models\BlogPost;
use Sirius\Validation\Validator;
class PostController extends BaseController {
  public function getIndex(){
    $blogPost = BlogPost::all();

    return $this->render('admin/posts.twig', ['blogPost' => $blogPost]);
  }

    public function getCreate(){
      return $this->render('admin/insert-post.twig');

    }

    public function postCreate(){
      $errors = [];
      $result = false;

      $validator = new Validator();
      $validator->add('title','required');
      $validator->add('content','required');
      if ($validator->validate($_POST)) {
        $blogPost = new BlogPost([
          'title' => $_POST['title'],
          'content' => $_POST['content']

        ]);
        
        if ($_POST['image']){
            $blogPost->img_url = $_POST['image'];
        }
        
        $blogPost->save();
        $result = true;

      }else {
        $errors = $validator->getMessages();
        // var_dump($errors);
      }

     return $this->render('admin/insert-post.twig',[
       'result' => $result,
       'errors' => $errors
     ]);
    }
}

 ?>
