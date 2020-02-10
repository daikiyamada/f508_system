<?php
  require_once 'Manager.php';
  try{
    $db = connect();
    $stt = $db->prepare('SELECT * FROM f508system WHERE ID=:ID');
    $id = 'Manager';
    $stt -> execute(array(':ID' => $id));
    $usr = $stt -> fetch();
    if($usr['pw']!=$_POST['pw'] && $_POST['ID']!=$id){
      ?>
      <script type='text/javascript'>
      window.alert('管理アカウントのみログイン可能です。再度入力お願いします');
      location.href="/Reservation/calendar.php";
      </script>
      <?php
    }
    session_start();
    session_set_cookie_params(60 * 5);
    session_regenerate_id(true); //セッションIDを振り直す
    $_SESSION['Manager'] = $_POST['ID'];
    ?>
    <script type='text/javascript'>
    window.alert('<?php print $usr['Name']?>さん、ログイン成功しました');
    location.href = "system_menu.html";
    </script>
    <?php
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
 ?>
