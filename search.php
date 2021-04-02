<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
</head>

<body>
  <form action="index.php">
    <button name="Back" action="index.php">Back</button>
  </form>
  <?php
  require 'conn.php';

  if (isset($_POST['search'])) {
  ?>
    <table>
      <tr>
        <th>Results</th>
      </tr>
      <?php
      $keyword = $_POST['keyword'];
      $query = $conn->prepare("SELECT * FROM `animals` WHERE (`name` LIKE '%$keyword%') OR (`category` LIKE '%$keyword%') OR (`birthday` LIKE '%$keyword%')");
      $query->execute();
      while ($row = $query->fetch()) {
      ?>
        <tr>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['category'] ?></td>
          <td><?php echo $row['birthday'] ?></td><br>

        </tr>
      <?php
      }
      ?>
    </table>
  <?php
  } else {
  ?>
    <table>
      <tr>
        <th>Name</th>
      </tr>
      <?php
      $query = $conn->prepare("SELECT * FROM `animals`");
      $query->execute();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <tr>
          <td><?php echo $row['name'] ?></td>
        </tr>
      <?php
      }
      ?>
    </table>
  <?php
  }
  ?>
</body>

</html>