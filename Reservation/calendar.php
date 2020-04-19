<?php
require_once 'Manager.php';
$Y = date("Y");
$M = date("m");
try {
  $dbh = connect();
  $date1 = $Y . $M . "01";
  $date2 = $Y . $M . "31";
  $int1 = intval($date1);
  $int2 = intval($date2);

  $sql = "SELECT * FROM Reservation Where date between $int1 and $int2";
  $sth = $dbh->prepare($sql);
  $sth->execute();
  for ($i = 1; $i < 32; $i++){
    $cnt[$i]['c'] = 0;
  }
  while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $date = (int)substr($row['date'],6,2);
    $cnt[$date]['c'] += 1;
  }
  $CData = json_encode($cnt, JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
  echo "接続失敗";
  echo $e->getMessage();
}
$dbh = null;
?>

<!DOCTYPE html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <title>F508予約システム</title>
</head>
<link rel="stylesheet" type="text/css" href=" ../Homepage.css" />
<body>
  <div id="back1">
    <hr id="line1"/>
    <h1 id="title1">F508管理システム</h1>
  </div>
    <ul id="menu">
      <li><a href="../index.html">Home</a></li>
      <li><a href="User_Management/system_menu.html">ユーザ管理</a></li>
      <li><a href="http://shinolab.tech">篠宮研究室</a></li>
      <li><a href="http://teraylab.net/">寺島研究室</a></li>
      <li><a href="form.html">予約確認（仮）</a></li>
    </ul>
    <div style="text-align: center;">
      <button id="prev" type="button">前の月</button>
      <button id="now" type="button">今月</button>
      <button id="next" type="button">次の月</button>
      <div id="calendar"></div>
    <script type="text/javascript" src="calendar.js"></script>
    <script type="text/javascript">
      var cntData = JSON.parse('<?php echo $CData; ?>' || "null");
    </script>
    </div>
    <script type="text/javascript" style="text-align: right;">
      var modified = new Date(document.lastModified);
      var yy = modified.getFullYear();
      var mm = modified.getMonth() + 1;
      var dd = modified.getDate();
      document.write('最終更新日:' + yy + '年' + mm + '月' + dd + '日');
    </script>
</body>
</html>