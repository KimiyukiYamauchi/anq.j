<?php

require_once("../libs/Smarty.class.php");

class MySmarty extends Smarty{

	function MySmarty(){

		$this->template_dir = "../templates";
		$this->compile_dir = "../templates_c";

		$this->left_delimiter="{{";
		$this->right_delimiter="}}";

		$this->default_modifiers = array('escape');

		$this->Smarty();
	}
}
