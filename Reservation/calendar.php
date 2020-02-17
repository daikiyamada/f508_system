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
        <li><a href="User_Management/login_management_check.php">ユーザ管理</a></li>
        <li><a href="http://shinolab.tech">篠宮研究室</a></li>
        <li><a href="http://teraylab.net/">寺島研究室</a></li>
        <li><a href="logout.php">ログアウト</a></li>
    </ul>
    <div style="text-align: center;">
    <button id="prev" type="button">前の月</button>
    <button id="now" type="button">今月</button>
    <button id="next" type="button">次の月</button>
    <div id="calendar"></div>
    <script type="text/javascript" src="calendar.js"></script>
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
