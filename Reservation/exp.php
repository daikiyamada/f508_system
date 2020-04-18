<html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once 'Manager.php';
$Y = date("Y");
$M = date("m");
try {
    $dbh = connect();
    $date1 = $Y . $M . "01";
    $date2 = $Y . $M . "31";
    $int1 = intval($date1);
    $int2 = intval($date2);

    $sql = "SELECT * FROM Reservation Where date between $int1 and $int2";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    for ($i = 1; $i < 32; $i++){
        $cnt[$i]['c'] = 0;
    }

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        // $userData[] = $row;
        // $M = substr($row['date'],4,2);
        $date = (int)-substr($row['date'],6,2);
        $cnt[$date]['c'] += 1;
    }
    // $jsonData = json_encode($userData, JSON_UNESCAPED_UNICODE);
    $CData = json_encode($cnt, JSON_UNESCAPED_UNICODE);
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
        var cntData = JSON.parse('<?php echo $CData; ?>' || "null");
        console.log(cntData);

        for (let n in cntData) {
            if (cntData[n]["c"] == 0 || cntData[n]["c"] == 1) {
                document.write(n)
                document.write("◎")
            } else if (cntData[n]["c"] == 2 || cntData[n]["c"] == 3 || cntData[n]["c"] == 4) {
                document.write(n)
                document.write("○")
            } else if (cntData[n]["c"] == 5 || cntData[n]["c"] == 6) {
                document.write(n)
                document.write("△")
            } else if (cntData[n]["c"] == 7) {
                document.write(n)
                document.write("×")
            }
        };
    </script>
</body>
</html>