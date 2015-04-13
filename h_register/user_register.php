<?php
//*****************************************************
//
//病院登録。
//
//*****************************************************

 // ※この$formListは同じものを./register_confirm.phpでも用いる
$formList = array('mode', 'pre_userid', 'input_l_name', 'input_f_name', 'input_l_name_kana', 'input_f_name_kana', 'input_tel', 'input_password', 'input_email', 'input_address', 'input_name','input_pref');

// ポストデータを取得しパラメータと同名の変数に格納
foreach($formList as $value){
  $$value = h($_POST[$value]); //一応htmlタグのエスケープを。
} 

$error = array();

require_once('../dbsetting/db.php');


//メールアドレスの重複チェック
if($checkMail == 1){//チェック機能を使うかどうか。ここいぢっちゃダメー！

	$queryMail = "SELECT email FROM h_members WHERE email = '$input_email'"; 
	$resultMail = mysql_query($queryMail);
		
	if(mysql_num_rows($resultMail) > 1 ){ //メールアドレスが重複して存在している
		array_push($error,"このメールアドレスはすでに登録されています。");
	}

}

//実際にデータを追加していく。	
if(count($error) == 0){
	
	//トランザクション開始
	mysql_query("begin");
	
	//パスワードハッシュしなきゃ！
	$hashed_password = pass_cipher($input_password, $input_email);
	
	//タイムゾーンも日本時間に設定しなきゃ！
	date_default_timezone_set('Asia/Tokyo');
	$now = date("Y-m-d H:i:s");
	
	$queryRegi = "UPDATE h_members SET
	name = '$input_name',
	l_name = '$input_l_name',
	f_name = '$input_f_name',
	l_name_kana = '$input_l_name_kana',
	f_name_kana = '$input_f_name_kana',
	tel = '$input_tel',
	password = '$hashed_password',
	prefecture = '$input_pref',
	email = '$input_email',
	address = '$input_address',
	pre_userid = 'deleted',
	created_at = '$now'
	WHERE pre_userid = '$pre_userid' 
	";
	$resultRegi = mysql_query($queryRegi);
	
	if($resultRegi){
	
		mysql_query("commit");
		
		mb_language("japanese");
		mb_internal_encoding("utf-8");
	  
		$to = $input_email;
		$subject = "会員登録URL送信メール";
		$message = "会員登録ありがとうございました。\n"."登録したパスワードは[$input_password]です。";
		$header = "From:hogehoge@hogehoge.com";
	  
		if(!mb_send_mail($to, $subject, $message, $header)){//メール送信に失敗したら
			array_push($error,"データベースへの登録が済みました。後日確認メールをお送りいたします。");
		}
	}

}else{//はじめのエラーチェックで弾かれたケース。ロールバックする。
	mysql_query("rollback");
    array_push($error, "データベースに登録できませんでした。");
}

if(count($error) == 0){	
	?>
	<table>
	  <caption>データベース登録完了</caption>
	  <tr>
		<td class="item">Thanks：</td>
		<td>登録ありがとうございます。<br>登録完了のお知らせをメールで送信しましたので、ご確認ください。</td>
	  </tr>
	</table>
	<?php
}else{
	?>
	<table width="100%">
	<caption>データベース登録エラー</caption>
	<?php
		foreach($error as $value) {
		echo "<tr><td class=\"item\">・</td>
		<td>";
		print $value;
		echo '</td></tr>';
		}
	?>
	</table>
	<?php
}
?>