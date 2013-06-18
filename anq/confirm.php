<?php
require_once("./function.php");

init();

if(isset($_POST["modify"])){
	$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/input.php";
	header("Location: " . $url);
	exit;
}

if(isset($_POST["register"])){
	$_SESSION = array();
	exit;
}

$smaty = new MySmarty();

$smaty->assign("sex_value", getSexList());
$smaty->assign("age_value", getAgeList());
$smaty->assign("animal_value", getAnimalList());

$smaty->display("confirm.tpl");
