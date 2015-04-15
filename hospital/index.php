<?php
//*****************************************************
//
//病院のログイン後ホームページ。
//
//*****************************************************
session_start();

//ユーザー定義関数の読み込み
require ("../php_function/all.php");

//ログインされていない場合
if(empty($_SESSION["h_id"])){
require_once("./upper.php");
?>
<div id="formWrap">
	<h1>ログインページ</h1>
	<p>VetWithの機能を利用するためにはログインしてください。</p>
	<div style="width: 600px; padding: 30px 0 30px 20px">
		<form action="../h_register/index.php" method="post">
			<input type="hidden" name="mode" value="h_login" />
			<label for="Email">メールアドレス</label><br />
			<input type="text" name="formEmail" id="Email"/>
			<br />
			<label for="Password">パスワード</label><br />
			<input type="text" name="formPassword" id="Password" />		
			<input type="submit" name="login" value="ログイン" />
		</form>
	</div>
	<p>登録が済んでない場合→<a href="../h_register/index.php">登録</a>
	</p>
	<p>その他→<a href="../contain.php?mode=contact">お問い合わせ</a></p>
</div>
<?php
require_once("./lower.php");
}elseif(empty($_GET["mode"])){
	echo "無効なURLです。";
}else{
	
	$mode = $_GET["mode"];
	
	switch($mode){
	
		//マイページ画面表示
		case"mypage":
		$module = "mypage.php";
		break;
		
		//インターン入力
		case"intern":
		$module = "intern.php";
		break;
		
		//インターン確認
		case"intern_confirm":
		$module = "intern_confirm.php";
		break;
		
		//インターン登録
		case"intern_register":
		$module = "intern_register.php";
		break;
		
		//デフォルト：マイページ
		default:
		$module = "mypage.php";
		break;
	}
	require_once("./upper.php");
	require_once($module);
	require_once("./lower.php");
}
?>
