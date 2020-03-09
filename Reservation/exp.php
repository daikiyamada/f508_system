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
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $userData = array();

    // while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    //     $userData[] = $row;
    //     $str_len = strlen($userData);
    //     $contnets = $daydata;
    //     foreach($sth as $userData){
    //         echo $userData['date'];
    //         echo '<br>';
    //     }
    // }
    // header('Content-type: application/json; charset=UTF-8');
    // $json_data = json_encode($userData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
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