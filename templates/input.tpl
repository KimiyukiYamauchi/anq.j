<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="./css/base.css" rel="stylesheet" type="text/css" />
<title>アンケートフォーム</title>
</head>
<body>
<div class="sub-title">
アンケートフォーム
</div>

{{if $error_list}}
<div>
{{foreach from=$error_list item=message}}
<font color="#FF0000">{{$message}}</font><br />
{{/foreach}}
</div>
{{/if}}

<form action="input.php" method="post">
<table class="editform">
<tr>
<th>名前</th>
<td><input type="text" name="name" value="{{$smarty.session.name}}"></td>
</tr>
<tr>
<th>メールアドレス</th>
<td><input type="text" name="email" value="{{$smarty.session.email}}"/></td>
</tr>
<tr>
<th>性別</th>
<td>
{{html_radios name="sex" options=$sex_value selected=$smarty.session.sex label_ids=true separator="<br />"}}
</td>
</tr>
<tr>
<th>年代</th>
<td>
<select name="age">
<option value="">選択してください</option>
{{html_options selected=$smarty.session.age options=$age_value}}
</select>
</td>
</tr>
<tr>
<th>好きな動物</th>
<td>
{{html_checkboxes name="animal" selected=$smarty.session.animal separator="<br />" options=$animal_value}}
</td>
</tr>
<tr>
<th>コメント</th>
<td><textarea rows="10" cols="40" name="comment">{{$smarty.session.comment}}</textarea></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="confirm" value="登録確認"></td>
</tr>
</table>
</form>
</body>
</html>
