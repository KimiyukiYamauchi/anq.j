<?php 

require_once("../../libs/function.php");

init();

loginCheck();

$smarty = new MySmarty();
$smarty->display("admin/anq_graph.tpl");
?>
