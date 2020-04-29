<?php
session_start();
if(!$_SESSION['ID']){
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login.php');
}
else{
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/calendar.php?year='.date('Y').'&month='.date('m'));
}
 ?>
