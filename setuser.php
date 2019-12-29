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
<li id="menu1"><a href="index.html"> トップページ</a></li>
<li id="menu3"><a href="calendar.html">予約状況確認</a></li>
</ul>
<h1 id =news_head>お知らせ</h1>
<!--データベースへの接続処理を行う-->
<?php
function connect(){
  $dsn = 'mysql:dbname=f508system; host=localhost; charset=utf8';
  $usr = 'root';
  $passwd='Daiki_06890516';

  try{
    $db=new PDO($dsn,$usr,$passwd);
    print 'DBへの接続が成功しました。';
  } catch(PDOException $e){
    exit("接続失敗です。:{$e->getMessage()}");
    require('index.html');
  }
  return $db;
}
 ?>
 <br>
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
