<?php
//*****************************************************
//
//病院のインターン登録。
//
//*****************************************************

//このファイルまでのパス
$path = "http://localhost/php/vet/hospital/";

//debug_backtraceは連想配列で結果を返すよ。注意。
$require_from = debug_backtrace();

if(!empty($require_from)){
	//このままでは$require_from[0][file]の中身がC:\xampp\htdocs\php\vet\・・・のままだからhttp://localhost・・・の形に変えてあげる！！
	$require_from_url = c_to_http(@$require_from[0][file]);
}elseif($mode != "intern"){
	header("Location:./index.php");
	exit();
}
?>


<div id="formWrap">
	<h1>インターンシップ登録</h1>
<?php
if(empty($error)){
	
?>
	<p>下記フォームに必要事項を入力後、確認ボタンを押してください。</p>
<?php 
}else{
?>
	<p>入力内容のエラーをご確認ください。</p>
<?php
	foreach($error as $val){
		echo "<p><b>・".$val."</p></b>";
	}
 }
?>
	
	<form method="post" action="./index.php?mode=intern_confirm">
    <table class="formTable">
      <tr>
        <th>タイトル</th>
        <td>
			<input size="50" type="text" name="title" value="<?php echo @$title; ?>" />
		</td>
      </tr>
      <tr>
        <th>募集開始</th>
        <td>
<?php
// 年のプルダウン
echo "<SELECT name=\"begin_year\">";
for ($y=date("Y");$y<date("Y")+3;$y++) {
    echo "<OPTION value=" . $y . " >" . $y . "</OPTION>\n";
}
echo "</SELECT>年";
// 月のプルダウン
$a = array("1", "2", "3", "4", "5", "6",
           "7", "8", "9", "10", "11", "12");
echo "<SELECT name=\"begin_month\">";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>月";
// 日のプルダウン
$a = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
	"11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
	"21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
echo "<SELECT name=\"begin_day\">";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>日";
?>
        </td>
      </tr>
      <tr>
        <th>募集終了</th>
        <td>
<?php
// 年のプルダウン
echo "<SELECT name=\"end_year\">";
for ($y=date("Y");$y<date("Y")+3;$y++) {
    echo "<OPTION value=" . $y . " >" . $y . "</OPTION>\n";
}
echo "</SELECT>年";
// 月のプルダウン
$a = array("1", "2", "3", "4", "5", "6",
           "7", "8", "9", "10", "11", "12");
echo "<SELECT name=\"end_month\">";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>月";
// 日のプルダウン
$a = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
	"11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
	"21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
echo "<SELECT name=\"end_day\">";
foreach ($a as $key => $value) {
    $b = $key + 1;
    echo "<OPTION value=" . $b . " >" . $value . "</OPTION>\n";
}
echo "</SELECT>日";
?>
		</td>
      </tr>
      <tr>
        <th>受け入れ期間</th>
        <td>
			<input size="5" type="text" name="duration" value="<?php echo @$duration; ?>" />日 ※半角英数
		</td>
      </tr>
      <tr>
      <tr>
        <th>募集内容<br /></th>
        <td><textarea name="content" cols="50" rows="5"><?php echo @$content; ?></textarea></td>
      </tr>
    </table>
    <p align="center">
      <input type="submit" name="confirm" value="確認" />
	  <input type="reset" value="リセット" />
    </p>
  </form>
</div>
