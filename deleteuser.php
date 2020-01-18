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
  <link rel="stylesheet" type="text/css" href="Homepage.css" />
<body>
<h1 id="title1">研究室管理システム</h1>
<hr id="cp_hr04" />
<ul id="menu">
<li id="menu0"><a> メニュー</a></li>
<li id="menu1"><a href="index.html"> トップページ</a></li>
<li id="menu3"><a href="calendar.html">予約状況確認</a></li>
</ul>
<form method="POST" action="delete.php">
<table border = "1">
  <tr>
    <th>削除ボタン</th><th>学籍番号</th><th>氏名</th>
  </tr>
  <?php
  try{
    $db = connect();
    $stt = $db->prepare('SELECT * FROM f508system');
    $stt->execute();
    $ct = 0;
    while($row = $stt -> fetch(PDO::FETCH_ASSOC)){
      $ct++;
  ?>
  <tr>
    <td>
      <input type="radio" name="ID" value="<?php print($row['ID'])?>" action="delete.php" method ="POST"/>
    </td>
    <td>
      <?php print es($row['ID']);?>
    </td>
    <td>
      <?php print es($row['Name']);?>
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

</body>
</html>
