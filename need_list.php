<?php
  $json = file_get_contents('./db.json');
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr = json_decode($json,true);
  $needList = $arr[0]["needList"];
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="need_list.css" />
    <title>必要なものリスト</title>
  </head>
  <body>
    <div class="title">
      <h1>things</h1>
    </div>
    <form action="./need_list_resolute_view.php" method="post">
      <table class="table">
        <thead>
          <tr>
            <th class="product">商品名</th>
            <th class="quantity">個数</th>
            <th class="delete"></th>
          </tr>
        </thead>
        <tbody>
          <?php for($index = 0; $index < 5; $index++):?>
          <tr>
            <td>
              <input type="text" class="name" name="needList[name][<?=$index?>]" value="<?=$needList["name"][$index] ?>"/>
            </td>
            <td>
              <select class="pull-menu" name="needList[quantity][<?=$index?>]">
                <option value="">個数を選択</option>
                <?php for($j = 1; $j <= 10; $j++): ?>
                  <?php if( strcmp($needList["quantity"][$index], $j ) != 0):?>
                    <option value="<?=$j?>"><?=$j?></option>
                  <?php else:?>
                    <option value="<?=$j?>" selected><?=$j?></option>
                  <?php endif;?>
                <?php endfor;?>
              </select>
            </td>
          </tr>
          <?php endfor;?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
              <button type="submit">保存</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </form>
  </body>
</html>
