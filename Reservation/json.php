<?php
require_once 'Manager.php';

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

$dbh = connect();
String date1 = year + month + "01" + "0"
String date2 = year + month + "31" + "8"
$sth = $dbh->prepare("SELECT * FROM Reservation where Date between :date1 and : date2");
// 月日を文字列で取得して，数字に変更して配列に入れる
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
echo json_encode($userData, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
file_put_contents("my.json", json_encode($userData, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));