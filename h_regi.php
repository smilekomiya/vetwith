<html>
<head>
<title>動物病院登録フォーム | VetWith!</title>
<link href="./css/common.css" rel="stylesheet" type="text/css" />
<link href="./css/form.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type='text/javascript' src='http://code.jquery.com/jquery-git2.js'></script>
<script type="text/javascript" src="http://jpostal.googlecode.com/svn/trunk/jquery.jpostal.js"></script>
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

$(window).ready( function() {
	$('#postcode1').jpostal({
		postcode : [
			'#postcode1',
			'#postcode2'
		],
		address : {
			'#address1'  : '%3',
			'#address2'  : '%4',
			'#address3'  : '%5'
		}
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
	<div id="pan"><a href="./index.php">VetWithホーム</a>　> 動物病院登録</div>
	<div id="main">
	<h1>動物病院登録</h1>
	<P>以下の内容を入力してください。</p>
	
		<div class="regi_form">
		<form action="/net/webmailb.php" encType=multipart/form-data method=post>
		<table class="regi">
		<tr>
		<td width="200px" align="right">動物病院名</td><td><input value="" maxLength=200 name="hospitalname" type="text" size="30"></td>
		</tr>
		
		<tr>
		<td width="200px" align="right">病院の所在地</td>
		<td>郵便番号<input id="postcode1" name="postcode1" maxlength="3" size="9">-<input id="postcode2" name="postcode2" maxlength="4" size="12"><br />
		<select id="address1" name="address1">
	<option value="" selected="selected">都道府県</option>
	<option value="北海道">北海道</option>
	<option value="青森県">青森県</option>
	<option value="岩手県">岩手県</option>
	<option value="宮城県">宮城県</option>
	<option value="秋田県">秋田県</option>
	<option value="山形県">山形県</option>
	<option value="福島県">福島県</option>
	<option value="茨城県">茨城県</option>
	<option value="栃木県">栃木県</option>
	<option value="群馬県">群馬県</option>
	<option value="埼玉県">埼玉県</option>
	<option value="千葉県">千葉県</option>
	<option value="東京都">東京都</option>
	<option value="神奈川県">神奈川県</option>
	<option value="新潟県">新潟県</option>
	<option value="富山県">富山県</option>
	<option value="石川県">石川県</option>
	<option value="福井県">福井県</option>
	<option value="山梨県">山梨県</option>
	<option value="長野県">長野県</option>
	<option value="岐阜県">岐阜県</option>
	<option value="静岡県">静岡県</option>
	<option value="愛知県">愛知県</option>
	<option value="三重県">三重県</option>
	<option value="滋賀県">滋賀県</option>
	<option value="京都府">京都府</option>
	<option value="大阪府">大阪府</option>
	<option value="兵庫県">兵庫県</option>
	<option value="奈良県">奈良県</option>
	<option value="和歌山県">和歌山県</option>
	<option value="鳥取県">鳥取県</option>
	<option value="島根県">島根県</option>
	<option value="岡山県">岡山県</option>
	<option value="広島県">広島県</option>
	<option value="山口県">山口県</option>
	<option value="徳島県">徳島県</option>
	<option value="香川県">香川県</option>
	<option value="愛媛県">愛媛県</option>
	<option value="高知県">高知県</option>
	<option value="福岡県">福岡県</option>
	<option value="佐賀県">佐賀県</option>
	<option value="長崎県">長崎県</option>
	<option value="熊本県">熊本県</option>
	<option value="大分県">大分県</option>
	<option value="宮崎県">宮崎県</option>
	<option value="鹿児島県">鹿児島県</option>
	<option value="沖縄県">沖縄県 </option>
</select><br />
<em>市区町村</em>
<input id="address2" name="address2">（例）文京区<br />

<em>町域</em>
<input id="address3" name="address3">※半角数字とハイフン（例）1-1-1<br />

		</td>
		
		
		<tr>
		<td width="200px" align="right">代表者名</td><td><input value="" maxLength=200 name=representativename type=text size="30"></td>
		</tr>
		
		</tr>
		<tr>
		<td width="200px" align="right">代表者のメールアドレス</td><td><input value="" maxLength=200 name=representativemail type=text size=30></td>
		</tr>
		
		<tr>
		<td width="200px" align="right">獣医師の数</td>
		<td><select name="doctornumber">
<option value="notSelected">所属する獣医師の数を選択してください。
<option value="1">1</option>
<option value="2-3">2～3人</option>
<option value="4-6">4～6人</option>
<option value="7-10">7～10人</option>
<option value="11-">11人以上</option>
</select>
		</td>
		</tr>
		
		<tr>
		<td width="200px" align="right">看護師の数</td>
		<td><select name="assistantnumber">
<option value="notSelected">所属する看護師の数を選択してください。
<option value="1">1</option>
<option value="2-3">2～3人</option>
<option value="4-6">4～6人</option>
<option value="7-10">7～10人</option>
<option value="11-">11人以上</option>
</select>
		</td>
		</tr>
		
		<tr>
		<td width="200px" align="right">その他の従業員の数</td>
		<td><select name="doctornumber">
<option value="notSelected">その他の従業員の数を選択してください。
<option value="1">1</option>
<option value="2-3">2～3人</option>
<option value="4-6">4～6人</option>
<option value="7-10">7～10人</option>
<option value="11-">11人以上</option>
</select>
		</td>
		</tr>
		
		<tr>
		<td width="200px" align="right">パスワード</td><td><input value="" maxLength=200 name=password type=text size=30>   ※英数6字以上12字以下で入力してください。</td>
		</tr>
		
		<tr><td> </td><td> </td></tr>
		<tr>
		<td width="200px" align="right"> </td><td>
		<input id="submit_button" type="submit" name="s_regi" value="確認する"></td>
		</tr>
		</table>
		</form>
		</div>
	</div>
	
	


	
</div><!-- wrapper -->

<div id="footer">
(C) Copyright VetWith All Right Reserved.
</div><!-- footer -->

</div><!-- outest -->



</body>
</html>