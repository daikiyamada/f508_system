<html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
session_set_cookie_params(60 * 5);
if(!$_SESSION['ID']){
?>
<script type ="text/javascript">
window.alert("ログインしてください");
location.href="/Reservation/login.php";
</script>
<?php
}
 ?>
<?php
$year = substr($_GET["date"],0,4);
$month = substr($_GET["date"],4,2);
$day = substr($_GET["date"],6);
 ?>
<head>
  <title>F508管理システム</title>
</head>
  <link rel="stylesheet" type="text/css" href="day_reserve.css" />
  <body>
<div id="back1">
  <hr id="line1"/>
  <h1 id="title1"><?php print $year?>/<?php print $month?>/<?php print $day?>の予約状況</h1>
</div>
<ul id="menu">
<li><a href="/index.html">Home</a></li>
<li><a href="calendar.php">F508管理システム</a></li>
<li><a href="logout.php">ログアウト</a></li>
</ul>
<div class = "form">
各コマの時間は、従来通りとなります。それに加えて、0コマは１コマ前の時間を示し、6コマは放課後を示しています。<br>
使用用途の入力お願いいたします。<br>
使用する時間がコマを跨ぐ場合は、詳細な時間も記入してください。<br>
<br>
</div>
<div class="table1">
<table>
  <tr><th>コマ</th><th>代表者名</th><th>使用目的</th><th>予約フォーム</th></tr>
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
    <td class = "coma"><?php print $i; ?>コマ</td>
<td class="name">
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
   }
    ?>
  </td>
  <td class="purpose">
    <?php
    if($now==false){
      print "";
    }
    else{
      print $now['purpose'];
    }
    ?>
  </td>
  <td class = "button2">
    <?php
    if($now==false){?>
      <form method="POST" action="reserve_form.php">
      <input type="hidden" name="reserveID" value="0">
      <input type="hidden" name="date" value="<?php print $_GET['date']?>">
      <input type="hidden" name="class" value="<?php print $i?>">
      <input type="submit" value="登録" class="button"><br>
    </form>
<?php    }
    else{
      if($_SESSION['ID']==$now['ID']){
      ?>
      <form method="POST" action="del.php">
      <input type="submit" value="削除" class="button">
      <input type="hidden" name="date" value="<?php print $_GET['date']?>">
      <input type="hidden" name="class" value="<?php print $i?>">
      <input type = "hidden" name="ID" value = "<?php print $now['ID']?>">
    </form>
  <?php } }
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
</div>
</body>
</html>
