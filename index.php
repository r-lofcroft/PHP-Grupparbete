<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Index</title>
</head>

<body>
  <hr style="border-top:1px solid #ccc;" />
  <div class="container p-3 border border-primary rounded">
    <h2 class="m-2">Search</h2>
    <form method="POST" action="search.php">
      <input class="form-control m-2 w-100" type="text" name="keyword" placeholder="Search here..." />
      <select name="selection" class="form-select m-2" data-width="auto">
        <option selected>--Select a Category--</option>
        <?php
        require 'conn.php';
        $list = $conn->prepare("SELECT * FROM animals");
        $list->execute();
        while ($row_list = $list->fetch()) { ?>
          <option><?php echo $row_list['category'] ?></option>
        <?php
        }
        ?>
      </select>
      <button class="btn btn-primary m-2" name="search">Search</button>
    </form>
  </div>


  <div class="container p-3 mt-3 border border-primary rounded">
    <h2>Upload files</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
      <button class="btn btn-primary center m-8" type="submit" name="filesubmit">Upload</button>
    </form>

  </div>



  <div class="container-sm p-3">
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
</body>

</html>