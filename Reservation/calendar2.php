<!DOCTYPE html>
<?xml version="1.0" encoding="utf-8"?>
<html xmlns="http://www.w3.org/1999/xhtml" xml="" lang="ja" lalng="ja" xml:lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head><title>F508予約システム</title></head>
<link rel="stylesheet" type="text/css" href=" ../Homepage.css"/>
<body>
  <div id="back1"><hr id="line1"/><h1 id="title1">F508管理システム</h1></div>
    <ul id="menu">
      <li><a href="../index.html">Home</a></li>
      <li><a href="User_Management/system_menu.html">ユーザ管理</a></li>
      <li><a href="http://shinolab.tech">篠宮研究室</a></li>
      <li><a href="http://teraylab.net/">寺島研究室</a></li>
    </ul>
    <?php
    require_once 'Manager.php';
    if($_GET['year']=="") $year = date("Y");
    else $year = $_GET['year'];
    if($_GET['month']=="") $month = date('n');
    else $month = $_GET['month'];
    if($month==1){
      $before_year = $year-1;
      $before_month = $month -1;
      $next_year = $year;
      $next_month = $month+1;
    }
    else if($month==12){
      $before_year = $year;
      $before_month = $month -1;
      $next_year = $year+1;
      $next_month = $month+1;
    }
    else{
      $before_year = $year;
      $before_month = $month-1;
      $next_year = $year;
      $next_month = $month+1;
    }
    $Y = $year;
    $M = $month;
    try {
      $dbh = connect();
      $date1 = $Y . $M . "01";
      $date2 = $Y . $M . "31";
      $int1 = intval($date1);
      $int2 = intval($date2);
      print "1:".$int1."<br>2:".$int2."<br>";
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
    <div class="title2"><?php print $year;?>年<?php print $month;?>月の空き状況</div>
    <form name="move" class="center">
      <input type="button" name="month" value="前月" onClick="before()">
      <input type="button" name="month" value="今月" onClick="this_month()">
      <input type="button" name="month" value="次月" onClick="next()">
    </form>
    <div id="calendar">
    <script type="text/javascript">
    function before(){
      location.href="calendar2.php?year="+<?php print $before_year;?>+"&month="+<?php print $before_month;?>;
    }
    function this_month(){
      location.href="calendar2.php?year="+<?php print date('Y');?>+"&month="+<?php print idate('n');?>;
    }
    function next(){
      location.href="calendar2.php?year="+<?php print $next_year;?>+"&month="+<?php print $next_month;?>;
    }
    //variables for calendar
      const weeks = ['日', '月', '火', '水', '木', '金', '土'];
      const date = new Date();
      var year = <?php print $year;?>;
      var month = <?php print $month;?>;
      //Function for showing calendar
      function showCalendar(year, month) {
          const sec = document.createElement('section');
          sec.innerHTML = createCalendar(year, month);
          document.querySelector('#calendar').appendChild(sec);
          if (month+1 > 12) {
            year++;
            month = 1;
          }
          else month++;
      }
      // Generator of calendar
      function createCalendar(year, month) {
        const startDate = new Date(year, month - 1, 1);
        const endDate = new Date(year, month, 0);
        const endDayCount = endDate.getDate();
        const lastMonthEndDate = new Date(year, month - 1, 0);
        const lastMonthEndDayCount = lastMonthEndDate.getDate();
        const startDay = startDate.getDay();
        let dayCount = 1;
        let calendarHtml = '';
        calendarHtml += '<div class="center"><table>';
        for (let i = 0; i < weeks.length; i++) calendarHtml += '<td>' + weeks[i] + '</td>';
        for (let w = 0; w < 6; w++) {
          calendarHtml += '<tr>';
          for (let d = 0; d < 7; d++) {
            if (w == 0 && d < startDay) {
              let num = lastMonthEndDayCount - startDay + d + 1
              calendarHtml += '<td class="is-disabled">' + num + '</td>'
            } else if (dayCount > endDayCount) {
              // 末尾の日数を超えた
              let num = dayCount - endDayCount
              calendarHtml += '<td class="is-disabled">' + num + '</td>'
              dayCount++
            } else {
              var yy = String(year)
              if(month<10)  var mm = String('0'+month)
              else var mm = String(month)
              if(dayCount<10){
                var dd = String('0'+dayCount)
                if (cntData[dayCount]["c"] == 0 || cntData[dayCount]["c"] == 1) var jdg = "◎"
                else if (cntData[dayCount]["c"] == 2 || cntData[dayCount]["c"] == 3 || cntData[dayCount]["c"] == 4) {
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
              calendarHtml += `<td class="calendar_td" data-date=${date}>${dayCount}${jdg}</td>`
              dayCount++
            }
          }
          calendarHtml += '</tr>'
        }
        calendarHtml += '</table></div>'
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
      document.addEventListener("click", function (e) {
      if (e.target.classList.contains("calendar_td")) {
        location.href="day_form.php?date="+e.target.dataset.date;
      }
    })
    showCalendar(year, month)
    </script>
    </div>
</body>
</html>
