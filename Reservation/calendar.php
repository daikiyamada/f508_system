<!DOCTYPE html>
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
        <li><a href="User_Management/password_change.php">パスワードの変更</a></li>
        <li><a href="User_Management/login_management_check.php">ユーザ管理（管理者権限）</a></li>
        <li><a href="http://shinolab.tech">篠宮研究室</a></li>
        <li><a href="http://teraylab.net/">寺島研究室</a></li>
    </ul>
    <div style="text-align: center;">
    <button id="prev" type="button">前の月</button>
    <button id="now" type="button">今月</button>
    <button id="next" type="button">次の月</button>
    </div>
    <script type="text/javascript" src="calendar.js" class="calendar"></script>
</body>
</html>
