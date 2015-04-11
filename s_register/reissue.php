<?php 
//*****************************************************
//
//パスワード再発行
//
//パスワードを再発行する。resend.phpから受けるよー。
//*****************************************************

//エラー配列
$error = array();

//エラー出たときに戻るURLを表示するフラグ
$urlFlag = True;

$reissueid = $_POST["reissueid"];
$id = $_POST["id"];
$email = $_POST["email"];
$secret = $_POST["secret"];
$password1 = $_POST["password"];
$password2 = $_POST["password2"];

$key = pass_cipher($secret, $email);

//DBのreissueがdeletedの時は再発行処理出来ないように。
require_once("../dbsetting/db.php");
$queryCheck = "SELECT * FROM members WHERE email = '$email'";
$resultCheck = mysql_query($queryCheck);
$data = mysql_fetch_assoc($resultCheck);
$dbReissue = $data["reissue"];

if($dbReissue == "deleted"){

	array_push($error, "無効な処理です。御手数ですがもう一度お試しください。");
	$urlFlag = false;
	
}elseif(empty($_POST["mode"])){
	
	header("Location:../index.php");
	
}elseif(empty($_POST["email"]) || empty($_POST["id"]) || empty($_POST["secret"]) || empty($_POST["password"]) || empty($_POST["reissueid"]) || empty($_POST["password2"])){

	array_push($error, "秘密の暗号とパスワードが入力されていません。");
	
}elseif($password1 != $password2){ //パスワードチェック

	array_push($error, "パスワードの入力確認をお願いします。");

}elseif($key != $id){ //秘密の番号チェック

	array_push($error, "正しい秘密の暗号が入力されていません。");
	
}elseif(!is_alphanum($password1) || strlen($password1) < 8 || strlen($password1) > 128){ //パスワードチェック
		
		array_push($error, "パスワードは8文字以上128文字以内の半角英数字で入力してください。");
		
}else{ //パスワードの暗号化と登録、reissueidの削除。
		
	$hashed_password = pass_cipher($password1, $email);
		
	
	mysql_query("begin");
		
	$queryMod = "UPDATE members SET
	password = '$hashed_password',
	reissue = 'deleted'
	WHERE reissue = '$reissueid'
	";
	$resultMod = mysql_query($queryMod);
		
	if($resultMod){
			
		mysql_query("commit");
			
		mb_language("japanese");
		mb_internal_encoding("utf-8");
		  
		$to = $email;
		$subject = "Vetwithパスワード再発行";
		$message = "パスワードの再発行が終わりました。\n"."新しいパスワードは[$password1]です。";
		$header = "From:hogehoge@hogehoge.com";
		  
		if(!mb_send_mail($to, $subject, $message, $header)){//メール送信に失敗したら
			array_push($error,"データベースへの登録が失敗しました。御手数ですがもう一度お願いします。");
		}else{
			?>
			<div style="width:800px; padding: 10px 30px 10px;">
				<h1>パスワード再発行完了</h1>
				<div style="width: 100%; margin: 0 auto; padding: 0px 200px 20px;">
				パスワードの再発行が成功しました。<br />
				新しいパスワードは<b><?php echo $password1; ?></b>です。<br />
				大切に保管してください。
				</div>
			</div>
			<?php
		}
	
	}else{ //ロールバック
	
		mysql_query("rollback");
		array_push($error, "データベースに登録できませんでした。御手数ですがもう一度お試しください。");
		
	}
}
	

if(count($error) > 0){
?>
<div style="width:800px; padding: 10px 30px 10px;">
	<h1>パスワード再発行エラー</h1>
	<div style="width: 100%; margin: 0 auto; padding: 0px 200px 20px;">
<?php
	foreach($error as $value){
		echo $value."<br />";
	}
?>
	<?php 
	if(isset($reissueid) && isset($id) && $urlFlag){
		echo "<p><a href=\"http://localhost/php/vet/s_register/index.php?reissueid=${reissueid}&id=${id}\">→パスワード再発行画面に戻る。</a></p>";
	}
	?>
	</div>
</div>
<?php	
}
?>