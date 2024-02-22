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
          <h1>〇月〇日〇時〇〇公園</h1>
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
