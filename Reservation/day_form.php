<html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <title>予約状況</title>
</head>
  <link rel="stylesheet" type="text/css" href="day_reserve.css" />
<body>
<h1 id="title1"></h1>
<hr id="cp_hr04" />
<?php
print $_POST['Year'];
print $_POST['Month'];
print $_POST['Day'];
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