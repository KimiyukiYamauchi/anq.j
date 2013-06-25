<?php
//ログアウトの処理を追加する

require_once("../../libs/function.php");

init();

$_SESSION = array();

$url = "http://". $_SERVER["HTTP_HOST"] .
	dirname($_SERVER["SCRIPT_NAME"]) . "/login.php";
header("Location: " . $url);
exit;

?>
