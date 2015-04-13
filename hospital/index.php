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


/* エラーメッセージ配列 */
$error = array();
?>

<div id="formWrap">
  <h1>案件登録</h1>
  <p>下記フォームに必要事項を入力後、確認ボタンを押してください。</p>
  <form method="post" action="./regist.php">
    <table class="formTable">
      <tr>
        <th>タイトル</th>
        <td>
			<input size="50" type="text" name="title" />
		</td>
      </tr>
      <tr>
        <th>開始</th>
        <td>
<?php
// 年のプルダウン
echo "<SELECT name=begin_year>";
for ($y=2015;$y<date(Y)+3;$y++) {
    echo "<OPTION value=" . $y . " >" . $y . "</OPTION>\n";
}
echo "</SELECT>年";
// 月のプルダウン
$a = array("1", "2", "3", "4", "5", "6",
           "7", "8", "9", "10", "11", "12");
echo "<SELECT name=begin_month>";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>月";
// 日のプルダウン
$a = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
	"11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
	"21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
echo "<SELECT name=begin_day>";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>日";
?>
        </td>
      </tr>
      <tr>
        <th>終了</th>
        <td>
<?php
// 年のプルダウン
echo "<SELECT name=end_year>";
for ($y=2015;$y<date(Y)+3;$y++) {
    echo "<OPTION value=" . $y . " >" . $y . "</OPTION>\n";
}
echo "</SELECT>年";
// 月のプルダウン
$a = array("1", "2", "3", "4", "5", "6",
           "7", "8", "9", "10", "11", "12");
echo "<SELECT name=end_month>";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>月";
// 日のプルダウン
$a = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
	"11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
	"21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
echo "<SELECT name=end_day>";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>日";
?>
		</td>
      </tr>
      <tr>
        <th>募集期間</th>
        <td>
			<input size="5" type="text" name="duration" />日 (半角英数)
		</td>
      </tr>
      <tr>
      <tr>
        <th>募集内容<br /></th>
        <td><textarea name="content" cols="50" rows="5"></textarea></td>
      </tr>
    </table>
    <p align="center">
      <input type="submit" name="confirm" value="確認" />　<input type="reset" value="リセット" />
    </p>
  </form>
</div>


<?php
require_once("./lower.php");
?>
