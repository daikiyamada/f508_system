<?php
session_set_cookie_params(60 * 3);
session_start();
if(!$_SESSION['Manager']){
?>
<script type ="text/javascript">
window.alert("管理者権限です。ログインできません。");
location.href="/Reservation/login.php";
</script>
<?php
}
 ?>
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
    <h1 id="title1">ユーザ管理</h1>
  </div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="setuser_form.php">ユーザ登録</a></li>
<li><a href="deleteuser.php">ユーザ削除</a></li>
</ul>
<h1 id =news_head>お知らせ</h1>
<p>ユーザ登録とユーザ削除機能は完成しました。</p>
<script type="text/javascript" style="text-align: right;">
  var modified = new Date(document.lastModified);
  var yy = modified.getFullYear();
  var mm= modified.getMonth() + 1;
  var dd = modified.getDate();
  document.write('最終更新日:' + yy + '年' + mm + '月' + dd + '日');
</script>
</body>
</html>
