<?php
require_once 'Manager.php';
$ID = $_POST['ID'];
$class = $_POST['class'];
$purpose = $_POST['purpose'];
  try{
    $db=connect();
    $year = (int)substr($_POST["date"],0,4);
    $month = (int)substr($_POST["date"],4,2);
    $day = (int)substr($_POST["date"],6);
    for($i=0;$i<(int)$_POST['time'];$i++){
      $last = $year."-".$month;
      $last_date = date('d', strtotime('last day of ' . $last));
      $now = $day+$i*7;
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
      if($month<10&&strcmp(substr($month,0,1),"0")!=0) $month = "0".$month;
      if($now<10) $now ="0".$now;
      $date = $year.$month.$now;
      $sql = 'SELECT * from Reservation WHERE date=:date and class = :class';
      $stt = $db -> prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
      $stt->execute(array(':reserveID'=>$_POST['reserveID'],':date'=>$date,'class'=>$class));
      $res = $stt->fetch();
      if(!$res){
        $sql = 'INSERT INTO Reservation(reserveID,date,class,ID,purpose) VALUES(:reserveID,:date,:class,:ID,:purpose)';
        $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stt->execute(array(':reserveID'=>$_POST['reserveID'],':date'=>$date,'class'=>$_POST['class'],':ID'=>$ID,':purpose'=> $purpose));
      }
      else{
        ?>
        <script type="text/javascript">
        window.alert('<?php print $now?>は予約埋まっているため、予約できませんでした。');
        </script>
        <?php
      }
    }
      $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
  ?>
  <script type="text/javascript">
  location.href="calendar.php";
  </script>
