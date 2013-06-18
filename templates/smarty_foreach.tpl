<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<select name="pref">
{foreach from=$pref item=pref_name key=num}
	<option value="{$num}">{$pref_name}</option>
{foreachelse}
	<option value="">選択できません</option>
{/foreach}
</select>
<hr />
■cycle関数の使用例<br />
<table border="1">
{foreach from=$pref item=pref_name key=num}
<tr bgcolor="{cycle values="#CB21DE,#35D0B6"}">
<td>{$pref_name}</td>
</tr>
{/foreach}
</table>
<hr />
■option要素の自動生成作成例<br />
<select	 name="pref">
<option value="">選択してください</option>
{html_options options=$pref}
</select>
<hr />
■ラジオボタン自動生成作成例<br />
{html_radios name="pref" options=$pref selected=13}
<hr />
■チェックボックス自動生成作成例<br />
{html_checkboxes name="pref" options=$pref selected=$checked separator='<br />'}
</body>
</html>
