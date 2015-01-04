<html>
<head>
<title>学生登録フォーム | VetWith!</title>
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
	<div id="pan"><a href="./index.php">VetWithホーム</a>　> 会員登録</div>
	<div id="main">
	<h1>会員登録</h1>
	<P>以下の内容を入力してください。</p>
	
		<div class="regi_form">
		<form action="/net/webmailb.php" encType=multipart/form-data method=post>
		<table class="regi">
		<tr>
		<td width="200px" align="right">名前</td><td><input value="" maxLength=200 name=name type=text size=30></td>
		</tr>
		<tr>
		<td width="200px" align="right">性別</td><td>男<input type="radio" name="sex" value="man">
女<input type="radio" name="sex" value="woman"></td>
		</tr>
		<tr>
		<td width="200px" align="right">大学</td>
		<td><select name="univ">
<option value="notSelected">在学中の大学を選択してください。
<option value="1">酪農学園大学</option>
<option value="2">北海道大学</option>
<option value="3">帯広畜産大学</option>
<option value="4">北里大学</option>
<option value="5">岩手大学</option>
<option value="6">東京大学</option>
<option value="7">東京農工大学</option>
<option value="8">日本大学</option>
<option value="9">麻布大学</option>
<option value="10">日本獣医生命科学大学</option>
<option value="11">岐阜大学</option>
<option value="12">大阪府立大学</option>
<option value="13">鳥取大学</option>
<option value="14">山口大学</option>
<option value="15">宮崎大学</option>
<option value="16">鹿児島大学</option>
</select>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">学年</td>
		<td><select name="grade">
<option value="notSelected">現在の学年を選択してください。
<option value="1">1年</option>
<option value="2">2年</option>
<option value="3">3年</option>
<option value="4">4年</option>
<option value="5">5年</option>
<option value="6">6年</option>
<option value="7">博士1年</option>
<option value="8">博士2年</option>
<option value="9">博士3年</option>
<option value="10">博士4年</option>
</select>
		</td>
		</tr>
		<tr>
		<td width="200px" align="right">メールアドレス</td><td><input value="" maxLength=200 name=from type=text size=30></td>
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