<?php
  require_once 'Manager.php';
  try{
    $db = connect();
    $stt = $db->prepare('SELECT * FROM f508system WHERE ID=:ID');
    $stt -> execute(array(':ID' => $_POST['ID']));
    $usr = $stt -> fetch();
    $id = "Manager";
    if($usr['pw']!=$_POST['pw'] && $_POST['ID']!=$id){
      ?>
      <script type='text/javascript'>
      window.alert('パスワードが間違っています。再度入力お願いします');
      location.href="/Reservation/calendar.php";
      </script>
      <?php
    }
    session_set_cookie_params(60 * 3);
    session_start();
    session_regenerate_id(true); //セッションIDを振り直す
    $_SESSION['ID'] = $_POST['ID'];
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
