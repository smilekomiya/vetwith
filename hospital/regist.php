<?php
//ユーザー定義関数の読み込み
require ("../php_function/all.php");

//登録ページのタイトル
$page_title = "案件登録";

/* ヘッダーで読み込むファイル。このファイルからの相対パスで記述 */
$header_file_tag = '<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';

require_once("./upper.php");

/* フォームから検索ワードを取得 */
$title = $_POST['title'];
$content = $_POST['content'];
$duration = $_POST['duration'];

$begin_year = $_POST['begin_year'];
$begin_month = $_POST['begin_month'];
$begin_day = $_POST['begin_day'];
$end_year = $_POST['end_year'];
$end_month = $_POST['end_month'];
$end_day = $_POST['end_day'];

$flag = 1;
if (empty($title)) {
	echo "タイトルを入力してください。<br>";
	$flag = 0;
}

if (preg_match("/^[a-zA-Z0-9]+$/", $duration)) {
    // "duration" check ok
} else {
    echo "「期間」を半角英数で入力してください。<br>";
    $flag = 0;
}

// 開始、終了期間の文字結合
$begin_month=sprintf("%02d",$begin_month);
$begin_day=sprintf("%02d",$begin_day);
$end_month=sprintf("%02d",$end_month);
$end_day=sprintf("%02d",$end_day);

$start = $begin_year.$begin_month.$begin_day;
$end = $end_year.$end_month.$end_day;
if (intval($end) < intval($start)) {
	echo "正しい「開始」「終了」を入力してください。<br>";
	$flag = 0;
}
if (empty($content)) {
	echo "案件詳細を入力してください。<br>";
	$flag = 0;
}

//var_dump($start);
//var_dump($end);

/* データベースに接続 */
@require_once("../dbsetting/db.php");

mysql_set_charset('utf8');

//SQL文を発行
$query = "INSERT INTO anken (
h_id,
start,
end,
duration,
description
) VALUES (
1234,
'$start',
'$end',
'$duration',
'$content'
)";

if ($flag == 1) {
	$result = mysql_query($query);
	echo '登録完了';
}


?>
<br>
<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">戻る</a>
</div>


<?php
require_once("./lower.php");
?>
