<?php
  require_once 'Manager.php';
  try{
    $db = connect();
    $id = 'Shinomi';
    $stt = $db->prepare('SELECT * FROM f508system WHERE ID=:ID');
    $stt -> execute(array(':ID' => $id));
    $usr = $stt -> fetch();
    if(strcmp($usr['pw'],$_POST['pw'])!=0 || strcmp($_POST['ID'],$id)!=0){
      ?>
      <script type='text/javascript'>
      window.alert('管理アカウントのみログイン可能です。再度入力お願いします');
      location.href="../login.php";
      </script>
      <?php
      }
    else{
    session_set_cookie_params(60 * 5);
    session_start();
    session_regenerate_id(true); //セッションIDを振り直す
    $_SESSION['Shinomi'] = $_POST['ID'];
    ?>
    <script type='text/javascript'>
    window.alert('<?php print $usr['Name']?>さん、ログイン成功しました');
    location.href = "setuser_form.php";
    </script>
    <?php
  }
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
  $db=NULL;
 ?>
