<?php
//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php"); 

//初期化関数を呼び出す
init();

//ログイン状態をチェックする関数を呼び出す
loginCheck();

//データベースに接続する関数を呼び出す
$db = db_connect();

$sql = "SELECT * FROM anq_t ORDER BY create_datetime DESC";

$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

$anq_list = $db->queryAll($sql);
if(MDB2::isError($anq_list)) die("queryAll エラー： ". $anq_list->getMessage());

foreach((array)$anq_list as $key => $value){
	$anq_list[$key]["animal"] = explode(", ", $value["animal"]);
}

//var_dump($anq_list);

$smarty = new MySmarty();
$smarty->assign("anq_list", $anq_list);
$smarty->assign("sex_value", getSexList());
$smarty->assign("age_value", getAgeList());
$smarty->assign("animal_value", getAnimalList());
$smarty->display("admin/anq_result.tpl");

?>
