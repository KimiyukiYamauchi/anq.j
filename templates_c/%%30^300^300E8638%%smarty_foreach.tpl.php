<?php /* Smarty version 2.6.27, created on 2013-06-13 12:44:02
         compiled from smarty_foreach.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'smarty_foreach.tpl', 19, false),array('function', 'html_options', 'smarty_foreach.tpl', 28, false),array('function', 'html_radios', 'smarty_foreach.tpl', 32, false),array('function', 'html_checkboxes', 'smarty_foreach.tpl', 35, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<select name="pref">
<?php $_from = $this->_tpl_vars['pref']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['pref_name']):
?>
	<option value="<?php echo $this->_tpl_vars['num']; ?>
"><?php echo $this->_tpl_vars['pref_name']; ?>
</option>
<?php endforeach; else: ?>
	<option value="">選択できません</option>
<?php endif; unset($_from); ?>
</select>
<hr />
■cycle関数の使用例<br />
<table border="1">
<?php $_from = $this->_tpl_vars['pref']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['pref_name']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#CB21DE,#35D0B6"), $this);?>
">
<td><?php echo $this->_tpl_vars['pref_name']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<hr />
■option要素の自動生成作成例<br />
<select	 name="pref">
<option value="">選択してください</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['pref']), $this);?>

</select>
<hr />
■ラジオボタン自動生成作成例<br />
<?php echo smarty_function_html_radios(array('name' => 'pref','options' => $this->_tpl_vars['pref'],'selected' => 13), $this);?>

<hr />
■チェックボックス自動生成作成例<br />
<?php echo smarty_function_html_checkboxes(array('name' => 'pref','options' => $this->_tpl_vars['pref'],'selected' => $this->_tpl_vars['checked'],'separator' => '<br />'), $this);?>

</body>
</html>