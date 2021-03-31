<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $host = 'localhost';
  $dbname = 'grupparbete';
  $user = 'root';
  $password = '123';

  $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

  $pdo = new PDO($dsn, $user, $password);

  $stmt = $pdo->query('SELECT * FROM posts');

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['title'] . '<br>';
  }
  ?>
</body>

</html>