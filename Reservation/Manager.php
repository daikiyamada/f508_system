<?php
function connect(){
  $dsn = 'mysql:dbname=reservation;dbhost=localhost';
  $usr = 'reserve';
  $pass = "fuga";
  try{
    $db = new PDO($dsn, $usr,$pass);
  }catch(PDOException $e){
    exit("データベース接続失敗:{$e->getMessage()}");
  }
  return $db;
}
?>
