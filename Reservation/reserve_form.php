<html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$year = substr($_POST["date"],0,4);
$month = substr($_POST["date"],4,2);
$day = substr($_POST["date"],6);
 ?>
<head>
  <title>F508管理システム</title>
</head>
  <link rel="stylesheet" type="text/css" href="/Homepage.css" />
  <body>
<div id="back1">
  <hr id="line1"/>
  <h1 id="title1"><?php print $year?>/<?php print $month?>/<?php print $day?>の予約状況</h1>
</div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="calendar.html">F508管理システム</a></li>
</ul>
学籍番号と使用用途の入力お願いいたします。<br>
<p id="reserve">
<form method="POST" action="form.php">
  <input type="hidden" name="reserveID" value="<?php print $_POST['reserveID']?>">
  <input type="hidden" name="date" value="<?php print $_POST['date']?>">
  <input type="hidden" name="class" value="<?php print $_POST['class']?>">
  学籍番号：<input type="text" name="ID" value="<?php print $_POST['ID']?>"><br>
  用途：<input type="text" name="purpose" value="<?php print $_POST['purpose']?>"><br>
  <!-- valueの部分は必要なければ削除してください。 -->
  <input type="submit" value="予約">
</form>
</p>
</body>
</html>
