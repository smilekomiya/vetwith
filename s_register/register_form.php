<?php
//*****************************************************
//
//学生登録フォーム
//
//*****************************************************
//pre_useridの値を取得。入力ミスがあって、register_confirm.phpから戻った場合も想定。
if($mode == "register" || $mode == "register_confirm") {
	if($_GET['pre_userid'])	{
		$pre_userid = $_GET['pre_userid'];
	}else{
		$pre_userid = $_POST['pre_userid'];
	}
}

//pre_userid 有効チェック。一旦trueに設定。ture=エラーフラッグが立っている。
$errorFlag = true;

require_once("../dbsetting/db.php");

//取得したユニークIDをキーに登録されたメールアドレスを取得
$query = "SELECT email FROM members WHERE pre_userid = '$pre_userid'";
$result = mysql_query($query);

//データベースより取得したメールアドレスを表示
if(mysql_num_rows($result) > 0){//取得した結果のデータの数が0以上なら＝データが取得できた
	$errorFlag = false;
	$data = mysql_fetch_array($result);
	$email = $data['email'];
}

if($errorFlag){// pre_useridが無効
?>
<div style="width:100%; padding:10px 30px 10px;">
エラーが発生しました。<br />御手数おかけしますがもう一度メールアドレスの登録からお願いします。<br /><a href="index.php">会員登録ページ</a>
</div>
<?php
}else{// pre_useridが有効
	// regist_confirmでのエラー表示
	if(count($error) > 0){
		print "<div style=\"width:100%;margin:10px 0 10px 50px;\"><span style=\"color:#ff0000;\">";
		foreach($error as $value){
		print "<span style=\"color:#ff0000;\">・".$value."</span><br>";
    }
	print "</div>";
  }
require_once("./formhtml.php");
}
?>