<?php
function connect(){
  $dsn = 'mysql:dbname=student;host=127.0.0.1';
  $usr = 'root';
  $pass = "daiki06890516";
  try{
    $db = new PDO($dsn, $usr,$pass);
  }catch(PDOException $e){
    exit("データベース接続失敗:{$e->getMessage()}");
  }
  return $db;
}
 ?>
