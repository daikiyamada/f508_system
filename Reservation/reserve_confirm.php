<?php
  require_once 'Manager.php';
  $Y = $_GET['Y'];
  $M = $_GET['M'];
  $dbh = connect();
  $date1 = $Y . $M . "01";
  $date2 = $Y . $M . "31";
  $int1 = intval($date1);
  $int2 = intval($date2);
  $sql = "SELECT * FROM Reservation Where date between $int1 and $int2";
  $sth = $dbh->prepare($sql);
  $sth->execute();
  for ($i = 1; $i < 32; $i++){
    $cnt[$i]['c'] = 0;
  }
  while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $date = (int)substr($row['date'],6,2);
    $cnt[$date]['c'] += 1;
  }
  $dbh = null;
  header("Content-Type: text/javascript; charset=utf-8");
  echo json_encode($cnt);
?>
