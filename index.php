<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
  <title>Index</title>
</head>

<body>
  <div>
    <hr style="border-top:1px solid #ccc;" />
    <div>
      <form method="POST" action="search.php">
        <div class="form-inline">
          <input type="text" name="keyword" placeholder="Search here..." required="required" />
          <button name="search">Search</button>
        </div>
      </form>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="filesubmit">Upload</button>
      </form>
    </div>
    </form>
    <div>
      <table style="border: 1px solid black;">
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Birthday</th>
        <?php
        require 'conn.php';
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
  </div>
</body>

</html>