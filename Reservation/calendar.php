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
    $date = (int)substr($row['date'],6,2);
    $cnt[$date]['c'] += 1;
  }
  $CData = json_encode($cnt, JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
  echo "接続失敗";
  echo $e->getMessage();
}
$dbh = null;
?>

<!DOCTYPE html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <title>F508予約システム</title>
</head>
<link rel="stylesheet" type="text/css" href=" ../Homepage.css" />
<body>
  <div id="back1">
    <hr id="line1"/>
    <h1 id="title1">F508管理システム</h1>
  </div>
    <ul id="menu">
      <li><a href="../index.html">Home</a></li>
      <li><a href="User_Management/system_menu.html">ユーザ管理</a></li>
      <li><a href="http://shinolab.tech">篠宮研究室</a></li>
      <li><a href="http://teraylab.net/">寺島研究室</a></li>
    </ul>
    <div style="text-align: center;">
      <button id="prev" type="button">前の月</button>
      <button id="now" type="button">今月</button>
      <button id="next" type="button">次の月</button>
      <div id="calendar"></div>
    <script type="text/javascript">
      var cntData = JSON.parse('<?php echo $CData; ?>' || "null");
      const weeks = ['日', '月', '火', '水', '木', '金', '土']
      const date = new Date()
      let year = date.getFullYear() //年を取得
      let month = date.getMonth() + 1 //月を取得（0～11）
      let ty = date.getFullYear() // 今年を取得
      let tm = date.getMonth() + 1 // 今月を取得
      const config = {
        show: 1,
      }
      /**カレンダー表示*/
      function showCalendar(year, month) {
        for (i = 0; i < config.show; i++) {
          const calendarHtml = createCalendar(year, month)
          const sec = document.createElement('section')
          sec.innerHTML = calendarHtml
          document.querySelector('#calendar').appendChild(sec)
          month++
          if (month > 12) {
            year++
            month = 1
          }
        }
      }
      // カレンダー作成
      function createCalendar(year, month) {
        const startDate = new Date(year, month - 1, 1) // 月の最初の日を取得
        const endDate = new Date(year, month, 0) // 月の最後の日を取得
        const endDayCount = endDate.getDate() // 月の末日
        const lastMonthEndDate = new Date(year, month - 1, 0) // 前月の最後の日の情報
        const lastMonthEndDayCount = lastMonthEndDate.getDate() // 前月の末日
        const startDay = startDate.getDay() // 月の最初の日の曜日を取得
        let dayCount = 1 // 日にちのカウント
        let calendarHtml = '' // HTMLを組み立てる変数
        calendarHtml += '<h1>' + year + '/' + month + '</h1>'
        calendarHtml += '<table>'
        // 曜日の行を作成
        for (let i = 0; i < weeks.length; i++) {
          calendarHtml += '<td>' + weeks[i] + '</td>'
        } //曜日を表示
        //日付を作成
        for (let w = 0; w < 6; w++) {
          calendarHtml += '<tr>'
          for (let d = 0; d < 7; d++) {
            if (w == 0 && d < startDay) {
              // 1行目で1日の曜日の前
              let num = lastMonthEndDayCount - startDay + d + 1
              calendarHtml += '<td class="is-disabled">' + num + '</td>'
            } else if (dayCount > endDayCount) {
              // 末尾の日数を超えた
              let num = dayCount - endDayCount
              calendarHtml += '<td class="is-disabled">' + num + '</td>'
              dayCount++
            } else {
              var yy = String(year)
              if(month<10){
                var mm = String('0'+month)
              }
              else{
                var mm = String(month)
              }
              if(dayCount<10){
                var dd = String('0'+dayCount)
                if (cntData[dayCount]["c"] == 0 || cntData[dayCount]["c"] == 1) {
                  var jdg = "◎";
                } else if (cntData[dayCount]["c"] == 2 || cntData[dayCount]["c"] == 3 || cntData[dayCount]["c"] == 4) {
                  var jdg = "○"
                } else if (cntData[dayCount]["c"] == 5 || cntData[dayCount]["c"] == 6) {
                  var jdg = "△"
                } else if (cntData[dayCount]["c"] == 7) {
                  var jdg = "×"
                }
              }
              else{
                var dd = String(dayCount)
                if (cntData[dayCount]["c"] == 0 || cntData[dayCount]["c"] == 1) {
                  var jdg = "◎";
                } else if (cntData[dayCount]["c"] == 2 || cntData[dayCount]["c"] == 3 || cntData[dayCount]["c"] == 4) {
                  var jdg = "○"
                } else if (cntData[dayCount]["c"] == 5 || cntData[dayCount]["c"] == 6) {
                  var jdg = "△"
                } else if (cntData[dayCount]["c"] == 7) {
                  var jdg = "×"
                }
              }
              var date = yy+mm+dd
              calendarHtml += `<td class="calendar_td" data-date=${date}>${dayCount}</br>${jdg}</td>`
              dayCount++
            }
          }
          calendarHtml += '</tr>'
        }
        calendarHtml += '</table>'
        return calendarHtml
      }
      // 月移動
      function moveCalendar(e) {
        document.querySelector('#calendar').innerHTML = ''
        if (e.target.id === 'prev') {
          month--
          if (month < 1) {
            year--
            month = 12
          }
        }
        if (e.target.id === 'now') {
          year = ty
          month = tm
        }
        if (e.target.id === 'next') {
          month++
          if (month > 12) {
            year++
            month = 1
          }
        }
        showCalendar(year, month)
      }
      document.querySelector('#prev').addEventListener('click', moveCalendar)
      document.querySelector('#now').addEventListener('click', moveCalendar)
      document.querySelector('#next').addEventListener('click', moveCalendar)
      document.addEventListener("click", function (e) {
      if (e.target.classList.contains("calendar_td")) {
        location.href="day_form.php?date="+e.target.dataset.date;
      }
    })
    showCalendar(year, month)
    </script>
    </div>
    <script type="text/javascript" style="text-align: right;">
      var modified = new Date(document.lastModified);
      var yy = modified.getFullYear();
      var mm = modified.getMonth() + 1;
      var dd = modified.getDate();
      document.write('最終更新日:' + yy + '年' + mm + '月' + dd + '日');
    </script>
</body>
</html>
