<?php
session_start();
session_set_cookie_params(60 * 5);
if(!$_SESSION['ID']){
?>
<script type ="text/javascript">
window.alert("ログインしてください");
location.href="/Reservation/login.php";
</script>
<?php
}
else{
  $_SESSION['ID'] = $_SESSION['ID'];
}
 ?>
 <!DOCTYPE html>
<?xml version="1.0" encoding="utf-8"?>
<?php
require_once 'Manager.php'; //データベースへの接続
require_once 'Escape.php'; //エスケープ処理を行うソースファイルの読み込み
 ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <title>研究室管理システム</title>
</head>
  <link rel="stylesheet" type="text/css" href="/Homepage.css" />
<body>
  <div id="back1">
    <hr id="line1"/>
    <h1 id="title1">予約削除</h1>
  </div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="calendar.php">F508管理システム</a></li>
<li><a href="logout.php">ログアウト</a></li>
</ul>
<form method="POST" action="del.php">
<table border = "1">
  <tr>
    <th>日付</th><th>コマ</th><th>学籍番号</th><th>用途</th>
  </tr>
  <?php
  try{
    $db = connect();
    $stt = $db->prepare('SELECT * FROM Reservation');
    $stt->execute();
    $ct = 0;
    while($row = $stt -> fetch(PDO::FETCH_ASSOC)){
      $ct++;
  ?>
  <tr>
    <td>
      <?php print es($row['date']);?>
    </td>
    <td>
      <?php print es($row['class']);?>
    </td>
    <td>
      <?php print es($row['ID']);?>
    </td>
    <td>
      <?php print es($row['purpose']);?>
    </td>
  </tr>
<?php
}
$db = NULL;
}catch(PDOException $e){
  die("エラー発生:{$e->getMessage}");
}
?>
</table>
<input type = "hidden" name = "ct" value="<?php print($ct);?>"/>
</form>
<script type="text/javascript" style="text-align: right;">
<!--
  var modified = new Date(document.lastModified);
  var yy = modified.getFullYear();
  var mm= modified.getMonth() + 1;
  var dd = modified.getDate();
  document.write('最終更新日:' + yy + '年' + mm + '月' + dd + '日');
  //
-->
</script>
</body>
</html>
