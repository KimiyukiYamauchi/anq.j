<?php
//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php"); 

//初期化関数を呼び出す
init();

//ログイン状態をチェックする関数を呼び出す
loginCheck();

//データベースに接続する関数を呼び出す
$db = db_connect();

if(isset($_POST["del_id"]) && is_array($_POST["del_id"])){
	foreach($_POST["del_id"] as $del_id){
		if(!is_numeric($del_id)) continue;
		$del_id_list[] = $db->quote($del_id);
	}

	$where_id = implode(", ", $del_id_list);

	$sql = "UPDATE anq_t SET del_flag = '1' WHERE anq_id IN ({$where_id})";
	$res = $db->query($sql);
	if(MDB2::isError($res)){
		print "エラーが発生しました。<br />操作をやりなおしてください";
		exit;
	}
}

// newが指定された場合は検索キーワードクリア
if(isset($_GET["mode"]) && $_GET["mode"] == "new"){
	$_SESSION["keyword"] = "";
	$_SESSION["sex_key"] = "";
	$_SESSION["age_key"] = "";
	$_SESSION["where"] = "";
}

// 検索文をセットする変数
$where = "";

//$_SESSION["where"] = "";

// 検索ボタンをクリックした時の処理
if(isset($_POST["search"])){
	// 検索条件をセット
	$keyword = $_POST["keyword"];
	$sexkeyword = $_POST["sex_key"];
	$agekeyword = $_POST["age_key"];

	// 検索分を作成するための一時変数
	$searchwhere = "";

	// キーワードが入力されていたら検索文を作成
//var_dump($keyword);
	if($keyword != ""){
		$keyword = $db->quote($keyword);
		$keyword = strtr($keyword, array('_' => '\_', '%' => '\%'));
		$keyword = preg_replace('/^\'/', '\'%', $keyword);
		$keyword = preg_replace('/\'$/', '%\'', $keyword);
		$searchwhere = " (name LIKE {$keyword} OR comment LIKE {$keyword}) AND";
	}

	// 性別が選択されていたら検索分を作成
	if($sexkeyword != ""){
		$searchwhere .= " sex = {$sexkeyword} AND";
	}

	// 年代が選択されていたら検索文作成
	if($agekeyword != ""){
		$searchwhere .= " age = {$agekeyword} AND";
	}

	// 入力した内容をセッションに保存する
	$_SESSION["keyword"] = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
	$_SESSION["sex_key"] = isset($_POST["sex_key"]) ? $_POST["sex_key"] : "";
	$_SESSION["age_key"] = isset($_POST["age_key"]) ? $_POST["age_key"] : "";

	// 検索文がセットされているか確認
	if($searchwhere != ""){
		$_SESSION["where"] = "WHERE" . $searchwhere . " del_flag != '1'";
	}else{
		$_SESSION["where"] = "WHERE del_flag != '1'";
	}
}

// 条件文があればセットする
if(isset($_SESSION["where"]) && $_SESSION["where"] != ""){
	$where = $_SESSION["where"];
}else{
	$where = "WHERE del_flag != '1'";
}

//アンケートデータを取得する
$sql = "SELECT * FROM anq_t {$where} ORDER BY create_datetime DESC";

var_dump($sql);

//$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
//$anq_list = $db->queryAll($sql);  

$data = pager_search($sql, $db);

//var_dump($anq_list);

//好きな動物の「,」区切りのデータを配列データに変換する処理を行う
//foreach ((array)$anq_list as $key => $value ) {
//	$anq_list[$key]["animal"] = explode(", ",$value["animal"]);
//}

foreach ((array)$data["data"] as $key => $value ) {
	$data["data"][$key]["animal"] = explode(", ",$value["animal"]);
}
//var_dump($anq_list);

//Smartyを生成
$smarty = new MySmarty();
//$smarty->assign("anq_list",$anq_list);
$smarty->assign("anq_list",$data["data"]);
$smarty->assign("links",$data["links"]);
$smarty->assign("sex_value",getSexList());
$smarty->assign("age_value",getAgeList());
$smarty->assign("animal_value",getAnimalList());
$smarty->display("admin/anq_result.tpl");
?>
