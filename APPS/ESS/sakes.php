<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleBrand.css">
	<title>Sakes - Result</title>
	    <link rel="shortcut icon" href="image/icon.ico"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
	    var topBtn = $('#page-top');
	    topBtn.hide();
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 100) {
	            topBtn.fadeIn();
	        } else {
	            topBtn.fadeOut();
	        }
	    });

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

	$json = file_get_contents("https://www.sakenote.com/api/v1/sakes?token=fac41bf690b41aff22987aa1ae6328cee32b867c&prefecture_code=".$data,true);

	$arr = json_decode($json,true);
	
	echo "<pre>";
	echo "<tr>";
	echo "<th class='r1'> Brand</th>";
	echo "<th class='r2'> Maker</th>";
	echo "</tr>";

	$search = "https://google.co.jp/#q=";

	foreach( $arr['sakes'] as $value ) {
//		<!-- foreach($arr1['Items'] as $val ){ -->
		echo "<tr>";
//		<!-- echo "<td class='r1'><img src=".$val['smallImageUrls.imageUrl[0]'].">".$value['sake_name'] . "</a></td>"; -->
		echo "<td class='r1'><a target="._blank." href=".$search . $value['sake_name'].'+日本酒'.">".$value['sake_name'] ."</a></td>";
		echo "<td class='r2'>".$value['maker_name'] . "</td>";
		echo "</tr>";
//		<!-- } -->
	}
	echo "</pre>";
?>

</table>

<p id="page-top"><a class ="top" href="#wrap" title="PAGE TOP">⬆︎</a></p>
</div>
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

</body>
</html>
