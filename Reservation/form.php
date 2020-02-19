<?php
require_once 'Manager.php';
$ID = $_POST['ID'];
$class = $_POST['class'];
$purpose = $_POST['purpose'];
$list = array();
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
        array_push($list,$date);
      }
    }
      $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
  if(count($list)==0){
  ?>
  <script type="text/javascript">
    var check = window.alert('予約完了しました。');
  location.href="calendar.php";
  </script>
<?php
 }
 else {
   $result = "以下の日付の予約が埋まっていて、予約できませんでした。<br/>";
   for( $i =0;$i<count($list);$i++){
     $result = $result.$list[$i]."<br/>";
   }
   ?>
   <script type="text/javascript">
   window.alert(<?php print $result?>);
   </script>
<?php
 }?>
