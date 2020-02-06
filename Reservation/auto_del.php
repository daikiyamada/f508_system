<?php
require_once 'Manager.php';
try{
  //データベースに接続してPDOオブジェクトを作成
  $db=connect();
  $now = date('Ymd');
  $sql = 'DELETE FROM Reservation WHERE date = :date and class = :class';
  //プリペアドステートメントを生成
  $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  //プリペアドステートメントを実行
/*  for(int $i=0;$i<7;$i++){
    $stt->execute(array(':date' => $now, ':class' => $i));
}*/
  $db = NULL;
}catch (PDOException $e){
  exit("エラーが発生しました:{$e->getMessage()}");
}
//処理完了後、登録ページを再表示
//header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/calendar.html')
?>
aaaa
</body>
</html>
