<?php
  require_once 'Manager.php';
  try{
    $db = connect();
    $stt = $db->prepare('SELECT * FROM f508system WHERE ID=:ID');
    $stt -> execute(array(':ID' => $_POST['ID']));
    $usr = $stt -> fetch();
  /*  if($usr['pw']!=$_POST['pw']){
      $alert = "<script type='text/javascript'> alert('パスワードが間違っています。再度入力お願いします。')</script>";
      header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login.php');
    }
    //ログイン認証の成功
    session_start();
    session_regenerate_id(true); //セッションIDを振り直す
    $_SESSION['ID'] = $_POST['ID'];
    $alert = "<script type='text/javascript'> alert('ログインしました')</script>";
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'calendar.html');*/
    $db = NULL;
  }
 ?>
