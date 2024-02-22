<?php
  $json = file_get_contents('./db.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json,true);
  $attendList = $arr[0]["attendList"];
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="add_member.css" />
    <title>メンバー追加</title>
  </head>
  <body>
    <div id="membeer_screen">
      
      <div class="title">
        <h1>member</h1>
      </div>
      <div id="detail">
        <form action="./add_member_resolute_view.php" method="post">
          <table class="table">
            <thead>
              <tr>
                <th id="name">名前</th>
                <th id="confirm">参加可否</th>
                <th id="memo">メモ</th>
              </tr>
            </thead>
            <tbody>
              <?php for($index = 0; $index < 5; $index++): ?>
                <tr>
                  <td>
                    <input type="text" class="name" name="attendList[name][<?= $index ?>]" size="10" value="<?= $attendList["name"][$index]?>"/>
                  </td>
                  <td>
                    <div>
                      <input type="radio" class="event" name="attendList[isAttend][<?= $index ?>]" value="OK" <?php if(strcmp($attendList["isAttend"][$index], "OK") == 0): ?>checked<?php endif;?>/>
                      <label>参加</label>
                    </div>
                    <div>
                      <input type="radio" class="event" name="attendList[isAttend][<?= $index?>]" value="NG" <?php if(strcmp($attendList["isAttend"][$index], "NG") == 0): ?>checked<?php endif;?>/>
                      <label>不参加</label>
                    </div>
                  </td>
                  <td>
                    <textarea class="memo" name="attendList[memo][<?= $index?>]" rows="3" cols="40" placeholder="持ち込みや連絡事項があれば記入してください。"><?= $attendList["memo"][$index]?></textarea>
                  </td>
                </tr>
              <?php endfor;?>
    
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <button type="submit" class="save">保存</button>
                </td>
              </tr>
            </tfoot>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>
