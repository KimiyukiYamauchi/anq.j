<?php
//libsフォルダにある共通関数を読み込む
require_once("../../libs/function.php");
	
//初期化を行なう
init();

//エラーメッセージや登録メッセージを保持する
$mes = array();

//登録ボタンをクリックされたときの処理
if (isset($_POST["regist"])) {
	//ここにエラーチェックとデータを登録する処理を追記します
	$name = $_POST["name"];
	$login_id = $_POST["login_id"];
	$password = $_POST["password"];

	$db = db_connect();

	if($name == ""){
		$mes[] = "名前を入力してください";
	}elseif(mb_strlen($name)>100){
		$mes[] = "名前は100文字以内で入力してください。";
	}

	if($login_id == ""){
		$mes[] = "ログインIDを入力してください。";
	}elseif(!preg_match("/^[a-zA-Z0-9]+$/", $login_id)){
		$mes[] = "ログインIDには半角英数字で入力してください。";
	}else{
		$sql = "SELECT * FROM member_t WHERE login_id = ? and del_flag = '0'";
		$sth = $db->prepare($sql, array('text'));	
		if(MDB2::isError($sth)) die("prepare エラー： " . $sth->getMessage());

		$data = array($login_id);
		$result = $sth->execute($data);
		if(MDB2::isError($result)) die("execute エラー： ". $result->getMessage());

		if($result->numRows() > 0){
			$mes[] = "入力されたログインIDはすでに使用されているため登録できません。";
		}
	}

	if($password == ""){
		$mes[] = "パスワードを入力してください";
	}elseif(!preg_match("/^[a-zA-Z0-9]+$/", $password)){
		$mes[] = "パスワードは半角英数で入力してください。";
	}

	if(!count($mes)){

		// データベースへの登録
		$mes[] = "データベースの登録処理へ進む";
	}

}

//Smartyを生成する
$smarty = new MySmarty();

//メッセージを送る
$smarty->assign("mes", $mes);

//ページを表示する
$smarty->display("admin/member_input.tpl");
?>
