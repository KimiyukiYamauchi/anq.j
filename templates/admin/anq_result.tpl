<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../css/base.css" rel="stylesheet" type="text/css" />
<title>アンケート一覧画面</title>
</head>

<body>
<div class="sub-title">
アンケート一覧
</div>
<form action="anq_result.php" method="post">
<table class="editform">
<tr>
<th>検索キーワード</th>
<td><input type="text" name="keyword" value="{{$smarty.session.keyword}}"/></td>
</tr>
<tr>
<th>検索性別</th>
<td>
<select name="sex_key">
<option value=""></option>
{{html_options options=$sex_value selected=$smarty.session.sex_key}}
</select>
</td>
</tr>
<tr>
<th>検索年代</th>
<td>
<select name="age_key">
<option value=""></option>
{{html_options options=$age_value selected=$smarty.session.age_key}}
</select>
</td>
</tr>
<tr>
<td colspan="2">
<input name="search" type="submit" value="検索" />
</td>
</tr>
</table>

<table class="adminlist">
	{{foreach item=anq key=key from=$anq_list|smarty:nodefaults name=anq_list}}
	{{if $smarty.foreach.anq_list.first}}
	<tr>
		<th class="width100">名前</th>
		<th class="width60">性別</th>
		<th class="width60">年代</th>
		<th class="width150">好きな動物</th>
		<th class="width200">コメント</th>
		<th class="width100">回答日時</th>
	</tr>
	{{/if}}
	<tr>
		<td><a href="modify.php?id={{$anq.anq_id}}">{{$anq.name}}</a></td>
		<td>{{$sex_value[$anq.sex]}}</td>
		<td>{{$age_value[$anq.age]}}</td>
		<td>
		{{foreach item=animal from=$anq.animal name=animal}}
		{{if $smarty.foreach.animal.first}}
		{{$animal_value[$animal]}}
		{{else}}
		,{{$animal_value[$animal]}}
		{{/if}}
		{{/foreach}}
		</td>
		<td>{{$anq.comment|nl2br}}</td>
		<td>{{$anq.create_datetime|date_format:"%Y-%m-%d<br />%H:%M:%S"}}</td>
	</tr>
	{{foreachelse}}
	<tr>
		<td colspan="6">アンケートデータはありません。</td>
	</tr>
	{{/foreach}}
</table>

<div>
{{$links|smarty:nodefaults}}
</div>

</form>

</body>
</html>
