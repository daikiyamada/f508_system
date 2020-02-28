<?php require_once 'Manager.php';
try{
  $db = connect_yoshida();
  $sql = "DELETE FROM Reservation WHERE =:reserveID"; //SQL文の作成
  $stt = $db->prepare($sql);
  $stt -> execute(array(':reserveID' =>$_POST['reseveID']));
  print $_POST['reserveID'];
}catch(PDOException $e){
  die("エラーが発生: {$e ->getMEssage()}");
}
$db = NULL;
//header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/userlists.php');
 ?>
