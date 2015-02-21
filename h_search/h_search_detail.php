<?php
//ユーザー定義関数の読み込み
require ("../php_function/all.php");

//登録ページのタイトル
$page_title = "病院情報詳細";

/* ヘッダーで読み込むファイル。このファイルからの相対パスで記述 */
$header_file_tag = '<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';

require_once("./upper.php");

/* リンクから病院IDを取得 */
$h_id = $_GET["h_id"];

/* エラーメッセージ配列 */
$error = array();

/* データベースに接続 */
@require_once("../dbsetting/db.php");

mysql_set_charset('utf8');
//SQL文を発行
$query = "SELECT h_name, h_email FROM h_members WHERE h_id = '$h_id'";
$result = mysql_query($query);

$row = mysql_fetch_assoc($result);
//var_dump($row);
print('<div>');
print('詳細');
print('</div>');

print('<p>');
print($row['h_name']);
print(','.$row['h_email']);
print('</p>');


// エラー処理はあとでやろう

//var_dump($row);

require_once("./lower.php");

?>
