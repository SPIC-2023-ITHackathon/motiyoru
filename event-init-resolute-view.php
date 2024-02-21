<?php
  $date = $_POST["date"];
  $budget = $_POST["budget"];
  $location = $_POST["location"];
  $id = preg_replace_callback(
    '/x|y/',
    function($m) {
      return dechex($m[0] === 'x' ? random_int(0, 15) : random_int(8, 11));
    },
    'xxxxxxxx_xxxx_4xxx_yxxx_xxxxxxxxxxxx'
  );

  $arr = array(
    [
      "id" => $id,
      "date" => $date,
      "budget" => $budget,
      "location" => $location,
      "attendList" => array(
          "name" => array_fill(0, 5, ""),
          "isAttend" => array_fill(0, 5, "NG"),
          "memo" => array_fill(0, 5, "")
      ),
      "needList" => array(
        "name" => array_fill(0, 5, ""),
        "quantity" => array_fill(0, 5, ""),
      ),
    ]
  );
  $arr = json_encode($arr);
  file_put_contents("db.json" , $arr);

  $json = file_get_contents('./db.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json,true);
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
      <p>一人当たりの予算:<?=$arr[0]["budget"] ?></p>
      <p>場所:<?=$arr[0]["location"] ?></p>
</body>
</html>