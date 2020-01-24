<?php
function connect(){
  $dsn = 'mysql:dbname=student;dbhost=localhost';
  $usr = 'root';
  $pass = "daiki06890516";
  try{
    $db = new PDO($dsn, $usr,$pass);
  }catch(PDOException $e){
    exit("データベース接続失敗:{$e->getMessage()}");
  }
  return $db;
}

function connect2(){
  $dsn = 'mysql:dbname=reservation;dbhost=54.250.152.98';
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
