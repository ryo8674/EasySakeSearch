<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
	<title>お天気Webアプリ</title>
</head>
<body>
<?php
main();

function main() {
	// プロキシの設定
	$proxy = array(
		"http" => array(
			"proxy" => "tcp://192.168.64.253:3128",
			'request_fulluri' => true,
		),
	);
	$proxy_context = stream_context_create($proxy);
	//指定のURLから取得
	$json = file_get_contents('http://private-anon-1bc78d5d6-sakenote.apiary-mock.com/api/v1/sakes.json', false, $proxy_context);
	//JSONファイルは配列に変換しておく
	$arr = json_decode($json,true);


	echo "<pre>";
	foreach( $arr['forecasts'] as $value ) {
		echo $value['dateLabel'] . " : " . $value['telop'] . "\n";
	}
	//var_dumpで表示して確認(ここは不要)
	var_dump($arr);
	echo "</pre>";
}

?>
</body>
</html>
