<?php
require_once 'Manager.php';

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

$dbh = connect();

$sth = $dbh->prepare("SELECT * FROM Reservation");
$sth->execute();

$userData = array();

while($row = $sth->fetch(PDO::FETCH_ASSOC)){
    $userData[]=array(
    'ReservationNumber'=>$row['ReservationNumber'],
    'Date'=>$row['Date'],
    'ID'=>$row['ID'],
    'purpose'=>$row['purpose']
    );
}

//jsonとして出力
header('Content-type: application/json');
echo json_encode($userData);