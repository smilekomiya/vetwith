<?php
//*****************************************************
//yuzuyuzu
//
//htmlを出力する周りのphp。
//
//【目次】
//連想配列からプルダウンメニューを作成する。
//
//*****************************************************

//連想配列からプルダウンメニューを作成する。
function pull_list($array, $name, $selected_value = ""){
	echo "<select name=\"${name}\">";
	while(list($value, $text) = each($array)){ //listは言語構造だけど代入出来る要素ないとエラー返すよ
		echo "<option value=\"${value}\">$text</option>";
	}
	echo "</select>";
}
?>