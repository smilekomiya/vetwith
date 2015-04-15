<?php
//*****************************************************
//
//病院マイページの共通アッパー部分。
//
//*****************************************************

/* ヘッダーで読み込むファイル。このファイルからの相対パスで記述 */
$header_file_tag = '<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';

//タイトル
if(empty($mode)){
	$page_title = "ログイン";
}elseif($mode == "intern" || $mode == "intern_confirm" || $mode == "intern_register"){
	$page_title = "インターンシップ情報登録";
}else{
	$page_title = "動物病院マイページ";
}

?>
<html>
<head>
<title><?php echo $page_title; ?> | VetWith!</title>
<?php echo $header_file_tag; ?>
<style type="text/css">
#formWrap {
	width:700px;
	margin:0;
	color:#555;
	line-height:120%;
	padding: 30px 0 30px 100px;
}
table.formTable{
	width:100%;
	margin:0 auto;
	border-collapse:collapse;
}
table.formTable td,table.formTable th{
	border:1px solid #ccc;
	padding:10px;
}
table.formTable th{
	width:30%;
	font-weight:normal;
	background:#efefef;
	text-align:left;
}
p.error_messe{
	margin:5px 0;
	color:red;
}
table.formTable tr.top{
	background:#efefef;
}

table.formTable tr.notion{
	background:#ff9999;
	border: 2px solid #000000;
}


</style>
<script>
//スムーズスクロール
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 500; // ミリ秒
      // アンカーの値取得。// クリックしたリンク先を保存
      var href= $(this).attr("href");
      // 移動先を取得  // クリックしたリンク先が#または空のときは
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得// トップへ移動する
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'easeInSine');
      return false;
   });
});

$(function() {
  // 現在日時
  var current = new Date();
 
  // 年
  var year_val = current.getFullYear();
  // 月 0（1月）～11（12月） 
  var month_val = current.getMonth() + 1;
  // 日
  var day_val = current.getDate() + 1;

  // デフォルト
  $('select[name=begin_year] option[value=' + year_val + ']').prop('selected', true);
  $('select[name=begin_month] option[value=' + month_val + ']').prop('selected', true);
  $('select[name=begin_day] option[value=' + day_val + ']').prop('selected', true);
  
    $('select[name=end_year] option[value=' + year_val + ']').prop('selected', true);
  $('select[name=end_month] option[value=' + month_val + ']').prop('selected', true);
  $('select[name=end_day] option[value=' + day_val + ']').prop('selected', true);
  
  
  // 年/月 選択
  $('select[name=begin_year], select[name=begin_month]').change(function() {
    setDay();
  });
  
    // 年/月 選択
  $('select[name=end_year], select[name=end_month]').change(function() {
    setDay2();
  });

  /**
   * 日プルダウンの制御
   */
  function setDay()
  {
    year_val = $('select[name=begin_year]').val();
    month_val = $('select[name=begin_month]').val();

    // 指定月の末日
    var t = 31;
    // 2月
    if (month_val == 2) {
      //　4で割りきれる且つ100で割りきれない年、または400で割り切れる年は閏年
      if (Math.floor(year_val%4) == 0 && Math.floor(year_val%100) != 0 || Math.floor(year_val%400) == 0) {
        t = 29;
      }  else {
        t = 28;
      }
      // 4,6,9,11月
    } else if (month_val == 4 || month_val == 6 || month_val == 9 || month_val == 11) {
      t = 30;
    }

    // 初期化
    $('select[name=begin_day] option').remove();
    for (var i = 1; i <= t; i++){
      $('select[name=begin_day]').append('<option value="' + i + '">' + i + '</option>');
    }
  }
  
  function setDay2()
  {
    year_val = $('select[name=end_year]').val();
    month_val = $('select[name=end_month]').val();

    // 指定月の末日
    var t = 31;
    // 2月
    if (month_val == 2) {
      //　4で割りきれる且つ100で割りきれない年、または400で割り切れる年は閏年
      if (Math.floor(year_val%4) == 0 && Math.floor(year_val%100) != 0 || Math.floor(year_val%400) == 0) {
        t = 29;
      }  else {
        t = 28;
      }
      // 4,6,9,11月
    } else if (month_val == 4 || month_val == 6 || month_val == 9 || month_val == 11) {
      t = 30;
    }

    // 初期化
    $('select[name=end_day] option').remove();
    for (var i = 1; i <= t; i++){
      $('select[name=end_day]').append('<option value="' + i + '">' + i + '</option>');
    }
  }
  
});

</script>
</head>
<body>
<noscript>
	<div>サイトを快適に利用するためには、JavaScriptを有効にしてください。</div>
</noscript>
<div id="outest">

<div id="topNavi">
	<div id="within">
		<a href="./index.php?mode=mypage">
			<img src="../image/logo.png" height="50px" alt="VetWith!" style="float: left;" />
		</a>
		<ul>
			<li class="a"><a href="./index.php?mode=mypage"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">マイページtop</span></a></li>
			<li class="b"><a href="./index.php?mode=intern"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">インターン登録</span></a></li>
			<li class="c"><a href="#thatimage"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">あんなことも</span><a></li>
			<li class="d"><a href="#sitemap"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">ほげほげ</span></a></li>
			<li class="e"><a href="#setting"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">設定</span></a></li>
		</ul>
	</div><!-- within -->
	
</div><!-- topNavi -->
<div id="wrapper">
	<div id="pan"><a href="./index.php?mode=mypage.php">VetWithマイページトップ</a>
<?php
if($page_title != "動物病院マイページ"){
	echo " > ".$page_title;
}
?> 
	</div>
	<div id="main">
	<h1><?php echo $page_title; ?></h1>
	
		<div class="regi_form">