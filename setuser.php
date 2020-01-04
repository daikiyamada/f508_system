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
<?php
//require_once 'Manager.php';
try{
  //データベースに接続してPDOオブジェクトを作成
  $db=connect();
  print '成功';
  //$sql = 'INSERT INTO f508system(ID,Name,pw) VALUES(:ID,:Name,:pw)';
  //プリペアドステートメントを生成
  //$stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  //プリペアドステートメントを実行
  //$stt->execute(array(':ID'=>$_POST['ID'],':Name'=>$_POST['Name'],':pw'=> $_POST['pw']));
  //$db = NULL;
}catch (PDOException $e){
  exit("エラーが発生しました:{$e->getMessage()}");
}
//処理完了後、登録ページを再表示
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/setuser.php')
?>
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
