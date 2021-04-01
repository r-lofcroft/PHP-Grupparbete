<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
  <title>Index</title>
</head>

<body>
  <div>
    <hr style="border-top:1px dotted #ccc;" />
    <div>
      <form method="POST" action="search.php">
        <div class="form-inline">
          <input type="text" class="form-control" name="keyword" placeholder="Search here..." required="required" />
          <button name="search">Search</button>
        </div>
      </form>
    </div>
    </form>
    <div>
      <?php
      require 'conn.php';
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
    </div>
  </div>
</body>

</html>