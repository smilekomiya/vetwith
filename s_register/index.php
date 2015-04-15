<?php
//*****************************************************
//
//登録用プログラムのメインページ。メールアドレス登録→確認→本登録
//
//あとパスワードの再発行も。
//要設定項目あり！
//*****************************************************
session_start();

//ユーザー定義関数の読み込み
require ("../php_function/all.php");

//登録時メールアドレス重複チェックを行うかどうか。yes=1,no=0。
$checkMail = 1;

//URLからindex.phpに飛んでくる場合$_POSTが定義されていないケースあり。そのケースはエラーを無視する。
error_reporting(E_ALL & ~E_NOTICE);

/* 登録処理（終了を知らせる値）によって読み込むファイルを変える */
if(isset($_POST["mode"])){
	$mode = $_POST["mode"];
}elseif($_GET["mode"] == "resend"){
	$mode = $_GET["mode"];
}elseif($_GET["mode"] == "s_logout"){
	$mode = "s_logout";
}

/* パラメーターに　pre_useridがあれば学生登録フォームを表示。 */
if (isset($_GET["pre_userid"]) && ($_GET["pre_userid"] !="")) {
	$mode = "register";
}

/* URLにreissueid引数があればパスワード再発行フォームを表示 */
if(isset($_GET["reissueid"])){
	$mode = "resend";
}


switch($mode){
  // メールアドレスの登録と仮ID送信
	case"email_register":
	$module = "email_register.php";
	break;

	//会員登録フォーム
	case"register":
	$module = "register_form.php";
	break;

	//登録内容確認
	case"register_confirm":
	$module = "register_confirm.php";
	break;

	//会員登録
	case"user_register":
	$module = "user_register.php";
	break;
	
	//ログイン
	case"s_login":
	$module = "login.php";
	break;
	
	//ログアウト
	case"s_logout":
	$module = "logout.php";
	break;
	
	//パスワード再送
	case"resend":
	$module = "resend.php";
	break;
	
	//パスワード再発行
	case"reissue":
	$module = "reissue.php";
	break;

	//メールアドレス登録
	default:
	$module = "email_form.php";
	break;
}

	// コンテンツ（表示ページ）読み込み
	require_once("./upper.php");
	require_once($module);
	require_once("./lower.php");
?>