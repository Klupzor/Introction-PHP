<?php
include_once 'config.php';

if (!empty($_POST)) {
  $id = $_POST['id'];
  $newName = $_POST['name'];
  $newEmail = $_POST['email'];

  $sql = "UPDATE users SET name=:name, email=:email WHERE id=:id";
  $query = $pdo->prepare($sql);

  $query->execute([
    'id' => $id,
    'name' => $newName,
    'email' => $newEmail
  ]);

  $nameValue = $newName;
  $emailValue = $newEmail;
  
} else {
  $id = $_GET['id'];
  // var_dump($id);
  $sql = "SELECT * FROM users WHERE id=:id";
  $query = $pdo->prepare($sql);

  $query->execute([
    'id' => $id
  ]);

  $row = $query->fetch(PDO::FETCH_ASSOC);
  $nameValue = $row['name'];
  $emailValue = $row['email'];
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
      <h1>Update User</h1>
      <a href="list.php">Back</a>
      <form class="" action="update.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $nameValue; ?>" id="name">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $emailValue; ?>" id="email">
        <br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="" value="Update">
      </form>
    </div>
  </body>
</html>
