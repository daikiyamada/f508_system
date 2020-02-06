<?php
require_once 'Manager.php';
try{
  //データベースに接続してPDOオブジェクトを作成
  $db=connect();
  $sql = 'DELETE FROM Reservation WHERE date < :date';
  //プリペアドステートメントを生成
  $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  //プリペアドステートメントを実行
  $stt->execute(':date' => String(date('Ymd')));
  $db = NULL;
}catch (PDOException $e){
  exit("エラーが発生しました:{$e->getMessage()}");
}
//処理完了後、登録ページを再表示
//header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/calendar.html')
?>
</body>
</html>
