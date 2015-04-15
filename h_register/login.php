<?php
//*****************************************************
//
//病院ログインシステム
//
//余裕のあるときにDBを使った自動ログインも（クッキー）。↓
//http://blog.ohgaki.net/wrong-auto-login-the-answer
//*****************************************************
session_start();

require_once("../php_function/all.php");

if(!isset($_POST["login"])){//ログインボタン押されていない＝直接アクセスされたケース
	header("Location:../index.php");
}else{
	
	if(isset($_POST["formEmail"]) && isset($_POST["formPassword"])){
		$formEmail = $_POST["formEmail"];
		$formPassword = $_POST["formPassword"];
	}
	
	if(($formEmail == "") || ($formPassword == "")){
  
		error("blank");
  
	}else{//データベース接続
	
		require_once("../dbsetting/db.php");

		$query = "SELECT * FROM h_members WHERE email = '$formEmail'";
		$result = mysql_query($query);
		
		//メールアドレスが登録されていないもしくは重複されて登録されているケース
		if(mysql_num_rows($result) !== 1){
		
			error("incorrect");
			
		}else{//ちゃんとメールアドレスが１件登録されているケース
			
			while($data = mysql_fetch_assoc($result)){
				if($data["email"] == $formEmail) {
					$dbPassword = $data["password"];
					break;
				}
			}

			if(!isset($dbPassword)){
				error("incorrect");
				mysql_close($conn);
			}else{
				$hashed_Password = pass_cipher($formPassword, $formEmail);
				
				if($dbPassword != $hashed_Password){
					error("incorrectPassword");
					mysql_close($conn);
				}else{ //ログイン処理
					
					$queryId = "SELECT * FROM h_members WHERE email = '$formEmail'";
					$resultId = mysql_query($queryId);
					
					if($resultId){
						$data = mysql_fetch_assoc($resultId);
						
						mysql_close($conn);
						
						//セッション変数セット
						$_SESSION["h_id"] = $data["h_id"];
						$_SESSION["h_name"] = $data["name"];
						$_SESSION["h_email"] = $formEmail;
						
						header("Location:../hospital/index.php?mode=mypage");
						exit();
						
					}else{
						error(others);
						mysql_close($conn);
					}
				}	
			}
		}	
	}
}


//エラー表示
function error($errorType){

	switch($errorType){
    case "blank":
    $errorMsg = "メールアドレスとパスワードを入力してください。<br />";
    break;

    case "incorrect":
    $errorMsg = "メールアドレスが違うか登録されていません。<br />";
    break;

    case "incorrectPassword":
    $errorMsg = "パスワードが違います。<br />";
    break;

    case "others":
    $errorMsg = "データベースのエラーです。御手数ですがもう一度お試しください。<br />";
    break;	
	
	default:
	$errorMsg = "ｖ＾＾ｖ<br />";

	}
?>
<div style="width:100%; padding: 10px 30px 10px;">
	<h1>ログインに失敗しました。</h1>
<?php
	echo $errorMsg;
}
?>
	<p><a href="./index.php">→ユーザー登録をする。</a></p>
	
	<p><a href="./index.php?mode=resend">→メールアドレス、パスワードを忘れた。</a></p>
</div>


