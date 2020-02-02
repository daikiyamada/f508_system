<html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$year = substr($_GET["date"],0,4);
$month = substr($_GET["date"],4,2);
$day = substr($_GET["date"],6);
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
<table>
  <tr><th>コマ</th><th>空き状況</th><th>代表者名</th><th>使用目的</th><th>予約フォーム</th></tr>
  <?php
  require 'Manager.php';
    try{
      $db = connect();
      $stt = $db->prepare('SELECT * FROM Reservation WHERE date = :date and class = :class');
      for($i=0;$i<7;$i++){
        $stt-> execute(array(':date'=>$_GET["date"], 'class'=>$i));
        $now = $stt->fetch();
  ?>
  <tr>
    <td><?php print $i; ?>コマ</td>
 <td><?php
  if($now==false){
    print "空き";
  }
  else{
    print "予約済";
  }
  ?>
</td>
<td>
   <?php
   if($now== false){
     print " ";
   }
   else{
     $stt2 = $db->prepare('SELECT * FROM f508system WHERE ID = :ID');
     $stt2 -> execute(array(':ID'=>$now['ID']));
     if($stt2==false){ print "bW";}
     else{
     $name = $stt2->fetch();
     print $name['Name'];
   }
   $db2=NULL;
   }
    ?>
  </td>
  <td>
    <?php
    if($now==false){
      print " ";
    }
    else{
      print $now['purpose'];
    }
    ?>
  </td>
  <td>
    <?php
    if($now==false){?>
      <form method="POST" action="reserve_form.php">
      <input type="hidden" name="reserveID" value=" ">
      <input type="hidden" name="date" value="<?php print $_GET['date']?>">
      <input type="hidden" name="class" value="<?php print $i?>">
      <input type="submit" value="登録"><br>
    </form>
<?php    }
    else{?>
      <form method="GET" action="del.php">
      <input type="submit" value="削除">
      <input type="hidden" name="date" value="<?php print $_GET['date']?>">
      <input type="hidden" name="class" value="<?php print $i?>">
      <input type = "hidden" name="ID" value = "<?php print $now['ID']?>">
    </form>
  <?php  }
    ?>
  </td>
</tr>
 <?php
 }
 $db = NULL;
 }catch(PDOException $e){
   die("エラー発生:{$e->getMessage}");
 }
  ?>
</table>
</body>
</html>
