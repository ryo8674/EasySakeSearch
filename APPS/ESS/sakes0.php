<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/styleBrand.css">
	<title>Sakes - Result</title>
</head>
<body>

<table>

<?php
	$data = $_GET["pref"];
	$yappid = "dj0zaiZpPUNUbUlzZ2EyTUsyeCZzPWNvbnN1bWVyc2VjcmV0Jng9MTU-";
	$json = file_get_contents("https://www.sakenote.com/api/v1/sakes?token=fac41bf690b41aff22987aa1ae6328cee32b867c&prefecture_code=".$data,true);
	//JSONファイルは配列に変換しておく
	$arr = json_decode($json,true);
	foreach( $arr['sakes'] as $value ) {
	$json1 = file_get_contents("http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch&appid=".$yappid."&category_id=2498&query=".$value['sake_name'],true);


	//JSONファイルは配列に変換しておく
	$arr1 = json_decode($json1,true);
}
	echo "<pre>";
	echo "<tr>";
	echo "<th class='r1'> Brand</th>";
	echo "<th class='r2'> Maker</th>";
	echo "</tr>";

	$search = "https://google.co.jp/#q=";

	foreach( $arr['sakes'] as $value ) {
		foreach( $arr1['Result.Hit.Image'] as $val ) {

		echo "<tr>";
		echo "<td class='r1'><img src=".$val('Medium').">".$value['sake_name'] . "</a></td>";
		echo "<td class='r2'>".$value['maker_name'] . "</td>";
		echo "</tr>";
		}
	}
	// var_dumpで表示して確認(ここは不要)
//	var_dump($arr);
	echo "</pre>";
?>

</table>

<br><br><br><br>

<footer>
<div id="footer_links">
	<a href="index.html" id="home"><img src="image/home.png" border="0" width = 100px></a>
	<p>Copyright (C) oshi-ire. 2015.  All rights reserved.</p>
</div>
</footer>

</body>
</html>
