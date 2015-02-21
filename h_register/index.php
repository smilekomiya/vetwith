<?php
//*****************************************************
//
//登録用プログラムのメインページ。メールアドレス登録→確認→本登録
//あとは詳細な設定。
//
//*****************************************************

//ユーザー定義関数の読み込み
require ("../php_function/all.php");

//登録ページのタイトル
$page_title = "動物病院登録";

//登録時メールアドレス重複チェックを行うかどうか。yes=1,no=0。
$checkMail = 0;

/* ヘッダーで読み込むファイル。このファイルからの相対パスで記述 */
$header_file_tag = '<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';


//URLからindex.phpに飛んでくる場合$_POSTが定義されていないケースあり。そのケースはエラーを無視する。
error_reporting(E_ALL & ~E_NOTICE);

/* 登録処理（終了を知らせる値）によって読み込むファイルを変える */
if (isset($_POST["mode"])) {
	$mode = $_POST["mode"];
}else{
	$mode = $_GET["mode"];
}

/* パラメーターに　pre_useridがあれば登録フォームを表示。 */
if (isset($_GET['pre_userid']) && ($_GET['pre_userid'] !="")) {
	$mode = "register";
}

/* 振り分け処理 */
switch($mode) {
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

  //メールアドレス登録（初期画面）
  default:
  $module = "email_form.php";
  break;
}

  // コンテンツ（表示ページ）読み込み
  require_once("./upper.php");
  require_once($module);
  require_once("./lower.php");
?>