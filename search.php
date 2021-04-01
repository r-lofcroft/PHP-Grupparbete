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
    <table class="table table-bordered">
      <thead class="alert-info">
        <tr>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $keyword = $_POST['keyword'];
        $query = $conn->prepare("SELECT * FROM `animals` WHERE `name` LIKE '%$keyword%'");
        $query->execute();
        while ($row = $query->fetch()) {
        ?>
          <tr>
            <td><?php echo $row['name'] ?></td>

          </tr>


        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  } else {
  ?>
    <table class="table table-bordered">
      <thead class="alert-info">
        <tr>
          <th>Name</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $query = $conn->prepare("SELECT * FROM `animals`");
        $query->execute();
        while ($row = $query->fetch()) {
        ?>
          <tr>
            <td><?php echo $row['name'] ?></td>

          </tr>


        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  }
  ?>
</body>

</html>