<?php
//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php"); 

require_once('jpgraph/jpgraph.php');
require_once('jpgraph/jpgraph_bar.php');


//ログインのチェックのためにセッションスタート
session_start();

//ログイン状態をチェックする関数を呼び出す
loginCheck();

//データベースに接続
$db = db_connect();

//JpGraphが格納されているフォルダーを保持
//$jpgraph_dir = $_SERVER["DOCUMENT_ROOT"]. "/../libs/jpgraph-2.2/src/";
//$jpgraph_dir = $_SERVER["DOCUMENT_ROOT"]. "/php/phppro/smarty/libs/jpgraph/";
/*
$jpgraph_dir = "../../libs/jpgraph/";

//JpGraphのライブラリを読み込む（棒Graph
require_once($jpgraph_dir . "jpgraph.php");
require_once($jpgraph_dir . "jpgraph_bar.php");
require_once($jpgraph_dir . "jpgraph_line.php");
require_once($jpgraph_dir . "jpgraph_pie.php");
*/

//ここからグラフ作成処理追加
$sql = "SELECT sex, COUNT(*) as num FROM anq_t WHERE del_flag != '1' GROUP BY sex";

$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
$anq_list = $db->queryAll($sql);  

$datay = array();
$datax = array();

$sex_value = getSexList();

foreach((array)$anq_list as $key => $value){
	$datay[] = $value["num"];
	$datax[] = $value["sex"];
}

$title = "性別ごとのグラフ";

$xtitle = "性別";
$ytitle = "人数";

$width = "300";

$graph = new Graph($width, 200, "auto");
$graph->SetScale("textlin");

$graph->SetShadow();

$graph->img->SetMargin(50, 30, 20, 40);

$bplot = new BarPlot($datay);

$graph->Add($bplot);

$graph->title->SetFont(FF_GOTHIC, FS_NORMAL, 12);
$graph->title->Set($title);

$graph->xaxis->title->SetFont(FF_GOTHIC, FS_NORMAL, 8);
$graph->xaxis->title->Set($xtitle);

$graph->yaxis->title->SetFont(FF_GOTHIC, FS_NORMAL, 8);
$graph->yaxis->title->Set($ytitle);
$graph->yaxis->SetTitleMargin(40);

$graph->xaxis->SetFont(FF_GOTHIC, FS_NORMAL, 8);
$graph->xaxis->SetTickLabels($datax);

$graph->Stroke();

?>
