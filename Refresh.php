<?php require_once 'Manager.php';
try{
  $db = connect();
  $sql = 'DELETE FROM f508system WHERE ID=:ID'; //SQL文の作成
  $stt = $db->prepare($sql));
  /*for($i=1;$i<=$_POST['ct'];$i++){
    $stt -> execute(array(':ID' =>$_POST['ID'.$i]));
  }*/
}catch(PDOException $e){
  die("エラーが発生: {$e ->getMEssage()}");
}
$db = NULL;
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/userlists.php');
 ?>
