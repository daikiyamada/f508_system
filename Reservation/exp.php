<!DOCTYPE html>
<html>

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

        $(document).ready(function() {
            //ファイルの読み込み
            $.ajax({
                type: 'POST',
                url: 'json.php',
                dataType: 'json'
            }).done(function(data, dataType) {
                var $contnets = $('#daydata');
                for (var i = 0; i < data.length; i++) {
                    $daydata.append("<p>id: " + data[i].date + "</p>");
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                // 通信失敗時の処理
                alert('ファイルの取得に失敗しました。');
                console.log("ajax通信に失敗しました");
                console.log("jqXHR : " + jqXHR.status); // HTTPステータスが取得
                console.log("textStatus : " + textStatus); // タイムアウト、パースエラー
                console.log("errorThrown : " + errorThrown.message); // 例外情報
            });
        });
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