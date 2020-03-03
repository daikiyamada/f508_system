<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
?>
<?php
require_once 'Manager.php';

// mb_language("uni");
// mb_internal_encoding("utf-8"); //内部文字コードを変更
// mb_http_input("auto");
// mb_http_output("utf-8");
// echo date("Y/m/d H:i:s");

// $year = substr($_GET["date"],0,4);
// $month = substr($_GET["date"],4,2);
// $day = substr($_GET["date"],6);
$year = date("Y");
$month = date("m");
try{
    $dbh = connect();
    $date1 = $year . $month . "01";
    $date2 = $year . $month . "31";
    $intd1 = intval($date1);
    $intd2 = intval($date2);
    echo "<pre>";
    var_dump($year);
    var_dump($month);
    var_dump($date1);
    var_dump($date2);
    echo "</pre>";

    // $sth = $dbh->prepare("SELECT * FROM Reservation");
    $sth = $dbh->prepare("SELECT * FROM Reservation where date between :intd1 and :intd2");
    // 月日を文字列で取得して，数字に変更して配列に入れる
    // $sth->setFetchMode(PDO::FETCH_ASSOC);
    // 入力の配列を伴うとき
    // $sth->execute(array(':date' => $date, ':ID' => $ID, ':purpose' => $purpose, ':reserveID' => $reserveID, ':class' => $class));
    // 変数や値を伴うとき
    $sth->execute();
    $userData = array();

    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
        $userData[]=$row;
        // $userData[] = array(
        //     'date' =>$row['date'],
        //     'ID' => $row['ID'],
        //     'purpose' => $row['purpose'],
        //     'reserveID' => $row['reserveID'],
        //     'class' => $row['class']
        // );
    }
    //jsonとして出力
    // $file = 'mysql.json';
    header('Content-type: application/json; charset=UTF-8');
    $json_data = json_encode($userData, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    echo $json_data;
    // $json_data = json_encode($userData);
    // $result = file_put_contents($file, $json_data, FILE_APPEND);
    // if($result === 0){
    //     echo "書き込み失敗\n";
    // }else {
    //     echo "書き込み成功:" . $result . "Byte\n";
    // }
}catch(PDOException $e){
    echo "接続失敗";
    echo $e->getMessage();
}
$dbh = null;
?>