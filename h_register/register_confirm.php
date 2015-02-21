<?php
/* 入力フォームからパラメータを取得 */
/*******************************************************************************
 *
 *	 [register_confirm.php]　会員登録内容の確認
 * 
 ********************************************************************************/

/* ※この$formListは同じものを./user_register.phpでも用いる※ */
/* 入力フォームからパラメータを取得 */
$formList = array('mode', 'pre_userid', 'input_h_name','input_h_password', 'input_h_email', 'input_h_prefecture', 'input_h_address');

/* 必須項目 */
$requireList = array('mode', 'pre_userid', 'input_h_name','input_h_password', 'input_h_email', 'input_h_prefecture', 'input_h_address');

/* ポストデータを取得しパラメータと同名の変数に格納 */
//ここでは、$formList配列のそれぞれのnameに相当する投稿内容（$_POST[$value]）に対してそれと同じ名前の変数$($value)を用意して、代入している。例えば$input_email=meado@meado.comなど。
foreach($formList as $value) {
  $$value = h($_POST[$value]); //一応htmlタグのエスケープを。
}

/* エラーメッセージの初期化。 */
$error = array();

/* 必須項目入力チェック */
foreach($requireList as $value){
	if(empty($$value)){
		array_push($error, "すべての項目を入力してください。");
	}
}

/* 動物病院名が入力されているかチェーック */
if($input_h_name == ""){
	array_push($error,"動物病院名が入力されておりません。");
}

/* 都道府県が選択されているかチェーック */
if(empty($input_h_prefecture) || $input_h_prefecture == "notSelected"){
	array_push($error,"所在先の都道府県が選択されておりません。");
}

/* 都道府県以下の住所が入力されているかチェーック */
if($input_h_address == ""){
	array_push($error,"動物病院名が入力されておりません。");
}

/* パスワードチェック */
if (!is_alphanum($input_h_password)){
	array_push($error,"パスワードは6文字以上12文字以内の半角英数字で入力してください。");
}else{
	if (strlen($input_h_password) < 8 || strlen($input_h_password) > 128){
	array_push($error,"パスワードは8文字以上128文字以内の半角英数字で入力してください。a");
		}
}

/* エラー 入力フォーム表示 $error */
if(count($error) > 0) {
	//エラーの重複を削除
	$error = array_unique($error);
	require_once("register_form.php");
} else {
	require_once ("./formhtml.php");
}
?>	