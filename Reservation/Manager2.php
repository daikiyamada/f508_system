
<?php
function connect_yoshida(){
<<<<<<< HEAD:Reservation/Manager2.php
  $dsn = 'mysql:dbname=reservation;dbhost=54.250.152.98';
=======
  $dsn = 'mysql:dbname=reservation;host=54.250.152.98';
>>>>>>> master:Manager.php
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
