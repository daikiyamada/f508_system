<html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$year = substr($_GET["date"],0,4);
$month = substr($_GET["date"],4,2);
$day = substr($_GET["date"],6);
 ?>
<head>
  <title>F508管理システム</title>
</head>
  <link rel="stylesheet" type="text/css" href="/Homepage.css" />
  <body>
<div id="back1">
  <hr id="line1"/>
  <h1 id="title1"><?php print $year?>/<?php print $month?>/<?php print $day?>の予約状況</h1>
</div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="calendar.html">F508管理システム</a></li>
</ul>
<table id="table">
  <tr><th>コマ</th><th>空き状況</th><<th>代表者名</th><th>使用目的</th>/tr>
  <?php
  require_once 'Manager.php';
    try{
      $db = connect();
    //  $stt = $db->prepare('SELECT * FROM Reservation WHERE date = :date and class = :class');
    //  for($i=1;i<7;i++){
    //    $stt-> execute(array(':date'=>$_GET["date"], 'class'=>$i));
  ?>
  <tr>
    <td>コマ</td>

 </tr>
 <?php
// }
 $db = NULL;
 }catch(PDOException $e){
   die("エラー発生:{$e->getMessage}");
 }
  ?>
</table>
</body>
</html>
