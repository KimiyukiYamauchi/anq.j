<?php
//libsフォルダにある共通関数を読み込む
require_once("../../../../libs/function.php"); 

//ログインのチェックのためにセッションスタート
session_start();

//ログイン状態をチェックする関数を呼び出す
loginCheck();

//データベースに接続
$db = db_connect();


//JpGraphが格納されているフォルダーを保持
$jpgraph_dir = $_SERVER["DOCUMENT_ROOT"]. "/../libs/jpgraph-2.2/src/";

//JpGraphのライブラリを読み込む（棒Graph
require_once($jpgraph_dir . "jpgraph.php");
require_once($jpgraph_dir . "jpgraph_bar.php");
require_once($jpgraph_dir . "jpgraph_line.php");
require_once($jpgraph_dir . "jpgraph_pie.php");

//ここから作成



//ここまで（以下は性別でつくったものと同じ処理

//Graphのオブジェクトを生成し、スケールを指定します。
$graph = new Graph($width,200,"auto");
$graph->SetScale("textlin");

//Graphに影をセットします。
$graph->SetShadow();

//Graphのマージをセットします。
$graph->img->SetMargin(50,30,20,40);

//棒Graphのオブジェクトを生成します。（Y軸のデータを挿入する
$bplot = new BarPlot($datay);
//Graphに棒Graphを追加します。
$graph->Add($bplot);

//Graphのフォントとタイトルをセットします
$graph->title->SetFont(FF_MINCHO, FS_NORMAL, 12);
$graph->title->Set($title);

//X軸のタイトルのフォントとタイトルをセットします
$graph->xaxis->title->SetFont(FF_MINCHO,FS_NORMAL, 8);
$graph->xaxis->title->Set($xtitle);

//Y軸のタイトルのフォントとタイトルとタイトルのマージをセットします
$graph->yaxis->title->SetFont(FF_MINCHO,FS_NORMAL, 8);
$graph->yaxis->title->Set($ytitle);
$graph->yaxis->SetTitleMargin(40); 

//X軸のフォントとタイトルをセットします
$graph->xaxis->SetFont(FF_MINCHO,FS_NORMAL, 8);
$graph->xaxis->SetTickLabels($datax);

// Graphを表示します
$graph->Stroke();

?>