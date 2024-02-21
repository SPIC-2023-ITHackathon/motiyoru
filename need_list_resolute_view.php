<?php
  $needList = $_POST["needList"];
  $json = file_get_contents('./db.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json,true);
  $arr[0]["needList"] = $needList;
  $arr = json_encode($arr);
  file_put_contents("db.json" , $arr);
  var_dump($arr);

?>