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
    //データベースに接続してPDOオブジェクトを作成
    $db=connect();
    $stt = $db->prepare('UPDATE f508system WHERE ID=:ID SET　pw = :pw');
    //プリペアドステートメントを実行
    $stt->execute(array(':pw'=> $_POST['pw'],':ID' => $_POST['ID']));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
}
?>
<script>
var rt = window.alert('変更完了しました\n <?php print $_POST['pw']?>');
location.href="../login.php";
</script>
