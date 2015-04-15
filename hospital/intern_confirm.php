<?php
//*****************************************************
//
//病院の案件確認裏周りー。
//
//*****************************************************


if(empty($_POST["confirm"]) || $_POST["confirm"] != "確認"){
	header("Location:./index.php");
	exit();
}

$formList = array('title', 'content', 'duration', 'begin_year', 'begin_month', 'begin_day', 'end_year', 'end_month', 'end_day');

foreach($formList as $val) {
  $$val = h($_POST["$val"]); //一応htmlタグのエスケープを。
}

//エラーメッセージ配列
$error = array();

if(empty($title) || mb_strlen($title) > 50){
	array_push($error, "タイトルを50文字以内で入力してください。");
}

// 開始、終了期間の文字結合
$begin_month=sprintf("%02d",$begin_month);
$begin_day=sprintf("%02d",$begin_day);
$end_month=sprintf("%02d",$end_month);
$end_day=sprintf("%02d",$end_day);

$start = $begin_year.$begin_month.$begin_day;
$end = $end_year.$end_month.$end_day;

if(intval($end) < intval($start)){
	array_push($error, "正しい「募集開始」「募集終了」を入力してください。");
}

if(empty($duration) || !is_num($duration) || $duration > 30) {
    array_push($error, "「学生受け入れ期間」を30以下の半角数字で入力してください。");
}


if(empty($content) || mb_strlen($content) > 1000){
	array_push($error, "案件詳細を1000文字以内で入力してください。");
}

if(count($error) > 0){
	
	$error = array_unique($error);
	require_once("./intern.php");

}else{
?>
<div id="formWrap">
	<h1>インターンシップ登録内容確認</h1>
	<p>入力内容に誤りがなければ登録ボタンを押してください。</p>
	<form method="post" action="index.php?mode=intern_register">
		 <table class="formTable">
		  <tr>
			<th>タイトル</th>
			<td>
			<input type="hidden" name="title" value="<?php echo $title; ?>"><?php echo $title; ?>
			</td>
		  </tr>
		  <tr>
			<th>募集開始</th>
			<td>
			<input type="hidden" name="start" value="<?php echo $start; ?>"><?php echo $begin_year."年".$begin_month."月".$begin_day."日"?>
			</td>
		  </tr>
		  <tr>
			<th>募集終了</th>
			<td>
			<input type="hidden" name="end" value="<?php echo $end; ?>"><?php echo $end_year."年".$end_month."月".$end_day."日"?>
			</td>
		  </tr>
		  <tr>
			<th>受け入れ期間</th>
			<td>
				<input type="hidden" name="duration" value="<?php echo $duration; ?>"><?php echo $duration."日"; ?>
			</td>
		  </tr>
		  <tr>
		  <tr>
			<th>募集内容<br /></th>
			<td>
			<input type="hidden" name="content" value="<?php echo $content; ?>"><?php echo $content; ?>
			</td>
		  </tr>
		</table>
		<p align="center">
			<input type="submit" name="register" value="登録" />
		</p>　
	</form>
	<br />
	<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">戻る</a>
</div>
<?php
}
?>