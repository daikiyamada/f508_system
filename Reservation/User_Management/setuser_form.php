<?php
session_set_cookie_params(60 * 5);
session_start();
if(!$_SESSION['Manager']&&!$_SESSION['newuser']){
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
<li><a href="../calendar.php">F508管理システム</a></li>
<li><a href="logout_management.php">ログアウト</a></li>
</ul>
登録するユーザ情報の入力をしてください。
<form action="setuser.php" method="POST">
  学籍番号：<input type="text" name = "ID"/> <br/>
  氏名：<input type = "text" name ="Name"/> <br/>
  パスワード（16文字以下）：<input type="text" name="pw"/><br/>
  メールアドレス（soka-u.jp以外)：<input type="text" name = "mail"/><br/>
  <input type="submit" value="登録">
</form>
</body>
</html>
