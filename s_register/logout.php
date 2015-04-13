<?php
//*****************************************************
//
//学生ログアウトシステム
//
//余裕のあるときにDBを使った自動ログインも（クッキー）。↓
//http://blog.ohgaki.net/wrong-auto-login-the-answer
//*****************************************************
if(empty($_SESSION["memberid"])){
?>	<div style="width:100%; padding: 10px 30px 10px;">
		ログインしていません。<br />
		<a href="../index.php">トップページに戻る。</a>
	</div>
<?php
}else{

	$_SESSION = array();
	session_destroy();
?>
	<div style="width:100%; padding: 10px 30px 10px;">
		ログアウトしました。<br />
		<a href="../index.php">トップページに戻る。</a>
	</div>
<?php
}
?>