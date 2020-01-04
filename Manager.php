<?php
function connect(){
  $dsn = 'mysql:dbname=test; host=localhost; charset=utf8mb4';
  $usr = 'root';
  try{
    $db = new PDO($dsn, $usr,$passwd);
  }catch(PDOException $e){
    exit("データベース接続失敗:{$e->getMessage()}");
  }
  return $db;
}
 ?>
