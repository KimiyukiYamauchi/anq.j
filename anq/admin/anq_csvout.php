<?php

//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php"); 

//初期化関数を呼び出す
init();

//ログイン状態をチェックする関数を呼び出す
loginCheck();

//性別と年代と動物のリストを変数に格納する
$sex_value    = getSexList();
$age_value    = getAgeList();
$animal_value = getAnimalList();

//データベースに接続
$db = db_connect();

// 検索されたデータのみをCSV出力する
if(isset($_GET["mode"]) && $_GET["mode"] == "search"){
	if(isset($_SESSION["where"]) && $_SESSION["where"] != ""){
		$where = $_SESSION["where"];
	}else{
		$where = "WHERE del_flag != '1'";
	}
	$sql = "SELECT * FROM anq_t {$where} ORDER BY create_datetime DESC";
}else{
	//アンケートのデータをすべて取得（取得順はデータ登録日順
	$sql = "SELECT * FROM anq_t WHERE del_flag != '1' ORDER BY create_datetime DESC";
}

$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
$anq_list = $db->queryAll($sql);  

//ここからCSV処理を追加します
$csv_output = "\"回答日時\",\"名前\",\"性別\",\"年代\",\"好きな動物\",\"コメント\"\n";

foreach((array)$anq_list as $key => $value){

	foreach($value as $key2 => $value2){
		$value[$key2] = str_replace('"', '""', $value2);
	}

	$csv_output .= "\"" . $value["create_datetime"] . "\",";
	$csv_output .= "\"" . $value["name"] . "\",";
	$csv_output .= "\"" . $sex_value[$value["sex"]] . "\",";
	$csv_output .= "\"" . $age_value[$value["age"]] . "\",";

	$csv_output .= "\"";
	
	$tmp_animal = explode(", ", $value["animal"]);
	foreach((array)$tmp_animal as $tmpkey => $anialno){
		$csv_output .= $animal_value[$anialno] . " ";
	}

	$csv_output .= "\",";

	$csv_output .= "\"" . $value["comment"] . "\",";
	$csv_output .= "\n";
}

header("Content-disposition: attachment; filename=anq_data.csv");
header("Content-type: application/octet-stream; name=anq-data.csv");
//print $csv_output;
print mb_convert_encoding($csv_output, "SJIS", "UTF-8");
exit;

?>
