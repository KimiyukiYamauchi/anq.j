<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="./css/base.css" rel="stylesheet" type="text/css" />
<title>アンケートフォーム確認</title>
</head>
<body>
<div class="sub-title">
アンケートフォーム確認
</div>
<table class="editform">
<tr>
<th>名前</th>
<td>{{$smarty.session.name}}</td>
</tr>
<tr>
<th>メールアドレス</th>
<td>{{$smarty.session.email}}</td>
</tr>
<tr>
<th>性別</th>
<td>{{$sex_value[$smarty.session.sex]}}</td>
</tr>
<tr>
<th>年代</th>
<td>{{$age_value[$smarty.session.age]}}</td>
</tr>
<tr>
<th>好きな動物</th>
<td>
{{foreach from=$smarty.session.animal item=animal name=animal}}
	{{if $smarty.foreach.animal.first}}
		{{$animal_value[$animal]}}
	{{else}}
		 ,{{$animal_value[$animal]}}
	{{/if}}
{{/foreach}}
</td>
</tr>
<tr>
<th>コメント</th>
<td>{{$smarty.session.comment|nl2br}}</td>
</tr>
<tr>
<td colspan="2">
<form action="confirm.php" method="post">
<input type="submit" name="register" value="登録">　　<input type="submit" name="modify" value="修正">
</form>
</td>
</tr>
</table>
</body>
</html>
