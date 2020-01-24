
<?php
function connect_yoshida(){
  $dsn = 'mysql:dbname=reservation;dbost=54.250.152.98';
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
