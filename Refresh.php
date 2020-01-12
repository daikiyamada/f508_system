<?php require_once 'Manager.php';
try{
  $db = connect();
  $sql = 'DELETE FROM f508system
         WHERE ID=:ID';
}catch(PDOException $e){
  die("エラーが発生: {$e ->getMEssage()}");
}
$db = NULL;
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/userlists.php');
 ?>
