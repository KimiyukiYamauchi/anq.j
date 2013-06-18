<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
{if $se == "m" || $se == "1"}
男
{else}
女
{/if}
<br />
{if date("a") == "am"}
おはようございます！
{else}
お世話になっております！
{/if}
</body>
</html>
