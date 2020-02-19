<?php
require_once 'Manager.php';
  try{
    $db=connect();
    $year = (int)substr($_POST["date"],0,4);
    $month = (int)substr($_POST["date"],4,2);
    $day = (int)substr($_POST["date"],6);
    $row = '\n';
    print $year.$month.$day.$row;
    for($i=0;$i<(int)$_POST['time'];$i++){
      $last = $year."-".$month;
      $last_date = date('d', strtotime('last day of ' . $last));
      $now = $day+$i*7;
      print $last_date.$row;
      print "now:".$now.$row;
      if($now > $last_date){
        $now = $now - $last_date;
        if($month ==12){
          $month=1;
          $year++;
        }
        else{
          $month++;
        }
      }
      if($month<10) $month = "0".$month;
      if($now<10) $now ="0".$now;
      $date = $year.$month.$now;
      print $date.$row;
      $sql = 'INSERT INTO Reservation(reserveID,date,class,ID,purpose) VALUES(:reserveID,:date,:class,:ID,:purpose)';
      $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $stt->execute(array(':reserveID'=>$_POST['reserveID'],':date'=>$date,'class'=>$_POST['class'],':ID'=>$_POST['ID'],':purpose'=> $_POST['purpose']));
    }
      $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
  //header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/calendar.php');
  ?>
