<?php
if($_POST['ID']==NULL||$_POST['Name']==NULL||$_POST['pw']==NULL||$_POST['mail']==NULL){
  ?>
  <script type="text/javascript">
  window.alert("全ての情報を入力してください");
  location.href="setuser_form.php";
  </script>
  <?php
}
else{
require_once 'Manager.php';
  try{
    //データベースに接続してPDOオブジェクトを作成
    $db=connect();
    $sql = 'INSERT INTO f508system(ID,Name,pw,mail) VALUES(:ID,:Name,:pw,:mail)';
    //プリペアドステートメントを生成
    $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    //プリペアドステートメントを実行
    $stt->execute(array(':ID'=>$_POST['ID'],':Name'=>$_POST['Name'],':pw'=> $_POST['pw'],':mail'=> $_POST['mail']));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
}
if($_SESSION['Manager']){
?>
<script>
var rt = window.alert('登録完了しました');
location.href="system_menu.php";
</script>
<?php }
else if($_SESSION['Shinomi']){
  ?>
  <script>
  var rt = window.alert('登録完了しました');
  location.href="../login.php";
  </script>
  <?php
}
?>
