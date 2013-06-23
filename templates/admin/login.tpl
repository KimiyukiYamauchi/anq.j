<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../css/base.css" rel="stylesheet" type="text/css" />
<title>管理者ログイン画面</title>
</head>

<body>
<div class="sub-title">
管理者ログイン
</div>
{{if $error_message != ""}}
<div class="note">
<font color="#FF0000">{{$error_message}}</font>
</div>
{{/if}}
<form action="login.php" method="post">
<table class="editform">
  <tr>
    <th>ログインID</th>
    <td><input name="loginid" type="text" value="{{$loginid}}" id="loginid" maxlength="30"></td>
  </tr>
  <tr>
    <th>パスワード</th>
    <td><input name="password" type="password" value="" id="password" size="30"></td>
  </tr>
</table>
<p>
  <input name="login" type="submit" id="login" value="ログイン">
</p>
</form>
</body>
</html>
