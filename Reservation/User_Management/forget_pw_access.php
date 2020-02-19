<?php
  require_once 'Manager.php';
  try{
    $db = connect();
    $stt = $db->prepare('SELECT * FROM f508system WHERE ID=:ID');
    $stt -> execute(array(':ID' => $_POST['ID']));
    $usr = $stt -> fetch();
    if(strcmp($usr['mail'],$_POST['mail'])!=0 || strcmp($_POST['ID'],$usr['ID'])!=0){
      ?>
      <script type='text/javascript'>
      window.alert('入力情報が異なります。再度入力お願いします');
      location.href="forget_pw.php";
      </script>
      <?php
      }
    else{
    session_set_cookie_params(60 * 5);
    session_start();
    session_regenerate_id(true); //セッションIDを振り直す
    $_SESSION['ID'] = $_POST['ID'];
    ?>
    <script type='text/javascript'>
    window.alert('<?php print $usr['Name']?>さん、パスワードを変更してください。');
    location.href = "password_change.php";
    </script>
    <?php
  }
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
  $db=NULL;
 ?>
