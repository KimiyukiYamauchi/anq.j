<?php
define("ROOT_DIR", $_SERVER["DOCUMENT_ROOT"] .
"/php/phppro/smarty");

require_once(ROOT_DIR ."/libs/Smarty.class.php");

class MySmarty extends Smarty{

	function MySmarty(){

		$this->template_dir = ROOT_DIR . "/templates";
		$this->compile_dir = ROOT_DIR ."/templates_c";

		$this->left_delimiter="{{";
		$this->right_delimiter="}}";

		$this->default_modifiers = array('escape');

		$this->Smarty();
	}
}
