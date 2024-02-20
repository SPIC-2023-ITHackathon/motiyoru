<?php
  $date = $_POST["date"];
  $money = $_POST["moeny"];
  $map = $_POST["map"];
  $id = preg_replace_callback(
    '/x|y/',
    function($m) {
      return dechex($m[0] === 'x' ? random_int(0, 15) : random_int(8, 11));
    },
    'xxxxxxxx_xxxx_4xxx_yxxx_xxxxxxxxxxxx'
  );

  $arr = array(
    "res" => array(
      [
        "id" => $id,
        "date" => $date,
        "money" => $money,
        "map" => $map,
      ]
    )
  );
  $arr = json_encode($arr);
  file_put_contents("db.json" , $arr);

  $json = file_get_contents('./db.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json,true);
  $arr = $arr["res"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
      <p>日時:<?=$arr[0]["date"] ?></p>
      <p>一人当たりの予算:<?=$arr[0]["money"] ?></p>
      <p>場所:<?=$arr[0]["map"] ?></p>
</body>
</html>