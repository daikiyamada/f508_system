<!DOCTYPE html>
<?xml version="1.0" encoding="utf-8"?>
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
<li id="menu1"><a href="http://">F508予約システム</a></li>
<li id="menu2" ><a href="http://shinolab.tech">篠宮研究室HP</a></li>
<li id="menu3"><a href="http://teraylab.net/">寺島研究室HP</a></li>
</ul>
<h1 id =news_head>お知らせ</h1>
<p id=news>システム構築中 </p>
<?php session_start(); ?>
<?php
print $val = (isset($_SESSION["user_name"])) ? $_SESSION["user_name"]:""
?>
<?php
print $val = (isset($_COOKIE["user_name"])) ? $_COOKIE["user_name"]:""
?>
<br>
<form method="POST" action = "setuser.php">
  ユーザ名（クッキー保存説明用）：
  <input type="text" name="user" size="50"/>
  <input type ="submit" value="送信"/>
</form>
<form method="POST" action = "session_start.php">
  ユーザ名（セッション用）：
  <input type="text" name="user" size="50"/>
  <input type ="submit" value="送信"/>
</form>
<form method="POST" action = "session_start2.php">
  ユーザ名（セッション切断あり用）：
  <input type="text" name="user" size="50"/>
  <input type ="submit" value="送信"/>
</form>
<div style="text-align: right;">最終更新日：2019年12月23日 </div>

</body>
</html>
