<?php
//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php");

//初期化関数を呼び出す
init();

if(isset($_GET["id"])){
	$db = db_connect();
	$q_anq_id = $db->quote($_GET["id"]);
	$sql = "SELECT * FROM anq_t WHERE anq_id = {$q_anq_id}";

	$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
	//$anq_data = $db->queryAll($sql);  
	$anq_data = $db->queryRow($sql);  

//	var_dump($anq_data);

	if(!$anq_data){
		$url = "http://" . $_SERVER["HTTP_HOST"] .dirname($_SERVER["SCRIPT_NAME"]) . "/anq_result.php";
		header("Location: " . $url);
		exit;
	}

//	var_dump($anq_data["anq_id"]);

	$_SESSION["anq_id"] = $anq_data["anq_id"];
	$_SESSION["name"] = isset($anq_data["name"]) ? $anq_data["name"] : "";
	$_SESSION["email"] = isset($anq_data["email"]) ? $anq_data["email"] : "";
	$_SESSION["sex"] = isset($anq_data["sex"]) ? $anq_data["sex"] : "";
	$_SESSION["age"] = isset($anq_data["age"]) ? $anq_data["age"] : "";
	$_SESSION["animal"] = isset($anq_data["animal"]) ? explode(',', $anq_data["animal"]) : "";
	$_SESSION["comment"] = isset($anq_data["comment"]) ? $anq_data["comment"] : "";

}

var_dump($_SESSION["animal"]);

// idがセットされていないか不正な値がセットされた
//var_dump($_SESSION["anq_id"]);
//var_dump(isset($_SESSION["anq_id"]));
//var_dump(is_numeric($_SESSION["anq_id"]));

if(!(isset($_SESSION["anq_id"]) && is_numeric($_SESSION["anq_id"]))){
	$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/anq_result.php";
	header("Location: " . $url);
	exit;
}

// キャンセルが押された時の処理

if(isset($_POST["cancel"])){
	$_SESSION["anq_id"] = "";
	$_SESSION["name"] = "";
	$_SESSION["email"] = "";
	$_SESSION["sex"] = "";
	$_SESSION["age"] = "";
	$_SESSION["animal"] = "";
	$_SESSION["comment"] = "";
}
	

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

$smaty->display("admin/modify.tpl");


?>
