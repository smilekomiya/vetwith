<html>
<head>
<title>検索結果 | VetWith!</title>
<link href="./css/common.css" rel="stylesheet" type="text/css" />
<link href="./css/form.css" rel="stylesheet" type="text/css" />
<link href="./css/search.css" rel="stylesheet" type="text/css" />
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
	<div id="searchForm">
		<form>
		<input type="search" value="フリーワード検索" class="text">
		<input type="image" value="検索" src="./simage/search01.png">
		</form>
	</div>
	
	<div id="menu">
	
	<h3 id="loginribon"></h3>
	
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
	<p><a href="./register/email_form.php">→新規登録する</a></p>
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
	検索結果：2件
		<div class="anken">
		<h2 class="hospitalname"><a href="./hospital/hospital.php?name=animal">アニマル動物病院</a></h2>
		<h3 class="copy">外科手術の施術件数は年間100件あります！臨床現場の体験に最適。</h3>
		<div class="prefecture">和歌山</div>
			<table>
				<tbody>
					<tr>
						<td rowspan="4" width="250px"><img src="./image/hospital.jpg" width="250px" /></td>
						<th width="140px">所在地</th>
						<td width="250px">和歌山県岩出市川尻２１８−３</td>
					</tr>
					<tr>
						<th>実習受け入れ期間</th>
						<td>2014年3月1日～2014年3月1日</td>
					</tr>
					<tr>
						<th>実習可能学年</th>
						<td>学部3年～学部5年</td>
					</tr>
					<tr>
						<th>実習応援金</th>
						<td>10,000円</td>
					</tr>
				</tbody>
			</table>
			
			<p class="pr">獣医師、看護師や受付、少人数で楽しく勤務しています。<br />患者は主に地域の小動物です。臨床現場を詳しく知りたい実習生を募集しています。
			</p>
			
			<ul class="linknavi">
				<li><a href="http://～">動物病院詳細</a></li>
				<li><a href="http://～">実習詳細</a></li>
			</ul>
			
		</div><!-- anken -->
		
		<div class="anken">
		<h2 class="hospitalname"><a href="./hospital/hospital.php?name=animal">アニマル動物病院</a></h2>
		<h3 class="copy">外科手術の施術件数は年間100件あります！臨床現場の体験に最適。</h3>
		<div class="prefecture">東京</div>
			<table>
				<tbody>
					<tr>
						<td rowspan="4" width="250px"><img src="./image/noimage.png" width="250px" /></td>
						<th width="140px">所在地</th>
						<td width="250px">和歌山県岩出市川尻２１８−３</td>
					</tr>
					<tr>
						<th>実習受け入れ期間</th>
						<td>2014年3月1日～2014年3月1日</td>
					</tr>
					<tr>
						<th>実習可能学年</th>
						<td>学部3年～学部5年</td>
					</tr>
					<tr>
						<th>実習応援金</th>
						<td>10,000円</td>
					</tr>
				</tbody>
			</table>
			
			<p class="pr">獣医師、看護師や受付、少人数で楽しく勤務しています。<br />患者は主に地域の小動物です。臨床現場を詳しく知りたい実習生を募集しています。
			</p>
			
			<ul class="linknavi">
				<li><a href="http://～">動物病院詳細</a></li>
				<li><a href="http://～">実習詳細</a></li>
			</ul>
			
		</div><!-- anken -->
		
		<p id="pager">
		<strong>1</strong> | <a href='?p=2'>2</a> | <a href='?p=3'>3</a> | <a href='?p=4'>4</a> | <a href='?p=5'>5</a> | <a href='?p=6'>6</a> | <a href='?p=7'>7</a> | <a href='?p=8'>8</a> | <a href='?p=9'>9</a> | <a href='?p=10'>10</a> | <a href='?p=11'>11</a> <a href=?p=2>次の10件&gt;&gt;</a>
		</p>
	

	</div><!-- contents -->

	
</div><!-- wrapper -->

<div id="footer">
(C) Copyright VetWith All Right Reserved.
</div><!-- footer -->

</div><!-- outest -->



</body>
</html>