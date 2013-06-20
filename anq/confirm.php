<?php
//require_once("./function.php");
require_once("../libs/function.php");

init();

if(isset($_POST["modify"])){
	$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/input.php";
	header("Location: " . $url);
	exit;
}

if(isset($_POST["register"])){
	// データベースへの登録
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$sex = $_SESSION['sex'];
	$age = $_SESSION['age'];
	$animal = implode(', ',$_SESSION['animal']);
	$comment = $_SESSION['comment'];
	$del_flag = 0;
	$create_datetime = date("Y-m-d H:i:s");

	$db = db_connect();

	$sth = $db->prepare('insert into anq_t(name, email, sex, age, 
		animal, comment, del_flag, create_datetime) 
		values(?,?,?,?,?,?,?,?)');

	if(MDB2::isError($sth)){
		die("Can't prepare: " .$sth->getMessage());
	}
	
	$ret = $sth->execute(
		array($name, $email, $sex, $age, $animal, 
			$comment, $del_flag, $create_datetime));

	if(MDB2::isError($ret)){
		die("Can't execute: " .$ret->getMessage());
	}

	$_SESSION = array();

	$smarty = new MySmarty();
	$smarty->display('complete.tpl');
	exit;
}

$smaty = new MySmarty();

$smaty->assign("sex_value", getSexList());
$smaty->assign("age_value", getAgeList());
$smaty->assign("animal_value", getAnimalList());

$smaty->display("confirm.tpl");
