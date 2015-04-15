<?php 
//*****************************************************
//
//病院登録フォームとその確認フォーム。
//
//register_form.phpやregister_confirm.phpに読み込まれる。
//
//*****************************************************

//このファイルまでのパス
$path = "http://localhost/php/vet/h_register/";

//debug_backtraceは連想配列で結果を返すよ。注意。
$require_from = debug_backtrace();

//このままでは$require_from[0][file]の中身がC:\xampp\htdocs\php\vet\・・・のままだからhttp://localhost・・・の形に変えてあげる！！
$require_from_url = c_to_http($require_from[0][file]);

//require_onceの参照元によって表示するフォームを変更しちゃうよー。
switch($require_from_url){
	
	//register_form.phpからこのファイルがrequireされたとき。
	case "${path}register_form.php":
	$form_style = "register_form";
	break;
	
	//register_confirm.phpからこのファイルがrequireされたとき。
	case "${path}register_confirm.php";
	$form_style = "register_confirm";
	break;

	default:
	$form_style = "error";
}

//都道府県の連想配列と、そこからプルダウンメニューを作る。
$name1 = 'input_pref';

$pref_array = array("notSelected" => "病院の所在地を選択してください。","北海道"=>"北海道",
"青森県"=>"青森県",
"岩手県"=>"岩手県",
"宮城県"=>"宮城県",
"秋田県"=>"秋田県",
"山形県"=>"山形県",
"福島県"=>"福島県",
"茨城県"=>"茨城県",
"栃木県"=>"栃木県",
"群馬県"=>"群馬県",
"埼玉県"=>"埼玉県",
"千葉県"=>"千葉県",
"東京都"=>"東京都",
"神奈川県"=>"神奈川県",
"新潟県"=>"新潟県",
"富山県"=>"富山県",
"石川県"=>"石川県",
"福井県"=>"福井県",
"山梨県"=>"山梨県",
"長野県"=>"長野県",
"岐阜県"=>"岐阜県",
"静岡県"=>"静岡県",
"愛知県"=>"愛知県",
"三重県"=>"三重県",
"滋賀県"=>"滋賀県",
"京都府"=>"京都府",
"大阪府"=>"大阪府",
"兵庫県"=>"兵庫県",
"奈良県"=>"奈良県",
"和歌山県"=>"和歌山県",
"鳥取県"=>"鳥取県",
"島根県"=>"島根県",
"岡山県"=>"岡山県",
"広島県"=>"広島県",
"山口県"=>"山口県",
"徳島県"=>"徳島県",
"香川県"=>"香川県",
"愛媛県"=>"愛媛県",
"高知県"=>"高知県",
"福岡県"=>"福岡県",
"佐賀県"=>"佐賀県",
"長崎県"=>"長崎県",
"熊本県"=>"熊本県",
"大分県"=>"大分県",
"宮崎県"=>"宮崎県",
"鹿児島県"=>"鹿児島県",
"沖縄県"=>"沖縄県"
);

if($form_style == "register_form"){
?>
<h3>フォームを入力してください。</h3>
<form method="post" action="index.php">
	<input type="hidden" name="mode" value="register_confirm">
	<input type="hidden" name="pre_userid" value="<?php print $pre_userid; ?>">
	<input type="hidden" name="email" value="<?php print $email; ?>">
		<table class="regi">
		<tr>
		<td width="200px" align="right">病院名</td><td><input value="<?php echo $input_name; ?>" maxLength=200 name="input_name" type="text" size="20"></td>
		</tr>
		<tr>
		<tr>
		<td width="200px" align="right">代表氏名</td><td>姓<input value="<?php echo $input_l_name; ?>" maxLength=200 name="input_l_name" type="text" size="20">名<input value="<?php echo $input_f_name; ?>" maxLength=200 name="input_f_name" type="text" size="20"></td>
		</tr>
		<tr>
		<tr>
		<td width="200px" align="right">代表氏名（フリガナ）</td><td>姓<input value="<?php echo $input_l_name_kana; ?>" maxLength=200 name="input_l_name_kana" type="text" size="20">名<input value="<?php echo $input_f_name_kana; ?>" maxLength=200 name="input_f_name_kana" type="text" size="20">※全角カタカナで入力してください。</td>
		</tr>
		<tr>
		<td width="200px" align="right">都道府県</td>
		<td>
<?php
//都道府県を選択するプルダウンメニューを表示	
$selected_value = $_POST["$name1"];
pull_list($pref_array, $name1, $selected_value);
?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">都道府県以下の住所</td><td><input value="<?php echo $input_address; ?>" maxLength=200 name="input_address" type="text" size="20">	（例：千代田区別途町１－１－１）
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">メールアドレス</td><td><input type="hidden" name="input_email" value="<?php echo $email; ?>"><?php echo $email; ?></td>
		</tr>
		<tr>
		<td width="200px" align="right">電話番号</td><td><input value="<?php echo $input_tel; ?>" maxLength=200 name="input_tel" type="text" size="20">（例：03-1234-5678）</td>
		</tr>
		<tr>
		<td width="200px" align="right">パスワード</td><td><input value="<?php echo $input_password; ?>" maxLength="200" name="input_password" type="text" size="30">   ※英数8字以上128字以下で入力してください。</td>
		</tr>
		<tr><td> </td><td> </td></tr>
		<tr>
		<td width="200px" align="right"> </td><td>
		<input id="submit_button" type="submit" name="h_regi" value="確認する"></td>
		</tr>
		</table>
</form>
<?php
}elseif($form_style == "register_confirm"){
?>
<h3>入力内容の確認をしてください。</h3>
<form method="post" action="index.php">
	<input type="hidden" name="mode" value="user_register">
	<input type="hidden" name="pre_userid" value="<?php print $pre_userid; ?>">
		<table class="regi">
		<tr>
		<td width="200px" align="right">病院</td>
		<td>
		<input type="hidden" name="input_name" value="<?php echo $input_name; ?>"><?php echo $input_name; ?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">代表氏名</td>
		<td>
		姓： <input type="hidden" name="input_l_name" value="<?php echo $input_l_name; ?>"><?php echo $input_l_name; ?><br />名： <input type="hidden" name="input_f_name" value="<?php echo $input_f_name; ?>"><?php echo $input_f_name; ?>
		</td>
		</tr>
		<tr>
		<tr>
		<td width="200px" align="right">代表氏名（フリガナ）</td>
		<td>
		姓： <input type="hidden" name="input_l_name_kana" value="<?php echo $input_l_name_kana; ?>"><?php echo $input_l_name_kana; ?><br />名： <input type="hidden" name="input_f_name_kana" value="<?php echo $input_f_name_kana; ?>"><?php echo $input_f_name_kana; ?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">都道府県</td>
		<td>
		<input type="hidden" name="input_pref" value="<?php echo $input_pref; ?>"><?php echo $pref_array["$input_pref"];?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">住所</td>
		<td>
		<input type="hidden" name="input_address" value="<?php echo $input_address; ?>"><?php echo $input_address; ?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">メールアドレス</td>
		<td>
		<input type="hidden" name="input_email" value="<?php echo $_POST['email']; ?>"><?php echo $_POST['email']; ?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">電話番号</td>
		<td>
		<input type="hidden" name="input_tel" value="<?php echo $input_tel; ?>"><?php echo $input_tel; ?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">パスワード</td>
		<td><input type="hidden" name="input_password" value="<?php echo $input_password; ?>"><?php echo $input_password; ?>
		</td>
		</tr>
		<tr><td> </td><td> </td></tr>
		<tr>
		<td width="200px" align="right"> </td><td>
		<input id="submit_button" type="submit" name="s_regi" value="登録する"></td>
		</tr>
		</table>
</form>
<?php
}elseif($form_style == "error"){
	echo "エラーが発生しました。御手数おかけしますが以下のリンクより再度会員登録をお願い致します。<br />";
	echo "<a href=\"${path}index.php\">${path}index.php</a><br />";
}
?>