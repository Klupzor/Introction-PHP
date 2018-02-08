<?php
// var_dump($_POST);
require_once 'config.php';
$result = false;

if (!empty($_POST)) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
  $query = $pdo->prepare($sql);

  $query = $pdo->prepare($sql);

  $result = $query->execute([
    'name' => $name,
    'email' => $email,
    'password' => $password
  ]);
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Databases</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <h1>Add User</h1>
      <a href="index.php">Home</a>
      <?php
      if ($result) {
        echo '<div class="alert alert-success"> Success!! </div>';
      }
       ?>

      <form class="" action="add.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" value="" id="name">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" value="" id="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" value="" id="password">
        <br>
        <input type="submit" name="" value="Save">
      </form>
  </body>
</html>
