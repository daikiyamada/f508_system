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
    <h1 id="title1">パスワード変更</h1>
  </div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
</ul>
<form id="login" action="change_password.php" method="POST">
  ID：<?php $_SESSION['ID']さん?>
  <input type="hidden" name="ID" value="<?php print $_SESSION['ID']?>"><br>
  新しいパスワード：<input type="text" name="pw"><br>
  <input type="submit" value="変更">
</form>
</body>
</html>
