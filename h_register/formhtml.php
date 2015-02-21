<?php 
//*****************************************************
//yuzuyuzu
//
//登録フォームとその確認フォーム。
//
//register_form.phpやregister_confirm.phpなどに読み込まれる。
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

//大学名、学年の連想配列と、そこからプルダウンメニューを作る。
$name1 = 'input_univ';
$name2 = 'input_grade';	
	
$univ_array = array(
	"notSelected" => "在学中の大学を選択してください。",
	"1" => "酪農学園大学",
	"2" => "北海道大学",
	"3" => "帯広畜産大学",
	"4" => "北里大学",
	"5" => "岩手大学",
	"6" => "東京大学",
	"7" => "東京農工大学",
	"8" => "日本大学",
	"9" => "麻布大学",
	"10" => "日本獣医生命科学大学",
	"11" => "岐阜大学",
	"12" => "大阪府立大学",
	"13" => "鳥取大学",
	"14" => "山口大学",
	"15" => "宮崎大学",
	"16" => "鹿児島大学"
);

$grade_array = array(
	"notSelected" => "現在の学年を選択してください。",
	"1" => "1年",
	"2" => "2年",
	"3" => "3年",
	"4" => "4年",
	"5" => "5年",
	"6" => "6年",
	"7" => "博士1年",
	"8" => "博士2年",
	"9" => "博士3年",
	"10" => "博士4年"
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
		<td width="200px" align="right">氏名</td><td>姓<input value="<?php echo $input_l_name; ?>" maxLength=200 name="input_l_name" type="text" size="20">名<input value="<?php echo $input_f_name; ?>" maxLength=200 name="input_f_name" type="text" size="20"></td>
		</tr>
		<tr>
		<tr>-
		<td width="200px" align="right">氏名（フリガナ）</td><td>姓<input value="<?php echo $input_l_name_kana; ?>" maxLength=200 name="input_l_name_kana" type="text" size="20">名<input value="<?php echo $input_f_name_kana; ?>" maxLength=200 name="input_f_name_kana" type="text" size="20">※全角カタカナで入力してください。</td>
		</tr>
		<tr>
		<td width="200px" align="right">性別</td><td>男<input type="radio" name="input_sex" value="man" 
		<?php 
		if($input_sex == "man" && $input_sex !=="woman"){
			echo 'checked = \"checked\"';
		}
		?>
		>女<input type="radio" name="input_sex" value="woman"
		<?php 
		if($input_sex == "woman" && $input_sex !=="man"){
			echo 'checked = \"checked\"';
		}
		?>
		></td>
		</tr>
		<tr>
		<td width="200px" align="right">大学</td>
		<td>
<?php
//大学を選択するプルダウンメニューを表示	
$selected_value = $_POST["$name1"];
pull_list($univ_array, $name1, $selected_value);
?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">学年</td>
		<td>
<?php
//学年を選択するプルダウンメニューを表示	
$selected_value = $_POST["$name2"];
pull_list($grade_array, $name2, $selected_value);
?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">メールアドレス</td><td><input type="hidden" name="input_email" value="<?php echo $email; ?>"><?php echo $email; ?></td>
		</tr>
		<tr>
		<td width="200px" align="right">パスワード</td><td><input value="<?php echo $input_password; ?>" maxLength="200" name="input_password" type="text" size="30">   ※英数8字以上128字以下で入力してください。</td>
		</tr>
		<tr><td> </td><td> </td></tr>
		<tr>
		<td width="200px" align="right"> </td><td>
		<input id="submit_button" type="submit" name="s_regi" value="確認する"></td>
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
		<td width="200px" align="right">氏名</td>
		<td>
		姓： <input type="hidden" name="input_l_name" value="<?php echo $input_l_name; ?>"><?php echo $input_l_name; ?><br />名： <input type="hidden" name="input_f_name" value="<?php echo $input_f_name; ?>"><?php echo $input_f_name; ?>
		</td>
		</tr>
		<tr>
		<tr>
		<td width="200px" align="right">氏名（フリガナ）</td>
		<td>
		姓： <input type="hidden" name="input_l_name_kana" value="<?php echo $input_l_name_kana; ?>"><?php echo $input_l_name_kana; ?><br />名： <input type="hidden" name="input_f_name_kana" value="<?php echo $input_f_name_kana; ?>"><?php echo $input_f_name_kana; ?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">性別</td><td>
		<?php 
		if($input_sex == "man"){
		?>
		<input type="hidden" name="input_sex" value="<?php echo $input_sex; ?>">男
		<?php
		}elseif($input_sex == "woman"){
		?>
		<input type="hidden" name="input_sex" value="<?php echo $input_sex; ?>">女
		<?php
		}else{
			echo "性別が選択されていないかつそれがチェックされていないエラー";
		}
		?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">大学</td>
		<td>
		<input type="hidden" name="input_univ" value="<?php echo $input_univ; ?>"><?php echo $univ_array["$input_univ"];?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">学年</td>
		<td>
		<input type="hidden" name="input_grade" value="<?php echo $input_grade; ?>"><?php echo $grade_array["$input_grade"];?>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">メールアドレス</td>
		<td>
		<input type="hidden" name="input_email" value="<?php echo $_POST['email']; ?>"><?php echo $_POST['email']; ?>
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