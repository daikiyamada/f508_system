<?php
if($_POST['ID']==NULL||$_POST['Name']==NULL||$_POST['pw']==NULL||$_POST['mail']==NULL||$_POST['pw2']==NULL){
  ?>
  <script type="text/javascript">
  window.alert("全ての情報を入力してください");
  location.href="setuser_form.php";
  </script>
  <?php
}
require_once 'Manager.php';
  try{
    //データベースに接続してPDOオブジェクトを作成
    $db=connect();
    $sql = 'INSERT INTO f508system(ID,Name,pw,mail,pw2) VALUES(:ID,:Name,:pw,:mail,:pw2)';
    //プリペアドステートメントを生成
    $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    //プリペアドステートメントを実行
    $stt->execute(array(':ID'=>$_POST['ID'],':Name'=>$_POST['Name'],':pw'=> $_POST['pw'],':mail'=> $_POST['mail'],':pw2'=> $_POST['pw2']));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");
  //$To = $_POST['mail'];
  //$Title = "ユーザ登録";
  //$Sentence = "さん、F508管理システムのユーザ登録が無事完了しました。"
  //bool mb_send_mail($To,$Title,$_POST['Name']+$Sentence);
?>
<script>
var rt = window.confirm('登録完了しました。登録を継続しますか？');
if(rt) location.href="setuser._form.php";
else location.href="system_menu.php";
</script>
<script type="text/javascript" style="text-align: right;">
