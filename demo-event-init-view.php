<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="./demo-event-init-resolute-view.php" method="post">
    <div>
      <label for="date">日時</label>
      <input type="datetime-local" name="date" id="date">
    </div>

    <div>
      <label for="moeny">一人当たりの予算</label>
      <input type="number" min="0" name="moeny" id="moeny">
    </div>

    <div>
      <label for="map">場所</label>
      <input type="url" name="map" id="map">
    </div>

    <div>
      <button type="submit">送信</button>
    </div>
  </form>
</body>
</html>