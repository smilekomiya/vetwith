<?php
//ユーザー定義関数の読み込み
require ("../php_function/all.php");

//登録ページのタイトル
$page_title = "詳細";

/* ヘッダーで読み込むファイル。このファイルからの相対パスで記述 */
$header_file_tag = '<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';

require_once("./upper.php");

/* フォームから検索ワードを取得 */
$h_id = $_GET['h_id'];
$anken_id = $_GET['anken'];
var_dump($h_id);
var_dump($anken_id);

/* エラーメッセージ配列 */
$error = array();

/* データベースに接続 */
@require_once("../dbsetting/db.php");

mysql_set_charset('utf8');

// 重複チェック
$check_query = "SELECT * FROM bookmark WHERE user_id = 1234 and anken_id = '$anken_id'";
$result = mysql_query($check_query);
$dataCount = mysql_num_rows($result);
var_dump($dataCount);
if ($dataCount == 0) {
//SQL文を発行
$query = "INSERT INTO bookmark (
user_id,
anken_id
) VALUES (
1234,
'$anken_id'
)";

$result = mysql_query($query);
echo 'ブックマーク登録完了';
var_dump($anken_id);
} else {
	echo 'ブックマーク登録済みです';
}

?>

</div>


<?php
require_once("./lower.php");
?>
