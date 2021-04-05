<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Index</title>
</head>

<body>
  <div>
    <hr style="border-top:1px solid #ccc;" />
    <div>

    <div class="container-lg bg-info text-white border rounded">

      <form method="POST" action="search.php">
        <div class="form-inline">
          <input class="form-control" type="text" name="keyword" placeholder="Search here..." required="required" />
          <button class="btn btn-primary" name="search">Search</button>
        </div>
      </form>
    </div>

    <div class="container-lg bg-secondary text-white border rounded">
      <div class="container-md">
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input  type="file" name="file">
        <button type="submit" name="filesubmit">Upload</button>
      </form>
    </div>
    </div>
    </div>


    </div>
    <div>
    <div class="container-sm">
      <table class="table">
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
  </div>
</body>

</html>