<?php
require_once 'config.php';

$queryResult = $pdo->query("SELECT * FROM users");
// while ($row = $queryResult->fetch()) {
//   var_dump($row);
// }

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
      <h1>List Users</h1>
      <a href="index.php">Home</a>
      <table class="table">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>

        <?php
        while ($row = $queryResult->fetch()) {
          echo "<tr>";
          echo "<td>" .$row['name'] . "</td>";
          echo "<td>" .$row['email'] . "</td>";
          echo '<td><a href="update.php?id=' . $row['id'] . '">Edit</a></td>';
          echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
          echo "</tr>";
        }
         ?>

      </table>
    </div>
  </body>
</html>
