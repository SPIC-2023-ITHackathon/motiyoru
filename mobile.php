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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スマホ画面</title>
    <link rel="stylesheet" href="./mobile.css">
</head>

<body>
    <div id="mainArea">
        <div id="innerArea">
            <p class="schedule">日時</p>
            <p class="detail"><?=$date_time[1] ?>月<?=$date_time[2] ?>日<?=$time[0] ?>時<?=$time[1] ?>分</p>
            <p class="schedule">場所</p>
            <p class="detail"><?=$arr["location"] ?></p>
            <p class="schedule">住所</p>
            <p class="detail"><?=$arr["address"] ?></p>

            <p class="schedule">予算</p>
            <p class="detail"><?=$arr["budget"] ?></p>
        </div>
        <div id="thingsArea">
            <p class="schedule">持ち物</p>
            <div class="detail" id="things">
                <table>
                    <thead>
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <?php if(!empty($arr["needList"]["name"][$i]) and !empty($arr["needList"]["quantity"][$i])):?>
                            <tr>
                                <th class="product"><?=$arr["needList"]["name"][$i] ?></th>
                                <th class="quantity"><?=$arr["needList"]["quantity"][$i] ?>個</th>
                            </tr>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </thead>

                </table>
            </div>
        </div>
    </div>

</body>

</html>