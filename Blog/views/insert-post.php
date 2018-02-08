<?php
include_once '../config.php';
$result = false;

if (!empty($_POST)) {

$title = $_POST['title'];
$content = $_POST['content'];

  $sql = "INSERT INTO blog_post(title, content) VALUES (:title, :content)";
  $query = $pdo->prepare($sql);

  $result = $query->execute([
    'title' => $title,
    'content' => $content
  ]);

}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Blog Title</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <h2>New Post</h2>
          <a class="btn btn-primary" href="posts.php">Back</a>
          <br>
          <?php if ($result): ?>
            <div class="alert alert-success">
              Post Saved!!
            </div>
          <?php endif ?>
          <form class="" action="insert-post.php" method="post">
            <div class="form-goup">
              <label for="inputTitle">Title</label>
              <input class="form-control"type="text" name="title" value="" id="inputTitle">
            </div>
            <textarea class="form-control" id="inputContent" name="content" rows="5" ></textarea>
            <br>
            <input class="btn btn-primary"type="submit" value="Save">
          </form>
          </div>
        <div class="col-md-4">
          Sidebar
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <footer>
            This is a footer <br>
            <a href="admin/index.php">Admin Panel</a>
          </footer>
        </div>
      </div>
    </div>
  </body>
</html>