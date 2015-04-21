<?php header("Content-Type:text/html;charset=utf-8");
//*****************************************************
//
//お問い合わせ
//
//問い合わせフォームはquery.phpに作ってネ
//*****************************************************

require_once("./php_function/all.php");

//タイムゾーンを日本に
date_default_timezone_set('Asia/Tokyo');

//---------------------------　必須設定　必ず設定してください　-----------------------

// 管理者メールアドレス
$to = "vetwith@gmail.com";

//フォームのメールアドレス入力箇所のname属性の値（name="○○"　の○○部分）
$Email = "Email";

// 管理者宛のメールで差出人を送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性の値を「$Email」で指定した値にしてください。
//メーラーなどで返信する場合に便利なので「する」がおすすめです。
$userMail = 1;

// Bccで送るメールアドレス
$BccMail = "";

// 管理者宛に送信されるメールのタイトル（件名）
$subject = "ホームページのお問い合わせ";


/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲み、複数の場合はカンマで区切ってください。フォーム側と順番を合わせると良いです。 
配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。*/
$require = array('ご用件','お名前','Email','お問い合わせ内容');


//----------------------------------------------------------------------
//  自動返信メール設定(START)
//----------------------------------------------------------------------

// 差出人に送信内容確認メール（自動返信メール）を送る(送る=1, 送らない=0)
// 送る場合は、フォーム側のメール入力欄のname属性の値が上記「$Email」で指定した値と同じである必要があります
$remail = 0;

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "送信ありがとうございました";

//フォーム側の「名前」箇所のname属性の値　※自動返信メールの「○○様」の表示で使用します。
//指定しない、または存在しない場合は、○○様と表示されないだけです。あえて無効にしてもOK
$dsp_name = 'お名前';

//自動返信メールの冒頭の文言 ※日本語部分のみ変更可
$remail_text = <<< TEXT

お問い合わせありがとうございました。
早急にご返信致しますので今しばらくお待ちください。

送信内容は以下になります。

TEXT;


//自動返信メールに署名（フッター）を表示(する=1, しない=0)※管理者宛にも表示されます。
$mailFooterDsp = 0;

//上記で「1」を選択時に表示する署名（フッター）（FOOTER～FOOTER;の間に記述してください）
$mailSignature = <<< FOOTER

──────────────────────
VetWith 小宮　弦
TEL：03- 3920-3593　
Email:vetwith@gmail.com
http://localhost/php/vet/index.php
──────────────────────

FOOTER;


//----------------------------------------------------------------------
//  自動返信メール設定(END)
//----------------------------------------------------------------------

//全角英数字→半角変換を行うかどうか。(する=1, しない=0)
$hankaku = 0;

//全角英数字→半角変換を行う項目のname属性の値（name="○○"の「○○」部分）
//※複数の場合にはカンマで区切って下さい。（上記で「1」を指定した場合のみ有効）
//配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。
$hankaku_array = array();


//------------------------------- 任意設定ここまで ---------------------------------------------


// 以下の変更は知識のある方のみ自己責任でお願いします。


//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
$encode = "UTF-8";

if(empty($_POST["sendQuery"])){
	$_POST["sendQuery"] = "";
}

//サニタイズ（ヌルバイト文字の除去）
if(isset($_GET)){
	$_GET = sanitizer($_GET);
}
if(isset($_POST)){
	$_POST = sanitizer($_POST);
}
if(isset($_COOKIE)){
	$_COOKIE = sanitizer($_COOKIE);
}

if(empty($mode)){ //$modeが設定されてへんとあかんよー。

	header("Location:./index.php");
	exit();

}elseif(isset($_POST["confirm"]) && empty($_POST["sendQuery"])){ //確認ボタンぽちー→確認！
	
	$errm = "";
	$header = "";
	
	//必須項目のチェック。配列。
	$requireResArray = requireCheck($require);
	//必須項目に関するエラーメッセージ配列
	$errm = $requireResArray['errm'];
	//入力してねー。
	$empty_flag = $requireResArray['empty_flag'];

	//メールアドレスチェック。
	if(empty($errm)){
		foreach($_POST as $key=>$val){

			if($key == $Email){
				$post_mail = h($val);
			}
			
			if($key == $Email && !empty($val)){
				if(!is_mail($val)){
					$errm .= "【".$key."】はメールアドレスの形式が正しくありません。";
					$empty_flag = 1;
				}
			}
		}
		
	}
	?>

	<div id="formWrap">

	<?php
	//エラー項目が・・・
	if($empty_flag == 1){

	?>

	<div align="center">
		<h4>入力にエラーがあります。「戻る」ボタンにて修正をお願い致します。</h4>
	<?php 
	echo "<p class=\"error_messe\>".$errm."</p>\n";
	?>
		<br />
		<br />-
		<input type="button" value="入力画面に戻る" onClick="history.back()">
	</div>
	<?php

	}else{
	?>

	<h1>お問い合わせ内容の確認</h1>
	<p align="center">以下の内容で間違いがなければ、「送信」ボタンを押してください。</p>
	<form action="contain.php?mode=contact" method="POST">
	<input type="hidden" name="sendQuery" value="sent" />
	<table class="formTable">
	<?php
	//入力内容の表示
	echo confirmOutput($_POST);
	?>
	</table>
	<p align="center">
	<input type="submit" value="送信する">
	<input type="button" value="入力画面に戻る" onClick="history.back()"></p>
	</form>
	<?php
	}
	?>
	</div>
	<?php
	
}elseif($_POST["sendQuery"] == "sent"){ //送信ボタンぽちー→送信！

	$sentmail = 1;
	$post_mail = sanitizer($_POST["$Email"]);

	//差出人へのメール
	$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature);
	$reheader = userHeader($refrom_name,$to);
	
	if(!mb_send_mail($post_mail,$re_subject,$userBody,$reheader)){
		echo "確認メールの送信に失敗しました。<br />";
		$sentmail = 0;
	}
	
	//VetWithへのメール
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature);
	$header = adminHeader($userMail,$post_mail,$BccMail,$to);
	
	if(!mb_send_mail($to,$subject,$adminBody,$header)){
		echo "お問い合わせメールの送信に失敗しました。<br />";
		$sentmail = 0;
	}
	
	if($sentmail != 0){
		?>
		<div style="width:800px; padding: 10px 30px 10px;">
				<h1>お問い合わせ送信完了</h1>
				<div style="width: 100%; margin: 0 auto; padding: 0px 200px 20px;">
				お問い合わせメールを送信しました。<br />
				返信までしばらくお待ち下さい。
				</div>
			</div>
		<?php
	}

}else{ //それ以外は問い合わせフォーム表示
	
	$queryKey = "ok"; //query.phpを開く合図。
	require_once("./query.php"); //実際の問い合わせフォーム。
	
}


function sanitizer($arr){
	if(is_array($arr)){
		return array_map('sanitizer',$arr);
	}
	return str_replace("\0","",$arr);
}

//送信メールにPOSTデータをセットする関数
function postToMail($arr){
	global $hankaku,$hankaku_array;
	$resArray = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//連結項目の処理
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');
			
		}else{ $out = $val; }//チェックボックス（配列）追記ここまで
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		
		//全角→半角変換
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		if($out != "confirm_submit" && $key != "httpReferer") {
			$resArray .= "【 ".h($key)." 】 ".h($out)."\n";
		}
	}
	return $resArray;
}
//確認画面の入力内容出力用関数
function confirmOutput($arr){
	global $hankaku,$hankaku_array;
	$html = '';
	foreach($arr as $key => $val){
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//連結項目の処理
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item.', ';
				}
			}
			//", "を末尾から取り除く 
			$out = rtrim($out,', ');
			
		}else{
			$out = $val;
		}//チェックボックス（配列）追記ここまで
		
		if(get_magic_quotes_gpc()){
			$out = stripslashes($out);
		}
		$out = nl2br(h($out));//改行コードを<br>タグに変換
		$key = h($key);
		
		//全角→半角変換
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		
		if($key != "sendQuery" && $key != "confirm"){
			$html .= "<tr><th>".$key."</th><td>".$out;
			$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$out).'" />';
			$html .= "</td></tr>\n";
		}
	}
	return $html;
}

//全角→半角変換
function zenkaku2hankaku($key,$out,$hankaku_array){
	global $encode;
	if(is_array($hankaku_array) && function_exists('mb_convert_kana')){
		foreach($hankaku_array as $hankaku_array_val){
			if($key == $hankaku_array_val){
				$out = mb_convert_kana($out,'a',$encode);
			}
		}
	}
	return $out;
}
//配列連結の処理
function connect2val($arr){
	$out = '';
	foreach($arr as $key => $val){
		if($key === 0 || $val == ''){//配列が未記入（0）、または内容が空のの場合には連結文字を付加しない（型まで調べる必要あり）
			$key = '';
		}elseif(strpos($key,"円") !== false && $val != '' && preg_match("/^[0-9]+$/",$val)){
			$val = number_format($val);//金額の場合には3桁ごとにカンマを追加
		}
		$out .= $val . $key;
	}
	return $out;
}

//管理者宛送信メールヘッダ
function adminHeader($userMail,$post_mail,$BccMail,$to){
	$header = '';
	if($userMail == 1 && !empty($post_mail)) {
		$header="From: $post_mail\n";
		if($BccMail != ""){
		  $header.="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$post_mail."\n";
	}else {
		if($BccMail != ""){
		  $header="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$to."\n";
	}
		$header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
		return $header;
}
//管理者宛送信メールボディ
function mailToAdmin($arr,$subject,$mailFooterDsp,$mailSignature){
	$adminBody="「".$subject."」からメールが届きました\n\n";
	$adminBody .="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$adminBody.= postToMail($arr);//POSTデータを関数からセット
	$adminBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$adminBody.="送信された日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	$adminBody.="送信者のIPアドレス：".@$_SERVER["REMOTE_ADDR"]."\n";
	$adminBody.="送信者のホスト名：".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
	$adminBody.="問い合わせのページURL：".@$arr['httpReferer']."\n";
	return $adminBody.= $mailSignature;
}

//ユーザ宛送信メールヘッダ
function userHeader($refrom_name,$to){
	$reheader = "From: ";
	if(isset($refrom_name)){
		$reheader .= mb_encode_mimeheader($refrom_name)." <".$to.">\nReply-To: ".$to;
	}else{
		$reheader .= "$to\nReply-To: ".$to;
	}
	$reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	return $reheader;
}
//ユーザ宛送信メールボディ
function mailToUser($arr,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature){
	$userBody = '';
	if(isset($arr[$dsp_name])) $userBody = h($arr[$dsp_name]). " 様\n";
	$userBody.= $remail_text;
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$userBody.= postToMail($arr);//POSTデータを関数からセット
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$userBody.="送信日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	return $userBody.= $mailSignature;
}
//必須チェック関数
function requireCheck($require){
	$res['errm'] = '';
	$res['empty_flag'] = 0;
	foreach($require as $requireVal){
		$existsFalg = '';
		foreach($_POST as $key => $val) {
			if($key == $requireVal) {
				
				//連結指定の項目（配列）のための必須チェック
				if(is_array($val)){
					$connectEmpty = 0;
					foreach($val as $kk => $vv){
						if(is_array($vv)){
							foreach($vv as $kk02 => $vv02){
								if($vv02 == ''){
									$connectEmpty++;
								}
							}
						}
						
					}
					if($connectEmpty > 0){
						$res['errm'] .= "【".h($key)."】は必須項目です。";
						$res['empty_flag'] = 1;
					}
				}
				//デフォルト必須チェック
				elseif($val == ''){
					$res['errm'] .= "【".h($key)."】は必須項目です。";
					$res['empty_flag'] = 1;
				}
				
				$existsFalg = 1;
				break;
			}
			
		}
		if($existsFalg != 1){
				$res['errm'] .= "【".$requireVal."】が未選択です。";
				$res['empty_flag'] = 1;
		}
	}
	
	return $res;
}

?>