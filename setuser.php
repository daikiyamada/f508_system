<!DOCTYPE html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <title>研究室管理システム</title>
</head>
  <link rel="stylesheet" type="text/css" href="Homepage.css" />
<body>
  <div id="back1">
    <hr id="line1"/>
    <h1 id="title1">ユーザ登録</h1>
  </div>
<ul id="menu">
<li><a href="index.html">Home</a></li>
<li><a href="calendar.html">F508管理システム</a></li>
</ul>
<h1 id =news_head>お知らせ</h1>
<?php
require_once 'Manager.php';
var id = $_POST['ID'];
var name = $_POST['Name'];
var pw = $_POST['pw'];
$check="<script> window.confirm('【登録内容】\n 学籍番号：id \n 氏名：name\n パスワード：pw\n この内容で登録しますか？');</script>";
if($check==true){
  try{
    //データベースに接続してPDOオブジェクトを作成
    $db=connect();
    $sql = 'INSERT INTO f508system(ID,Name,pw) VALUES(:ID,:Name,:pw)';
    //プリペアドステートメントを生成
    $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    //プリペアドステートメントを実行
    $stt->execute(array(':ID'=>$_POST['ID'],':Name'=>$_POST['Name'],':pw'=> $_POST['pw']));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
  $check = "<script>alert('登録完了しました')</script>"
  if($check){
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/system_menu.html');
  }
}
else{
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/setuser.html');
}
//処理完了後、登録ページを再表示
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
