<?php
  $datetime = $_POST["datetime"];
  $budget = $_POST["budget"];
  $location = $_POST["location"];
  $address = $_POST["address"];
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
      "datetime" => $datetime,
      "budget" => $budget,
      "location" => $location,
      "address" => $address,
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

  header("Location: ./menu.php");
  exit;
?>