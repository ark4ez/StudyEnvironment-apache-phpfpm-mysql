<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php

  echo($_POST["name"]);
  echo($_POST["password"]);

  $dsn = 'mysql:host=mysql;port=3306;dbname=db';
  $user = 'user';
  $password = 'password';

  try {

    $dbh = new PDO($dsn, $user, $password, array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));

    $dbh->beginTransaction();

    $statement = $dbh->prepare("select * from test;");

    $result = $statement->execute();

    if($result){
      $array = $statement->fetchAll();
      foreach ($array as $obj) {
        echo $obj["name"];
      }
    }

  } catch (PDOException $e) {
    echo ($e);
  }






  ?>
</body>

</html>