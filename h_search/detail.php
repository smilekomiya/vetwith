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
$h_id = $_GET["h_id"];

/* エラーメッセージ配列 */
$error = array();

/* データベースに接続 */
@require_once("../dbsetting/db.php");

mysql_set_charset('utf8');
//SQL文を発行
$query = "SELECT * FROM anken WHERE h_id = '$h_id'";
$result = mysql_query($query);

//データの数
$dataCount = mysql_num_rows($result);
$index = 0;
while ($row[$index] = mysql_fetch_assoc($result)) {
    $index++;
}
?>


<?php
if ($dataCount == 0) {
    print('<p>案件無し</p>');
} else {
    print('<p>案件詳細</p>');
}
?>
<div id="searchcontents">

<?php
for ($i=0; $i < $dataCount; $i++) {
  if(empty($row[$i])){
    break;
  }
?>

テスト表示<br>
start:<?php print($row[$i]['start']); ?><br>
end:<?php print($row[$i]['end']); ?><br>
期間:<?php print($row[$i]['duration']); ?><br>
説明:<?php print($row[$i]['description']); ?><br>
<a href="">add to favorite</a><br>
<br>

<?php
}
?>
</div>


<?php
require_once("./lower.php");
?>
