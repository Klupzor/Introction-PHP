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
          <?php   foreach ($blogPost as $blog_post): ?>
            <div class="blog-post">
            <h2><?php echo $blog_post['title'] ?></h2>
            <p>Jan 1, 2020 <a href="#"> </a> </p>
            <div class="blog-post-image">
              <img src="images/teclado.jpg" alt="Teclado">
            </div>
            <div class="blog-post-content">
              <?php echo $blog_post['content'] ?>
            </div>
            </div>
          <?php endforeach ?>
          </div>
        <div class="col-md-4">
          Sidebar
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <footer>
            This is a footer <br>
            <a href="<?php echo BASE_URL; ?>admin">Admin Panel</a>
          </footer>
        </div>
      </div>
    </div>
  </body>
</html>
