<!DOCTYPE html>
<html>
<?php
require_once 'Manager.php';

// mb_language("uni");
// mb_internal_encoding("utf-8"); //内部文字コードを変更
// mb_http_input("auto");
// mb_http_output("utf-8");
// echo date("Y/m/d H:i:s");

$year = date("Y");
$month = date("m");
try {
    $dbh = connect();
    $date1 = $year . $month . "01";
    $date2 = $year . $month . "31";
    $intd1 = intval($date1);
    $intd2 = intval($date2);

    $sql = "SELECT * FROM Reservation";
    // $sth = $dbh->prepare("SELECT * FROM Reservation");
    // $sql = "SELECT * FROM Reservation Where date between :intd1 and :intd2";
    $sth = $dbh->prepare($sql);
    // 月日を文字列で取得して，数字に変更して配列に入れる
    // $sth->setFetchMode(PDO::FETCH_ASSOC);
    // 入力の配列を伴うとき
    // $sth->execute(array(':date' => $date, ':ID' => $ID, ':purpose' => $purpose, ':reserveID' => $reserveID, ':class' => $class));
    // 変数や値を伴うとき
    $sth->execute();
    $userData = array();

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $userData[] = $row;
        $str_len = strlen($userData);
        $contnets = $daydata;
        for ($i = 0; $i < $str_len; $i++) {
            echo $userData[$i];
        }
    }
    //jsonとして出力
    // $file = 'mysql.json';
    header('Content-type: application/json; charset=UTF-8');
    $json_data = json_encode($userData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    // echo $json_data;
    // $json_data = json_encode($userData);
    // $result = file_put_contents($file, $json_data, FILE_APPEND);
    // if($result === 0){
    //     echo "書き込み失敗\n";
    // }else {
    //     echo "書き込み成功:" . $result . "Byte\n";
    // }
} catch (PDOException $e) {
    echo "接続失敗";
    echo $e->getMessage();
}
$dbh = null;
?>

<head>
    <meta charset="utf-8">
    <title>Ajax、PHP、MySQLの連携</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <script type="text/javascript">
        const date = new Date()
        let year = date.getFullYear() //年を取得
        let month = ('00' + (date.getMonth() + 1)).slice(-2) //月を取得（0～11）（1桁は0で埋める）
        let day = ('00' + date.getDate()).slice(-2) //日にちを取得（1桁は0で埋める）
        let ty = date.getFullYear() // 今年を取得
        let tm = date.getMonth() + 1 // 今月を取得

        let cnt = new Array(31)

        let td = new Array(31)
        let dt = []

        for (let n of cnt) {
            if (cnt[n] == 0 || cnt[n] == 1) {
                console.log("◎")
            } else if (cnt[n] == 2 || cnt[n] == 3 || cnt[n] == 4) {
                console.log("○")
            } else if (cnt[n] == 5 || cnt[n] == 6) {
                console.log("△")
            } else if (cnt[n] == 7) {
                console.log("×")
            }
        };
    </script>
    <div class="daydata">
        <p>日にちごとの判定</p>
    </div>

</body>

</html>