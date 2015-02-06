<html>
<head><title>PHP TEST</title></head>
<body>

<?php

	$link = mysql_connect('173.194.227.156', 'root', 'jfhn2015');
	if(!$link) {
    	die('接続失敗です。'.mysql_error());
	}

	print('<p>接続に成功しました。</p>');
	$close_flag = mysql_close($link);

	if($close_flag){
    	print('<p>切断に成功しました。</p>');
	}

?>
</body>
</html>