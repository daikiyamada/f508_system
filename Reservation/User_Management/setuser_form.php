<?php
session_set_cookie_params(60 * 3);
session_start();
if(!$_SESSION['ID']){
?>
<script type ="text/javascript">
window.alert("ログインしてください");
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
    <h1 id="title1">ユーザ登録画面</h1>
  </div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="../calendar.html">F508管理システム</a></li>
</ul>
登録するユーザ情報の入力をしてください。
<form action="setuser.php" method="POST">
  学籍番号：<input type="text" name = "ID"/> <br/>
  氏名：<input type = "text" name ="Name"/> <br/>
  パスワード（16文字以下）：<input type="text" name="pw"/><br/>
  <input type="submit" value="登録">
</form>
<br />
<!--
  <script type="text/javascript" style="text-align: right;">
  var modified = new Date(document.lastModified);
  var yy = modified.getFullYear();
  var mm= modified.getMonth() + 1;
  var dd = modified.getDate();
  document.write('最終更新日:' + yy + '年' + mm + '月' + dd + '日');
</script>
-->

</body>
</html>
