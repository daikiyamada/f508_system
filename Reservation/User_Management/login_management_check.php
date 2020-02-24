<?php
session_start();
if(!$_SESSION['Manager']){
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login_management.php');
}
else if($_SESSION['Manager']){
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/system_menu.php');
}
 ?>
