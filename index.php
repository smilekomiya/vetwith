<html>
<head>
<title>獣医学生と動物病院を結ぶVetWith!</title>
<link href="./css/common.css" rel="stylesheet" type="text/css" />
<link href="./css/form.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
</script>
</head>
<body>
<noscript>
	<div>サイトを快適に利用するためには、JavaScriptを有効にしてください。</div>
</noscript>
<div id="outest">

<div id="topNavi">
	<div id="topExp">
	獣医学生に全国の動物病院で実習する機会を。
	</div>
	<div id="within">
		<a href="#">
			<img src="./image/logo.png" height="50px" alt="VetWith!" style="float: left;" />
		</a>
		<ul>
			<li class="a"><a href="#top"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">マイページ</span></a></li>
			<li class="b"><a href="#thislink"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">こんなことも</span></a></li>
			<li class="c"><a href="#thatimage"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">あんなことも</span><a></li>
			<li class="d"><a href="#sitemap"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">ほげほげ</span></a></li>
			<li class="e"><a href="#setting"><span style="text-shadow:1px 1px 0 rgba(255,255,255,1);">設定</span></a></li>
		</ul>
	</div><!-- within -->
</div><!-- topNavi -->
<div id="wrapper">
	<div id="searchForm">
		<form>
		<input type="search" value="フリーワード検索" class="text">
		<input type="image" value="検索" src="./simage/search01.png">
		</form>
	</div>
	
	<div id="menu">
	
	<h3 id="loginribon">ログイン</h3>
	
	<div id="loginform">
	<form action="login.php" method="post">
		<label for="userid">ユーザーID</label>：
		<input type="text" name="formUserid" id="userid"/>
		<br />
		<label for="password">パスワード</label>：
		<input type="text" name="formPassword" id="password"/>
		<br />
	<input type="submit" name="login" value="ログイン" />
	</form>
	<p><span style="font-size: 80%;">ログインすることで、実習のエントリーなど動物病院の検索以外の機能を使えるようになります。</p>
	<p><a href="./s_register/index.php">→新規登録する</a></p>
	</div>
	
	<div class="notion">
	12/28現在<br />
	<span style="font-weight: bold;font-size: 220%;color:#ff0000;">439</span>/1821件<br />の動物病院が実習生を募集しています！
	</div><!-- notion -->
	<div class="notion">
	<span style="font-weight: bold;font-size: 80%;color:#ff0000;">
	学生の実習生を受け入れ希望の動物病院はこちらからご連絡ください。
	</div><!-- notion -->
	
	</div><!-- menu -->
	
	<div id="contents">
	
	<div style="box-sizing:border-box;width:100%;padding: 5px 10px;text-align: center;background-image: url(./simage/black_kuro.png);-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8-px;border: 5px #ff9900 solid;">
	<div class="leftTopic">いますぐ実習先の動物病院を探す！</div>
	<p>
	<span class="maru">1</span> <select name="prefecture" class="select-box">
	<option value="notSelected">都道府県を選択</option>
	<optgroup label="北海道・東北">
	<option value="01">北海道</option>
	<option value="02">青森県</option>
	<option value="03">岩手県</option>
	<option value="04">宮城県</option>
	<option value="05">秋田県</option>
	<option value="06">山形県</option>
	<option value="07">福島県</option>
	</optgroup>
	<optgroup label="関東">
	<option value="08">茨城県</option>
	<option value="09">栃木県</option>
	<option value="10">群馬県</option>
	<option value="11">埼玉県</option>
	<option value="12">千葉県</option>
	<option value="13">東京都</option>
	<option value="14">神奈川県</option>
	</optgroup>
	<optgroup label="甲信越・北陸">
	<option value="15">新潟県</option>
	<option value="16">富山県</option>
	<option value="17">石川県</option>
	<option value="18">福井県</option>
	<option value="19">山梨県</option>
	<option value="20">長野県</option>
	</optgroup>
	<optgroup label="東海">
	<option value="21">岐阜県</option>
	<option value="22">静岡県</option>
	<option value="23">愛知県</option>
	<option value="24">三重県</option>
	</optgroup>
	<optgroup label="関西">
	<option value="25">滋賀県</option>
	<option value="26">京都府</option>
	<option value="27">大阪府</option>
	<option value="28">兵庫県</option>
	<option value="29">奈良県</option>
	<option value="30">和歌山県</option>
	</optgroup>
	<optgroup label="中国">
	<option value="31">鳥取県</option>
	<option value="32">島根県</option>
	<option value="33">岡山県</option>
	<option value="34">広島県</option>
	<option value="35">山口県</option>
	</optgroup>
	<optgroup label="四国">
	<option value="36">徳島県</option>
	<option value="37">香川県</option>
	<option value="38">愛媛県</option>
	<option value="39">高知県</option>
	</optgroup>
	<optgroup label="九州・沖縄">
	<option value="40">福岡県</option>
	<option value="41">佐賀県</option>
	<option value="42">長崎県</option>
	<option value="43">熊本県</option>
	<option value="44">大分県</option>
	<option value="45">宮崎県</option>
	<option value="46">鹿児島県</option>
	<option value="47">沖縄県</option>
	</optgroup>
	</select>
	</p>
	<p><span style="color: #ffffff;font-size:150%;font-weight: bold;">↓</span></P>
	<p>
	<span class="maru">2</span> <select name="clerk" class="select-box">
	<option value="notSelected">従業員の数を選択</option>
	<option value="1-2">1人～2人</option>
	<option value="3-5">3人～5人</option>
	<option value="6-10">6人～10人</option>
	<option value="11-20">11人～20人</option>
	<option value="21-">21人～</option>
	</select>
	</p>
	<p><span style="color: #ffffff;font-size:150%;font-weight: bold;">↓</span></P>
	<p>
		<span class="maru">3</span> <select name="clerk" class="select-box">
<option value="notSelected">一日あたりの来院数を選択</option>
<option value="1-2">1人～2人</option>
<option value="3-5">3人～5人</option>
<option value="6-10">6人～10人</option>
<option value="11-20">11人～20人</option>
<option value="21-">21人～</option>
</select>
</p>
<p><input id="submit_button" type="submit" name="submit" value="検索する"></p>
</div>

	</div><!-- contents -->

	
</div><!-- wrapper -->

<div id="footer">
(C) Copyright VetWith All Right Reserved.
</div><!-- footer -->

</div><!-- outest -->



</body>
</html>