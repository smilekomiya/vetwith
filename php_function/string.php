<?php
//*****************************************************
//
//文字列関係設定用のphp。特に会員登録に際して。
//
//【目次】
//HTMLタグエスケープ
//メールアドレスチェック
//数字チェック
//英字チェック
//英数字チェック
//ユーザーIDチェック
//カタカナチェック
//パスワードの暗号化
//*****************************************************
//【要設定項目】
//トップページまでのパス
$path_to_hp = 'C:\\xampp\\htdocs\\php\\vet\\';
//トップページまでの絶対URL
$url_to_hp = 'http://localhost/php/vet/';


//HTMLタグエスケープ
function h($str){
	if(is_array($str)){
		return array_map("h", $str);
	}else{
	return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
	}
}

//メールアドレスチェック
function is_mail($str){
	if(preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $str)){
		return true;
	}else{
		return false;
	}
}

// 数字チェック
function is_num($str) {
    if (preg_match('/^[0-9]+$/', $str)) {
        return true;
    } else {
        return false;
    }
}

// 英字チェック
function is_alpha($str) {
    if (preg_match('/^[a-zA-Z]+$/', $str)) {
        return true;
    } else {
        return false;
    }
}

//英数字チェック
function is_alphanum($str) {
    if (preg_match('/^[a-zA-Z0-9]+$/', $str)) {
        return true;
    }
    else {
        return false;
    }
}

//ユーザーidチェック
function is_userid($str){
	if (preg_match('/^[a-z][a-z0-9_]{5,19}$/', $str)){
		return true;
	}else{
		return false;
	}
}

//カタカナのみチェーック
function is_kana($str){
	//UTF-8のエンコーディング
	mb_regex_encoding("UTF-8");
	if(preg_match('/^[ァ-ヶー]+$/u', $str)){
		return true;
	}else{
		return false;
	}
}

//C:\xampp\htdocs\php\vet\・・・のままだからhttp://localhost・・・の形に変えてあげる
function c_to_http($path){
	if(preg_match('/^C:/', "$path")){ //$pathがC:\で始まるなら・・・
		global $path_to_hp, $url_to_hp; //グローバルキーワード
		$not_needed_part = mb_strlen($path_to_hp);
		$cut_path = substr($path, $not_needed_part); //パスからC:\ ・・・　\vet\までを切り取る。
		$transformed_url = $url_to_hp.$cut_path;
		//バックスラッシュをスラッシュに置換。
		return $transformed_url = str_replace("\\", "/", "$transformed_url");
	}else{
		return "エラーです。";
	}
}

//パスワードの暗号化
function pass_cipher(){
}


?>