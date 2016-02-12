<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleMaker.css">
	<title>Maker - Result</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
	    var topBtn = $('#page-top');
	    topBtn.hide();
	    //スクロールが100に達したらボタン表示
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 100) {
	            topBtn.fadeIn();
	        } else {
	            topBtn.fadeOut();
	        }
	    });
	    //スクロールしてトップ
	    topBtn.click(function () {
	        $('body,html').animate({
	            scrollTop: 0
	        }, 500);
	        return false;
	    });
	});
	</script>
</head>
<body>
<div id="wrap">
<table>
<?php
	$data = $_GET["pref"];

	$json = file_get_contents("https://www.sakenote.com/api/v1/makers?token=fac41bf690b41aff22987aa1ae6328cee32b867c&prefecture_code=".$data,true);
	//JSONファイルは配列に変換しておく
	$arr = json_decode($json,true);
	echo "<pre>";
	echo "<tr>";
	echo "<th class='r1'> Maker</th>";
	echo "<th class='r2'> Postcode</th>";
	echo "<th class='r3'> Address</th>";
	echo "<th class='r4'> URL</th>";
	echo "</tr>";
	foreach( $arr['makers'] as $value ) {
		echo "<tr>";
		echo "<td class='r1'>".$value['maker_name'] . "</td>";
		echo "<td class='r2'>".$value['maker_postcode'] . "</td>";
		echo "<td class='r3'>".$value['maker_address'] . "</td>";
		echo "<td class='r4'><a target="._blank." href=".$value['maker_url'].">".$value['maker_url'] ."<a></td>";
		// echo $value['maker_name'] . " : " . $value['maker_postcode']." : " . $value['maker_address'] . " : " .$value['maker_url']."\n";
	}
	echo "</pre>";
?>
</table>

<p id="page-top"><a class ="top" href="#wrap" title="PAGE TOP">⬆︎</a></p>

<br><br><br><br>
<footer>
<div id="footer_links">
	<br>
	<a href="sakes.html" class="sake">Brand</a>
	<a href="maker.html" class="maker">Maker</a>
</br>
	<a href="index.html" class="home">Home</a>
	<p>Copyright (C) Ryo Yamada. 2015.  All rights reserved.</p>
</div>
</footer>
</div>
</body>
</html>
