<?php
/* フォームからメールアドレスを取得 */
$email = $_POST["email"];

/* エラーメッセージ配列 */
$error = array();

/* データベースに接続 */
require_once("../dbsetting/db.php");

/* メールアドレス入力チェック。*/
if($email == "" || !is_mail($email)){ 
	array_push($error, "正しいメールアドレスを入力してください。");
}else{
	
	$flag = NULL;
	
	if($checkMail == 1){//メールアドレスの重複をチェック
		$queryMail = "SELECT email FROM members WHERE email = '$email'"; 
		$resultMail = mysql_query($queryMail);
		if(mysql_num_rows($resultMail) > 0 ) {//登録済みメールアドレスの場合
			array_push($error,"このメールアドレスはすでに登録されています。");
		}else{
			$flag = "ok";
		}
	}
	
	if($checkmail == 0 || $flag == "ok"){
		$pre_user_id = uniqid(rand(100,999));
		$queryInsert = "INSERT INTO members(pre_userid,email) VALUES('$pre_user_id','$email')";
		$result = mysql_query($queryInsert);

		 /* データベース登録チェック */
		if($result == false) {
		   array_push($error, "データベースに登録できませんでした。御手数ですがもう一度やり直してください。");
		}else{

			/* 取得したメールアドレス宛にメールを送信 */
			mb_language("japanese");
			mb_internal_encoding("utf-8");

			$to = $email;
			$subject = "VetWith学生登録フォームのご案内";
			$message = "以下のURLより会員登録してください。\n"."http://localhost/php/vet/s_register/index.php?pre_userid=$pre_user_id";
			$header = "From:test@test.com";
			if(!mb_send_mail($to, $subject, $message, $header)){  //メール送信に失敗したら
				array_push($error,"メールが送信できませんでした。御手数ですがもう一度やり直してください。");
			}
		}
	}
}

/*エラーがあるかないかによって表示の振り分け($error配列の確認）*/
if(count($error) > 0) {  //エラーがあった場合
  /*エラー内容表示*/
  print mysql_error();
  foreach($error as $value) {
?>
<table>
  <caption>メールアドレス登録エラー</caption>
  <tr>
    <td class="item">Error：</td>
    <td><?php print $value; ?></td>
  </tr>
</table>
<?php
  }  //foreach文の終了
} else {  //エラーがなかった場合
?>
<table>
  <caption>メール送信成功しました。</caption>
  <tr>
    <td class="item">送信先メールアドレス：</td>
    <td><?php print $email ?></td>
  </tr>
</table>
<?php
}
?>