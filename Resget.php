<!DOCTYPE html>
<html lang="ja">
<head>
  <title>研究室管理システム</title>
</head>
  <link rel="stylesheet" type="text/css" href="Homepage.css" />
<body>
<h1 id="title1">研究室管理システム</h1>
<hr id="cp_hr04" />
<ul id="menu">
<li id="menu0"><a> メニュー</a></li>
<li id="menu1"><a href="http://">F508予約システム</a></li>
<li id="menu2" ><a href="http://shinolab.tech">篠宮研究室HP</a></li>
<li id="menu3"><a href="http://teraylab.net/">寺島研究室HP</a></li>
</ul>
<h1 id =news_head>お知らせ</h1>
<p id=news>受け取った名前 </p>
<p><?php echo "こんにちは".$_GET["name"]."さん"; ?></p>
<p><?php echo "あなたのパスワードは".$_GET["password"]."です。"; ?></p>


<div style="text-align: right;">最終更新日：2019年12月17日</div>

</body>
</html>
