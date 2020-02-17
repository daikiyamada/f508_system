<!DOCTYPE html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <title>研究室管理システム</title>
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
<h1 id =news_head>お知らせ</h1>
<?php
require_once 'Manager.php';
  try{
    //データベースに接続してPDOオブジェクトを作成
    $db=connect();

    $sql = 'INSERT INTO Reservation(reserveID,date,class,ID,purpose) VALUES(:reserveID,:date,:class,:ID,:purpose)';
    //プリペアドステートメントを生成
    $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    //プリペアドステートメントを実行
    $stt->execute(array(':reserveID'=>$_POST['reserveID'],':date'=>$_POST['date'],'class'=>$_POST['class'],':ID'=>$_POST['ID'],':purpose'=> $_POST['purpose']));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
</body>
</html>
