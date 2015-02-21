<?php
//*****************************************************
//
//病院検索
//
//*****************************************************

//ユーザー定義関数の読み込み
require ("../php_function/all.php");

//登録ページのタイトル
$page_title = "病院検索";

/* ヘッダーで読み込むファイル。このファイルからの相対パスで記述 */
$header_file_tag = '<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/search.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';




//URLからindex.phpに飛んでくる場合$_POSTが定義されていないケースあり。そのケースはエラーを無視する。
error_reporting(E_ALL & ~E_NOTICE);

/* 読み込むファイルを変える */
if (isset($_POST["mode"])) {
  $mode = $_POST["mode"];
}else{
  $mode = $_GET["mode"];
}

$page = $_GET["page"];
//var_dump($page);

/* 振り分け処理 */
switch($mode || isset($page)) {
  //検索結果
  case "h_search":
  $module = "h_search.php";
  break;

  //病院検索トップ
  default:
  $module = "h_search_form.php";
  break;
}


require_once("./upper.php");
require_once($module);
require_once("./lower.php");


?>