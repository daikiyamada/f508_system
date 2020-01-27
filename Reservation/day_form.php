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
  <h1 id="title1">予約画面</h1>
</div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="calendar.html">F508管理システム</a></li>
</ul>
<?php
print $_GET["date"];
?>
<table id="table">
  <tr>
    <th>時間</th>
    <th>予約状況</th>
  </tr>
  <tr>
    <td>0コマ(~9:00)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
  <tr>
    <td>1コマ(9:00~10:30)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
  <tr>
    <td>2コマ(10:45~12:15)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
  <tr>
    <td>昼休み(12:20~13:00)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  <tr>
    <td>3コマ(13:05~14:35)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
  <tr>
    <td>4コマ(14:50~16:20)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
  <tr>
    <td>5コマ(16:35~18:05)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
  <tr>
    <td>6コマ(18:20~19:50)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
  <tr>
    <td>放課後(20:00~21:00)</td>
    <td> 予約ボタン・キャンセルボタン</td>
  </tr>
</table>
</body>
</html>
