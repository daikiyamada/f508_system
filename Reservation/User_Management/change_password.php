<?php
session_start();
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
    $sql = 'UPDATE f508system SET　pw = :pw';
    //プリペアドステートメントを生成
    $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    //プリペアドステートメントを実行
    $stt->execute(array(':pw'=> $_POST['pw']));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
}
?>
<script>
var rt = window.alert('変更完了しました');
location.href="../login.php";
</script>