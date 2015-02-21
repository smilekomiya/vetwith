<?php
/* フォームから検索ワードを取得 */
$search = $_POST["search"];
//$page = $_GET["page"];
$page = empty($_GET["page"])? 1:$_GET["page"];//ページ番号
/* エラーメッセージ配列 */
$error = array();

/* データベースに接続 */
@require_once("../dbsetting/db.php");

mysql_set_charset('utf8');
//SQL文を発行
$query = "SELECT h_name, h_email FROM h_members WHERE h_name like '%$search%'";
$result = mysql_query($query);


$index = 0;
while ($row[$index] = mysql_fetch_assoc($result)) {
    $index++;
}

for ($i = $start;$i <= $start+5-1;$i++) {
  if(empty($row[$i])){
    break;
  }
  print('<p>');
  print('<a href="http://www.yahoo.co.jp" target="_blank" value="h_search_detail">');
  print($row[$i]['h_name']);
  print('</a>');
  print(','.$row[$i]['h_email']);
  print('</p>');
}

// エラー処理はあとでやろう

//var_dump($row);

?>
