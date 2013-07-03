<?php
require_once("../../libs/function.php");

init();

loginCheck();

if(error_check($_SESSION)){
	$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/anq_result.php";
	header("Location: " . $url);
	exit;
}

if(isset($_POST["modify"])){
	$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/modify.php";
	header("Location: " . $url);
	exit;
}

if(isset($_POST["register"])){
	$db = db_connect();

	// データベースへの更新
	$anq_id = $db->quote($_SESSION["anq_id"]);
	$name = $db->quote($_SESSION['name']);
	$email = $db->quote($_SESSION['email']);
	$sex = $db->quote($_SESSION['sex']);
	$age = $db->quote($_SESSION['age']);
	$animal = $db->quote(implode(', ',$_SESSION['animal']));
	$comment = $db->quote($_SESSION['comment']);

	// 更新する値を変数に代入したので、
	// 対応するセッションの値をクリアする	
	$_SESSION["anq_id"] = "";
	$_SESSION["name"] = "";
	$_SESSION["email"] = "";
	$_SESSION["sex"] = "";
	$_SESSION["age"] = "";
	$_SESSION["animal"] = "";
	$_SESSION["comment"] = "";

	$sql = "SELECT * FROM anq_t WHERE anq_id = {$anq_id}";
	$anq_data = $db->queryRow($sql);  
	if(!$anq_data){
		print "エラーが発生しました。修正しようとしたアンケートデータは存在しません。<br />";
		exit;
	}else{
		$sql = "UPDATE anq_t set name = {$name}, sex = {$sex}, age = {$age}, animal = {$animal}, comment = {$comment} WHERE anq_id = {$anq_id}";
		$res = $db->query($sql);

		if(MDB2::isError($res)){
			print "エラーが発生しました。再度、アンケート結果一覧より修正してください。<br />";
			exit;
		}
	}

	$smarty = new MySmarty();
	$smarty->display('admin/complete.tpl');
	exit;
}

$smaty = new MySmarty();

$smaty->assign("sex_value", getSexList());
$smaty->assign("age_value", getAgeList());
$smaty->assign("animal_value", getAnimalList());

$smaty->display("admin/confirm.tpl");
