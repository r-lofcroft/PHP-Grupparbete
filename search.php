<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Search</title>
</head>

<body>
  <div class="container p-3 border border-primary rounded" style="margin-top: 2rem">
    <form action="index.php">
      <button class="btn btn-primary center m-8" name="Back" action="index.php">Back</button>
    </form>
  </div>
  <?php
  require 'conn.php';

  if (isset($_POST['search'])) {
  ?>
    <div class="container-sm">
      <table class="table">
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Birthday</th>
        <?php

        $keyword = $_POST['keyword'];
        $selection = $_POST['selection'];
        if ($keyword !== "") {
          $query = $conn->prepare("SELECT * FROM `animals` WHERE (`name` LIKE '%$keyword%') OR (`category` LIKE '%$keyword%') OR (`birthday` LIKE '%$keyword%')");
          $query->execute();
        } else {
          $query = $conn->prepare("SELECT * FROM `animals` WHERE (`category` LIKE '%$selection%')");
          $query->execute();
        }
        $result = $query->fetchAll();


        if (count($result) > 0) {
          foreach ($result as $row) {
        ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['category'] ?></td>
              <td><?php echo $row['birthday'] ?></td>
            </tr>
          <?php
          }
          ?>

        <?php
        } else {
        ?>
          <?php

          echo "<h2>No results found :(</h2>";
          $query = $conn->prepare("SELECT * FROM `animals`");
          $query->execute();
          while ($row = $query->fetch()) {
          ?>

            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['category'] ?></td>
              <td><?php echo $row['birthday'] ?></td>
            </tr>
          <?php
          }
          ?>
      </table>

    </div>
<?php
        }
      }
?>


</body>

</html>