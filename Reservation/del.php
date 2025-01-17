<?php
require_once 'Manager.php';
try{
  //データベースに接続してPDOオブジェクトを作成
  $db=connect();
  $sql = 'DELETE FROM Reservation WHERE date=:date and class = :class and ID = :ID';
  //プリペアドステートメントを生成
  $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  //プリペアドステートメントを実行
  $stt->execute(array(':date' => $_POST['date'],':class' => $_POST['class'], ':ID' => $_POST['ID']));
  $db = NULL;
}catch (PDOException $e){
  exit("エラーが発生しました:{$e->getMessage()}");
}
//処理完了後、登録ページを再表示
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/calendar.php?year='.substr($_POST['date'],0,4).'&month='.substr($_POST['date'],5,1));
?>
