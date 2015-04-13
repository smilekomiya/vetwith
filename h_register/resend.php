<?php 
//*****************************************************
//
//パスワード再送
//
//index.php?mode=resend、index.php?reissueid=...以外からのアクセスは不許可。
//*****************************************************

//エラー配列
$error = array();

//$_POST["mode"]がresendかつ$_GET["mode"]、$_GET["reissuerid"]の３つが空の場合は再発行処理。
if($_POST["mode"] == "resend" && empty($_GET["mode"]) && empty($_GET["reissueid"])){
	
	//フォームからデータを取得。
	$email = $_POST["email"];
	$secret = $_POST["secret"];
	
	if($email == "" || !is_mail($email)){ //メールアドレスチェック
	
		array_push($error, "正しいメールアドレスが入力されていません。");
		
	}elseif(!is_alphanum($secret) || mb_strlen($secret) != 4){ //秘密の番号チェック
	
		array_push($error, "秘密の番号は半角英数字4桁で入力してください。");
	
	}else{
		
		require_once("../dbsetting/db.php");
		
		//メールアドレス登録済みかどうかチェック。
		$queryMail = "SELECT email FROM h_members WHERE email = '$email'";
		$resultMail = mysql_query($queryMail);
		
		if(mysql_num_rows($resultMail) != 1){
		
			array_push($error, "入力したメールアドレスは登録されていません。");
			
		}else{ //okのとき
			$secret = pass_cipher($secret, $email);
			$checkNum = uniqid(rand(100,999)); //URL用
			$queryCheck = "UPDATE h_members SET
			reissue = '$checkNum'
			WHERE email = '$email'
			";
			$resultCheck = mysql_query($queryCheck);
			
			if($resultCheck){ //DBのpre_useridが更新処理成功。
				mb_language("japanese");
				mb_internal_encoding("utf-8");
				
				$to = $email;
				$subject = "Vetwithパスワード再発行";
				$message = "Vwteithパスワード再発行用のURLのお知らせです。\n"."以下のURLからパスワードを再発行してください。\n\n"."http://localhost/php/vet/h_register/index.php?reissueid=${checkNum}&id=${secret}";
				$header = "hogehoge@hogehoge.com";
				
				if(!mb_send_mail($to, $subject, $message, $header)){
					array_push($error, "メールが送信できませんでした。御手数ですがもう一度やり直してください。");
				}else{
					?>
					<div style="width:800px; padding: 10px 30px 10px;">
						<h1>パスワード再発行メールを送信しました。</h1>
						<div style="width: 700px; margin: 0 auto; padding: 0px 200px 20px;">
						パスワード再発行用のURLを記載したメールを「<?php echo $email; ?>」宛に送信しました。ご確認ください。<br />
						</div>
					</div>
					<?php
				}
			
			}else{ //DBのpre_useridの更新処理失敗。
			
				array_push($error, "URLの送信に失敗しました。御手数ですがもう一度やり直してください。");
			
			}
		}
	}

}elseif((!isset($_GET["mode"]) || $_GET["mode"] != "resend") && !isset($_GET["reissueid"])){ //$_GET["mode"]がセットされていない、されていてもresendじゃないかつ$_GET["reissueid"]がセットされていない→違法な直接アクセスは・・・お父さん許しまへんで！！
	header("Location:../index.php");
	
}elseif(isset($_GET["reissueid"]) && isset($_GET["id"])){ //$_GET["reissueid"]と$_GET["id"]がセットされている→再発行フォームを表示

	$checkNum = $_GET["reissueid"];
	$id = $_GET["id"];
	
	require_once("../dbsetting/db.php");	
	$query = "SELECT * FROM h_members WHERE reissue = '$checkNum'";
	$result = mysql_query($query);
	
	if(!$result || mysql_num_rows($result) != 1){
		array_push($error, "無効なURLです。御手数ですがもう一度お試しください。");
	}else{
	
		$data = mysql_fetch_assoc($result);
		$email = $data["email"];

?>

<div style="width:800px; padding: 10px 30px 10px;">
	<h1>パスワードの再発行</h1>
	<P>パスワード再発行用のURLを送信した際に入力した<span style="color:red;">秘密の暗号（半角英数字４桁）、新しいパスワード</span>
	を下のフォームに入力してください。</p>
	
	﻿<div style="width: 100%; margin: 0 auto; padding: 0px 200px 20px;">
		<form action="index.php" method="post">
			<input type="hidden" name="mode" value="reissue" />
			<input type="hidden" name="email" value="<?php echo $email; ?>" />
			<input type="hidden" name="reissueid" value="<?php echo $checkNum; ?>" />
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			メールアドレス：<?php echo $email; ?><br />
			秘密の暗号：<input type="text" name="secret" size="10" />
			新パスワード：<input type="text" name="password" size="10" /><br />
			新パスワード：<input type="text" name="password2" size="10" />（確認用）<br />
			<input type="submit" name="submit" value="送信" />
		</form>
	</div>
</div>

<?php

	}
	
}else{
?>

<div style="width:800px; padding: 10px 30px 10px;">
	<h1>パスワードの再発行</h1>

	<P>パスワード再発行用のURLを送るため、<span style="color:red;">ユーザー登録時に使用したメールアドレス、秘密の番号（半角英数字４桁）</span>
	を下のフォームに入力してください。</p>
	
	
	﻿<div style="width: 100%; margin: 0 auto; padding: 0px 200px 20px;">
		<form action="index.php" method="post">
			<input type="hidden" name="mode" value="resend" />
			<input type="text" name="email" size="40" /><br />
			<input type="text" name="secret" size="10" />
			<input type="submit" name="submit" value="送信" />
		</form>
	</div>
	
	<P>メールアドレスを忘れた方は<a href="../ask.php">問い合わせ</a>よりご連絡ください。</p>
</div>
<?php
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
	</div>
</div>
<?php	
}
?>