<?php
require_once("./function.php");

$db = db_connect();

print "Connect OK!!\n";

$sth = $db->prepare('insert into anq_t(name, email, sex, age, animal, comment, del_flag, create_datetime) values(?,?,?,?,?,?,?,?)');

if(MDB2::isError($sth)){
	die("Can't prepare: " .$sth->getMessage());
}

print "Prepare OK!!\n";

$name = "山内";
$email = "yamauchi@std.it-college.ac.jp";
$sex = 1;
$age = 1;
$animal = "いぬ, かめ";
$comment = "ここは日本語でコメントを...";
$del_flag = 0;
$create_datetime = date("Y-m-d H:i:s");

$ret = $sth->execute(
	array($name, $email, $sex, $age, $animal, $comment, $del_flag, $create_datetime));

if(MDB2::isError($ret)){
	die("Can't execute: " .$ret->getMessage());
}

print "Execute OK!!!\n";
