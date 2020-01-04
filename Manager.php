<?php
function connect(){
  $dsn = 'mysql:dbname=student;host=localhost';
  $usr = 'root';
  try{
    $db = new PDO($dsn, $usr,$passwd);
  }catch(PDOException $e){
    exit("データベース接続失敗:{$e->getMessage()}");
  }
  return $db;
}
 ?>
