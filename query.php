<?php
//*****************************************************
//
//問い合わせ部分のhtmlタグたち。
//
//フォームのcssはcontain.phpで管理
//*****************************************************

//問い合わせフォームを参照するには$queryKeyが必要です。
if($queryKey != "ok"){

	header("Location:index.php");
	exit();

}else{

?>
<div id="formWrap">
  <h1>お問い合わせ</h1>
  <p>下記フォームをすべて入力後、確認ボタンを押してください。</p>
  
  <form method="post" action="contain.php?mode=contact">
    <table class="formTable">
      <tr>
        <th>ご用件</th>
        <td>
			<input size="20" type="text" name="お名前" />
		</td>
      </tr>
      <tr>
        <th>お名前</th>
        <td>
			<input size="20" type="text" name="お名前" />
		</td>
      </tr>
      <tr>
        <th>Mail（半角）</th>
        <td><input size="30" type="text" name="Email" /></td>
      </tr>
      <tr>
      <tr>
        <th>お問い合わせ内容<br /></th>
        <td><textarea name="お問い合わせ内容" cols="50" rows="5"></textarea></td>
      </tr>
    </table>
    <p align="center">
      <input type="submit" name="confirm" value="確認" />　<input type="reset" value="リセット" />
    </p>
  </form>
</div>
<?php
}
?>