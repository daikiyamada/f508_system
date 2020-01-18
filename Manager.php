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

function popup(){
 $test_alert = "<script type='text/javascript'>alert('こんにちは！侍エンジニア塾です。');</script>";
 echo $test_alert;
}
 ?>
