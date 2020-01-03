<?php
function connect(){
  $dsn = 'mysql:dbname=student; host=172.31.33.161; charset=utf8';
  $usr = 'root';
  $passwd = "Daiki_06890516";
  try{
    $db = new PDO($dsn, $usr,$passwd);
  }catch(PDOException $e){
    exit("データベース接続失敗:{$e->getMessage()}");
  }
  return $db;
}
 ?>
