
﻿<div style="width: 600px; margin: 0 auto; padding: 30px;">
	フォームに入力したメールアドレス宛に、本登録用ページのURLをお送りします。
	<p>
		<form action="index.php" method="post">
			<input type="hidden" name="mode" value="email_register" />
			<table>
				<caption>メールアドレス登録フォーム</caption>
				<tr>
					<td class="item">Email:</td>
					<td><input type="text" name="email" size="40" /></td>
				</tr>
			</table>
			<div>
			<input type="submit" name="submit" value="送信" /></div>
			</div>
		</form>
	</p>
</div>