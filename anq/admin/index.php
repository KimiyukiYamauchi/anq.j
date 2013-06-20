<?php 

//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php"); 

//初期化関数を呼び出す
init();

//ここに追加

// Smartyを生成する
$smarty = new MySmarty(); 

//テンプレートファイルを表示する（管理画面のテンプレートは「admin/」に格納されるので注意する
$smarty->display("admin/index.tpl"); 
?>
