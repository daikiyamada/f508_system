<?php
  require_once 'Manager.php';
  try{
    $db = connect();
    $stt = $db->prepare('SELECT * FROM f508system WHERE ID=:ID');
    $stt -> execute(array(':ID' => $_POST['ID']));
    $usr = $stt -> fetch();
    if(password_verify($_POST['pw'],$usr['pw'])===TRUE){
      session_set_cookie_params(60 * 10);
      session_start();
      session_regenerate_id(true); //セッションIDを振り直す
      $_SESSION['ID'] = $_POST['ID'];
      ?>
      <script type='text/javascript'>
      window.alert('<?php print $usr['Name']?>さん、ログイン成功しました');
      location.href = "/Reservation/calendar.php";
      </script>
      <?php
      $db = NULL;
    }
    else{
      ?>
      <script type='text/javascript'>
      window.alert('パスワードが間違っています。再度入力お願いします');
      location.href="/Reservation/login.php";
      </script>
      <?php
    }
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
 ?>
