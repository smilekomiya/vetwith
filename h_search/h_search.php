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
$query = "SELECT h_id, h_name, h_email FROM h_members WHERE h_name like '%$search%'";
$result = mysql_query($query);

//データの数
$dataCount = mysql_num_rows($result);
//var_dump($dataCount);
//１ページあたりの表示数
$disp = 5;
//最大ページ数
$limit = ceil($dataCount / $disp);
//var_dump($maxPageNum);

$index = 0;
while ($row[$index] = mysql_fetch_assoc($result)) {
    $index++;
}

$start = ($page - 1) * $disp;

for ($i = $start;$i <= $start+5-1;$i++) {
  if(empty($row[$i])){
    break;
  }
  print('<p>');
  print('<a href="./h_search_detail.php?h_id='.$row[$i]['h_id'].'" target="_blank" value="h_search_detail">');
  print($row[$i]['h_name']);
  print('</a>');
  print(','.$row[$i]['h_email']);
  print('</p>');
}

// エラー処理はあとでやろう

//var_dump($row);

//$page = empty($_GET["page"])? 1:$_GET["page"];//ページ番号
//if (is_null($page)) {
//  $page = 1;
//}

paging($limit, $page);
var_dump($page);

function paging($limit, $page, $disp=5){
    //$dispはページ番号の表示数
    $next = $page + 1;
    $prev = $page - 1;
     
    //ページ番号リンク用
    $start =  ($page-floor($disp/2) > 0) ? ($page-floor($disp/2)) : 1;//始点
    $end =  ($start > 1) ? ($page+floor($disp/2)) : $disp;//終点
    $start = ($limit < $end)? $start-($end-$limit):$start;//始点再計算
     
    if($page != 1 ) {
         print '<a href="?page='.$prev.'">&laquo; 前へ</a>';
    }

    //最初のページへのリンク
    if($start >= floor($disp/2)){
        print '<a href="?page=1">1</a>';
        if($start > floor($disp/2)) print "..."; //ドットの表示
    }
     
     
    for($i=$start; $i <= $end ; $i++){//ページリンク表示ループ
         
        $class = ($page == $i) ? ' class="current"':"";//現在地を表すCSSクラス
         
        if($i <= $limit && $i > 0 )//1以上最大ページ数以下の場合
            print '<a href="?page='.$i.'"'.$class.'>'.$i.'</a>';//ページ番号リンク表示
         
    }
     
    //最後のページへのリンク
    if($limit > $end){
        if($limit-1 > $end ) print "...";    //ドットの表示
        print '<a href="?page='.$limit.'">'.$limit.'</a>';
    }
         
    if($page < $limit){
        print '<a href="?page='.$next.'">次へ &raquo;</a>';
    }
     
    /*確認用
    print "<p>current:".$page."<br>";
    print "next:".$next."<br>";
    print "prev:".$prev."<br>";
    print "limit:".$limit."<br>";
    print "start:".$start."<br>";
    print "end:".$end."</p>";*/
}



?>
