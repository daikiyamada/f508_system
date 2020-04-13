<html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once 'Manager.php';
$year = date("Y");
$month = date("m");
try {
    $dbh = connect();
    $date1 = $year . $month . "01";
    $date2 = $year . $month . "31";
    $intd1 = intval($date1);
    $intd2 = intval($date2);

    $sql = "SELECT * FROM Reservation Where date between $intd1 and $intd2";
    // $sql = "SELECT date FROM Reservation Where date between $intd1 and $intd2";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    // $userData = array();

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $userData[] = $row;
        $month = substr($row['date'],4,2);
        $date = substr($row['date'],6,2);
        // $cnt[] = array(32);
        $cnt[$date]['c'] += 1;
        // echo $cnt[$date]['c'];
        // $jsonData = json_encode($userData, JSON_UNESCAPED_UNICODE);
        // $jsdecode = json_decode($jsonData);
        // echo $row;
    }
    // header('Content-type: application/json');
    $jsonData = json_encode($userData, JSON_UNESCAPED_UNICODE);
    $CData = json_encode($cnt, JSON_UNESCAPED_UNICODE);
    // echo $jsonData;
    // foreach($cnt as $key => $val){
    //     echo "key\n";
    //     echo $key."\n";
    //     echo "date\n";
    //     echo $val['c'];
    // }
} catch (PDOException $e) {
    echo "接続失敗";
    echo $e->getMessage();
}
$dbh = null;
?>

<head>
    <title>Ajax、PHP、MySQLの連携</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<link rel="stylesheet" type="text/css" href=" ../Homepage.css" />
<body>
    <script type="text/javascript">
        const date = new Date();
        let year = date.getFullYear(); //年を取得
        let month = ('00' + (date.getMonth() + 1)).slice(-2); //月を取得（0～11）（1桁は0で埋める）
        let day = ('00' + date.getDate()).slice(-2); //日にちを取得（1桁は0で埋める）
        let ty = date.getFullYear(); // 今年を取得
        let tm = date.getMonth() + 1; // 今月を取得
        // var JsArray = JSON.parse('<?php echo $jsonData; ?>' || "null");
        var cntData = JSON.parse('<?php echo $CData; ?>' || "null");
        // var JsList = JSON.stringify(JsArray, undefined, 1);
        // console.log(JsArray);
        console.log(cntData);
        console.log(cntData)

        // for (let n of cnt.keys(obj)) {
        //     if (obj[n] == 0 || obj[n] == 1) {
        //         console.log("◎")
        //     } else if (obj[n] == 2 || obj[n] == 3 || obj[n] == 4) {
        //         console.log("○")
        //     } else if (obj[n] == 5 || obj[n] == 6) {
        //         console.log("△")
        //     } else if (obj[n] == 7) {
        //         console.log("×")
        //     }
        // };
    </script>
    <div class="daydata">
        <p>日にちごとの判定</p>
    </div>
</body>
</html>