<?php require_once 'Manager2.php';
try{
  $db = connect_yoshida();
  $sql = "DELETE FROM Reservation WHERE =:ReservationNumber"; //SQL文の作成
  $stt = $db->prepare($sql);
  $stt -> execute(array(':ReservationNumber' =>$_POST['ReservationNumber']));
  print $_POST['ReservationNumber'];
}catch(PDOException $e){
  die("エラーが発生: {$e ->getMEssage()}");
}
$db = NULL;
//header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/userlists.php');
 ?>
