<?php
require_once 'Manager.php';
  try{
    //データベースに接続してPDOオブジェクトを作成
    $db=connect();

    $sql = 'INSERT INTO Reservation(reserveID,date,class,ID,purpose) VALUES(:reserveID,:date,:class,:ID,:purpose)';
    //プリペアドステートメントを生成
    $stt = $db ->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    //プリペアドステートメントを実行
    $stt->execute(array(':reserveID'=>$_POST['reserveID'],':date'=>$_POST['date'],'class'=>$_POST['class'],':ID'=>$_POST['ID'],':purpose'=> $_POST['purpose']));
    $db = NULL;
  }catch (PDOException $e){
    exit("エラーが発生しました:{$e->getMessage()}");
  }
