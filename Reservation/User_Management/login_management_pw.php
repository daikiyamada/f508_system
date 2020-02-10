<?php
  require_once 'Manager.php';
  try{
    $db = connect();
    $id = 'Manager';
    $pw = 'Shinomilab';
    if($_POST['pw']!=$pw){
      if($_POST['ID']!=$id){
      ?>
      <script type='text/javascript'>
      window.alert('管理アカウントのみログイン可能です。再度入力お願いします');
      location.href="/Reservation/calendar.php";
      </script>
      <?php
      }
    }
    else {
    session_set_cookie_params(60 * 5);
    session_start();
    session_regenerate_id(true); //セッションIDを振り直す
    $_SESSION['Manager'] = $_POST['ID'];
    ?>
    <script type='text/javascript'>
    window.alert('<?php print $usr['Name']?>さん、ログイン成功しました');
    location.href = "system_menu.html";
    </script>
    <?php
    $db = NULL;
  }
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
 ?>
