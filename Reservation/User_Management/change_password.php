<?php
if($_POST['ID']==NULL||$_POST['pw']==NULL){
  ?>
  <script type="text/javascript">
  window.alert("全ての情報を入力してください");
  location.href="password_change.php";
  </script>
  <?php
}
else{
require_once 'Manager.php';
  try{
    $pw = password_hash($_POST['pw'],PASSWORD_BCRYPT);
    //データベースに接続してPDOオブジェクトを作成
    $db=connect();
    //プリペアドステートメントを生成
    $stt = $db -> prepare('UPDATE f508system SET pw=:pw WHERE ID=:ID');
    //プリペアドステートメントを実行
    $stt->execute(array(':ID' => $_POST['ID'],':pw'=>$pw));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
}
?>
<script>
var rt = window.alert('変更完了しました。');
location.href="../login.php";
</script>
