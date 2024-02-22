<?php
  $json = file_get_contents('./db.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json,true);
  $arr = $arr[0];
  $date_time = $arr["datetime"];
  $date_time = explode('-', $date_time);
  $time = explode('T', $date_time[2])[1];
  $date_time[2] = explode('T', $date_time[2])[0];
  $time = explode(':', $time);
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>メニュー画面</title>
    <link rel="stylesheet" href="menu.css" />
  </head>

  <body>
    <div id="a">
      <div id="b">
        <!-- 決定した日時と場所 -->
        <div>
          <h1><?=$date_time[1] ?>月<?=$date_time[2] ?>日<?=$time[0] ?>時<?=$time[1] ?>分<br><?=$arr["location"] ?></h1>
          <img id="sakura" src="sakura.png" alt="桜" />
        </div>

        <!-- 画面を移動する画像 -->
        <ul>
          <li>
            <a href="./need_list.php">
              <img id="bag" src="bag.png" alt="必要な物リスト" />things
            </a>
          </li>
          <li>
            <a href="./add_member.php">
              <img id="person" src="person.png" alt="参加確認リスト" />member
            </a>
          </li>
          <li>
            <a href="./mobile.php">
              <img id="link" src="link.png" alt="共有するリンク" />link
            </a>
          </li>
        </ul>
      </div>
    </div>
  </body>
</html>
