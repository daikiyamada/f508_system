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
    <h1 id="title1">ログイン画面</h1>
  </div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="User_Management/newuser_login.php">新規登録</a></li>
<li><a href="User_Management/forget_pw.php">パスワードを忘れた場合</a></li>
</ul>
<form id="login" action="login_pw.php" method="POST">
  学籍番号：<input type = "text" name = "ID" autocomplete="on"><br>
  パスワード：<input type="password" name="pw" autocomplete="on"><br>
  <input type="submit" value="ログイン" class="button">
</form>
</body>
</html>
