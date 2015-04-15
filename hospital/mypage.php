<?php
//*****************************************************
//
//病院のマイページ表示。
//
//*****************************************************

//直接アクセスはだめ。
if(empty($_SESSION["h_id"]) || empty($_GET["mode"]) || $_GET["mode"] != "mypage"){
header("Location:./index.php");
}else{
	
	$h_id = $_SESSION["h_id"];
	$h_name = $_SESSION["h_name"];
	
?>
<div id="formWrap">
	<h1><?php echo $h_name; ?> のマイページ</h1>
	<p>アクセスありがとうございます。</p>
	<h4 class="midashi">応募のあるインターンシップ</h4>
	<!-- ここはphpで要調整 -->
	<p>現在応募のあるインターンシップはありません。</p>
	
	<h4 class="midashi">掲載中のインターンシップ</h4>
<?php
//インターンシップ案件の検索
require_once("../dbsetting/db.php");
$queryIntern = "SELECT * FROM anken WHERE h_id = '$h_id'";
$result = mysql_query($queryIntern);
$number = mysql_num_rows($result);
if($number = 0 ){
	echo "<p>登録中のインターンシップはありません。</p>";
}else{
?>
	<p>受け入れ終了日が過ぎている案件は赤く表示されます。</p>
	<table class="formTable">
		<tr class="top">
			<td>No.</td>
			<td>タイトル</td>
			<td>受け入れ開始日</td>
			<td>受け入れ終了日</td>
			<td>受入期間</td>
		</tr>
<?php
	date_default_timezone_set('Asia/Tokyo');
	$now = date("Y-m-d");
	$i = 1;

	while($data = mysql_fetch_assoc($result)){
		
		//過去の案件は表示を変える。
		if(strtotime($now) > strtotime($data["end"])){
			echo "<tr class=\"notion\">";
		}else{
			echo "<tr>";
		}
		echo "<td>".$i."</td></td>" .
		"<td>".$data['title']."</td></td>" .
		"<td>".$data['start']."</td></td>" .
		"<td>".$data['end']."</td></td>" .
		"<td>".$data['duration']."日間</td></td>"."</tr>";
		$i++;
	}
}
?>
</table>
<p><a href="./index.php?mode=intern">インターンシップを登録する。</a></p>
</div>

<?php
}
?>