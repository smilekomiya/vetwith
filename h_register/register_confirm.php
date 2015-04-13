<?php
//*****************************************************
//
//病院登録最終確認。
//
//*****************************************************

/* ※この$formListは同じものを./user_register.phpでも用いる※ */
/* 入力フォームからパラメータを取得 */
$formList = array('mode', 'pre_userid', 'input_l_name', 'input_f_name', 'input_l_name_kana', 'input_f_name_kana', 'input_tel', 'input_password', 'input_email', 'input_address', 'input_name','input_pref');

/* 必須項目 */
$requireList = array('mode', 'pre_userid', 'input_l_name', 'input_f_name', 'input_l_name_kana', 'input_f_name_kana', 'input_tel', 'input_password', 'input_email', 'input_address', 'input_name','input_pref');

/* ポストデータを取得しパラメータと同名の変数に格納 */
//ここでは、$formList配列のそれぞれのnameに相当する投稿内容（$_POST[$value]）に対してそれと同じ名前の変数$($value)を用意して、代入している。例えば$input_email=meado@meado.comなど。
foreach($formList as $value) {
  $$value = h($_POST[$value]); //一応htmlタグのエスケープを。
}

/* カタカナのみで書かれているかどうかをチェックする項目 */
$kanaList = array("$input_l_name_kana", "$input_f_name_kana"); //''ではなく""を使うことで変数の中身を展開して入れる。ただの文字列「$input_・・・」として入らないように注意。

/* エラーメッセージの初期化。 */
$error = array();

/* 必須項目入力チェック */
foreach($requireList as $value){
	if(empty($$value)){
		array_push($error, "すべての項目を入力してください。");
	}
}

/* 名前が入力されているかチェーック */
if($input_name == "" || $input_name == ""){
	array_push($error,"病院名が入力されておりません。");
}

/* 氏名が入力されているかチェーック */
if($input_l_name == "" || $input_f_name == ""){
	array_push($error,"氏名が入力されておりません。");
}

/* 住所が入力されているかチェーック */
if($input_address == "" || $input_address == ""){
	array_push($error,"住所が入力されておりません。");
}

/* 電話番号が入力されているかチェーック */
if($input_tel == "" || $input_tel == ""){
	array_push($error,"電話番号が入力されておりません。");
}

if($input_l_name_kana == "" || $input_f_name_kana == ""){
	array_push($error,"氏名のフリガナが入力されておりません。");
}else{ //フリガナが入力されている場合それがカタカナかどうかチェック。
	foreach($kanaList as $value){
		if(!is_kana($value)){
			array_push($error,"フリガナは全角のカタカナで入力してください。");
		}
	}
}

/* 都道府県が選択されているかチェーック */
if(empty($input_pref) || $input_pref == "notSelected"){
	array_push($error,"病院の都道府県が選択されておりません。");
}


/* パスワードチェック */
if (!is_alphanum($input_password)){
	array_push($error,"パスワードは8文字以上128文字以内の半角英数字で入力してください。");
}else{
	if (strlen($input_password) < 8 || strlen($input_password) > 128){
	array_push($error,"パスワードは8文字以上128文字以内の半角英数字で入力してください。");
		}
}

/* エラー 入力フォーム表示 $error */
if(count($error) > 0) {
	//エラーの重複を削除
	$error = array_unique($error);
	require_once("register_form.php");
}else{
	require_once ("./formhtml.php");
}
?>	