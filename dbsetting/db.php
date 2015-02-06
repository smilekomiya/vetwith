<?php
/*データベースの接続設定*/
$db['server'] = "localhost";
$db['user'] = "root";
$db['pass'] = "spitz538147";
$db['dbname'] = "vetwith";

/*MySQLデータベースに接続するケース*/
$conn = mysql_connect($db['server'],$db['user'],$db['pass']);
mysql_select_db($db['dbname'], $conn); 

//PDOクラスDSN
$dsn = 'mysql:dbname=vetwith;host=localhost';
$user = 'root';
$password = 'spitz538147';
//データベースに接続
try{
	$dbh = new PDO($dsn, $user, $password);
}catch(PDOException $e){
	print('Connection failed:'.$e->getMessage());
	die();
}
?>