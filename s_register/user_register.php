<?php
/* 入力フォームからパラメータを取得 */
/*******************************************************************************
 *
 *	 [user_register.php]　会員登録と登録内容送信
 * 
 ********************************************************************************/
$formList = array('mode', 'pre_userid', 'input_l_name', 'input_f_name', 'input_l_name_kana', 'input_f_name_kana', 'input_sex', 'input_password', 'input_email', 'input_grade', 'input_univ');

/* ポストデータを取得しパラメータと同名の変数に格納 */
foreach($formList as $value) {
  $$value = $_POST[$value];
}

/* エラーメッセージの初期化 */
$error = array();

/* データベース接続設定 */
require_once('../dbsetting/db.php');

/* ユーザーIDチェック */
$query = "select userid from members where userid = '$input_userid'"; 
$resultId = mysql_query($query);
	
if(mysql_num_rows($resultId) > 0 ) { //ユーザーIDが存在
  array_push($error,"このユーザーIDはすでに登録されています。");
}

/* ユーザーネームチェック */
$query = "select name from members where name = '$input_name'"; 
$resultName = mysql_query($query);
	
if(mysql_num_rows($resultName) > 0 ) { //ユーザーIDが存在
  array_push($error,"このユーザーネームはすでに登録されています。");
}
	
if(count($error) == 0) {

	/*会員のmemberidをすべてのitem_XXXテーブルに登録*/
	try{
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$dbh->beginTransaction();
		//データの挿入
		date_default_timezone_set('Asia/Tokyo'); //タイムゾーンを日本時間に設定
		$query = $dbh->prepare("UPDATE members SET userid = ?, password = ?, name = ? , email = ?, created_at = ? WHERE pre_userid = ?");
		$result = $query->execute(array($input_userid, $input_password, $input_name, $input_email, date("Y-m-d H:i:s"), $pre_userid));
		
		//挿入したレコードのmemberidを取得
		$mId = $dbh->prepare("SELECT memberid FROM members WHERE pre_userid = ?");
		$mId->bindValue(1, $pre_userid, PDO::PARAM_INT);
		$mId->execute();
		$data = $mId->fetch(PDO::FETCH_ASSOC);
		$memberid = $data['memberid'];
		
		//pre_userid破棄。
		$delete = $dbh->prepare("UPDATE members SET pre_userid = ? WHERE pre_userid = ?");
		$delete->execute(array("deleted", $pre_userid));
		
		//すべてのエキスパンションのアイテムレコードにstockが0の状態でアイテム登録。
		foreach($cardsetALL as $value){
			$exNum = count($value); //ブロック毎のエキスパンション数を取得
			for($i = 0; $i < $exNum; $i++){
				$exData = $value[$i]."_data"; //エキスパンションのカードデータが入っているテーブル名を取得
				$sheets = $dbh->prepare("SELECT * FROM $exData");
				$sheets->execute();
				$sheetsNum = $sheets->rowCount(); //エキスパンション内の収録枚数を取得
				$insert = NULL;
				for($j = 1; $j < $sheetsNum; $j++){
					$insert .= "($memberid, $j, 0), ";
					}
				$exInsert = "INSERT INTO $value[$i] (memberid, item_id, stock) VALUES ".$insert."($memberid, $sheetsNum, 0);";
				$allInsert = $dbh->prepare($exInsert);
				$allInsert->execute();
			}
		}
		$dbh->commit();
		
		/* 登録完了メールを送信 */
    mb_language("japanese");  //言語の設定
    mb_internal_encoding("utf-8");//内部エンコーディングの設定
  
    $to = $input_email;
    $subject = "会員登録URL送信メール";
    $message = "会員登録ありがとうございました。\n"."登録いただいたユーザーIDは[$input_userid]です。";
    $header = "From:test@test.com";
  
    if(!mb_send_mail($to, $subject, $message, $header)) {  //メール送信に失敗したら
		array_push($error,"メールが送信できませんでした。<br>ただしデータベースへの登録は完了しています。");
	}
	
	}catch(Exception $e){
		$dbh->rollBack();
		array_push($error,"データの登録に失敗しました。もう一度やり直してください。".$e->getMessage());
	}	
}
	
if(count($error) == 0) {	
?>
<table>
  <caption>データベース登録完了</caption>
  <tr>
    <td class="item">Thanks：</td>
    <td>登録ありがとうございます。<br>登録完了のお知らせをメールで送信しましたので、ご確認ください。</td>
  </tr>
</table>

<?php
/* エラー内容表示 */
} else {
?>
<table>
  <caption>データベース登録エラー</caption>
  <?php
	foreach($error as $value) {
	echo "<tr><td class=\"item\">Error：</td>
    <td>";
    print $value;
	echo '</td></tr>';
	}
  ?>
</table>
<?php
  }
?>