<?php 
//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php"); 

//初期設定関数
init();

//Smartyを生成
$smarty = new MySmarty(); 

if(isset($_POST["login"])){
	if($_POST["loginid"] == "" ||
		$_POST["password"] == ""){
		$error_message = "ログインIDとパスワードを入力してください。";
	}else{
		if(Authenticator($_POST["loginid"], $_POST["password"])){
			$_SESSION["login_name"] = $_POST["loginid"];
			$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]). "/index.php";
			header("Location: " . $url);
			exit;
		}else{
			$error_message = "ログインに失敗しました。";
		}
	}

	$smarty->assign("loginid", $_POST["loginid"]);	$smarty->assign("error_message", $error_message);
}

//テンプレートファイルを表示する（管理画面のテンプレートは「admin/」に格納されるので注意する
$smarty->display("admin/login.tpl"); 
?>
