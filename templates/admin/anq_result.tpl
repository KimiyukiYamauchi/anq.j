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
		<td>{{$anq.name}}</td>
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
</form>

</body>
</html>
