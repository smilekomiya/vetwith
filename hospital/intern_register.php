<?php
//*****************************************************
//
//病院の案件登録裏周りー。
//
//*****************************************************


if(empty($_POST["register"]) || $_POST["register"] != "登録"){
	header("Location:./index.php");
	exit();
}

$formList = array('title', 'content', 'duration', 'start', 'end');

foreach($formList as $val) {
  $$val = h($_POST["$val"]); //一応htmlタグのエスケープを。
}

$h_id = $_SESSION["h_id"];

//登録
require_once("../dbsetting/db.php");

mysql_set_charset("utf8");

//SQL文を発行
$query = "INSERT INTO anken (
h_id,
start,
end,
duration,
description,
title
) VALUES (
'$h_id',
'$start',
'$end',
'$duration',
'$content',
'$title'
)";

$result = mysql_query($query);

if($result){
	echo "インターンシップ情報が登録されました。";
}else{
	echo "データベースのエラーです。";
	echo mysql_error();
}

?>