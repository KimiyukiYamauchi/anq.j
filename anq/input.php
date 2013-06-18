<?php
//libsフォルダにある共通関数を読み込む
//require_once("../../../libs/function.php");
require_once("./function.php");

//初期化関数を呼び出す
init();

// 登録確認ボタンがクリックされたとき
if (isset($_POST["confirm"])) {
	
	// アンケートデータをセッションに格納する
	$_SESSION["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
	$_SESSION["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
	$_SESSION["sex"] = isset($_POST["sex"]) ? $_POST["sex"] : "";
	$_SESSION["age"] = isset($_POST["age"]) ? $_POST["age"] : "";
	$_SESSION["animal"] = isset($_POST["animal"]) ? $_POST["animal"] : "";
	$_SESSION["comment"] = isset($_POST["comment"]) ? $_POST["comment"] : "";

	$error_list = array();

	$error_list = error_check($_SESSION);
	
	// エラーチェックと、エラーメッセージ出力は第5章で行います
	if (!$error_list) {
		// エラーがなければ、確認画面へ遷移する
		$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/confirm.php";
		header("Location: ". $url);
		exit;
	}
}

/* ここからSmartyの処理を追加 */
$smaty = new MySmarty();

$smaty->assign("sex_value", getSexList());
$smaty->assign("age_value", getAgeList());
$smaty->assign("animal_value", getAnimalList());
$smaty->assign("error_list", $error_list);

$smaty->display("input.tpl");


?>
