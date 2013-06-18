<?php /* Smarty version 2.6.27, created on 2013-06-18 15:30:34
         compiled from input.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'input.tpl', 12, false),array('function', 'html_radios', 'input.tpl', 33, false),array('function', 'html_options', 'input.tpl', 41, false),array('function', 'html_checkboxes', 'input.tpl', 48, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="./css/base.css" rel="stylesheet" type="text/css" />
<title>アンケートフォーム</title>
</head>
<body>
<div class="sub-title">
アンケートフォーム
</div>

<?php if (((is_array($_tmp=$this->_tpl_vars['error_list'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
<div>
<?php $_from = ((is_array($_tmp=$this->_tpl_vars['error_list'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
<font color="#FF0000"><?php echo ((is_array($_tmp=$this->_tpl_vars['message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<form action="input.php" method="post">
<table class="editform">
<tr>
<th>名前</th>
<td><input type="text" name="name" value="<?php echo ((is_array($_tmp=$_SESSION['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
</tr>
<tr>
<th>メールアドレス</th>
<td><input type="text" name="email" value="<?php echo ((is_array($_tmp=$_SESSION['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/></td>
</tr>
<tr>
<th>性別</th>
<td>
<?php echo smarty_function_html_radios(array('name' => 'sex','options' => ((is_array($_tmp=$this->_tpl_vars['sex_value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)),'selected' => ((is_array($_tmp=$_SESSION['sex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)),'label_ids' => true,'separator' => "<br />"), $this);?>

</td>
</tr>
<tr>
<th>年代</th>
<td>
<select name="age">
<option value="">選択してください</option>
<?php echo smarty_function_html_options(array('selected' => ((is_array($_tmp=$_SESSION['age'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)),'options' => ((is_array($_tmp=$this->_tpl_vars['age_value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))), $this);?>

</select>
</td>
</tr>
<tr>
<th>好きな動物</th>
<td>
<?php echo smarty_function_html_checkboxes(array('name' => 'animal','selected' => ((is_array($_tmp=$_SESSION['animal'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)),'separator' => "<br />",'options' => ((is_array($_tmp=$this->_tpl_vars['animal_value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))), $this);?>

</td>
</tr>
<tr>
<th>コメント</th>
<td><textarea rows="10" cols="40" name="comment"><?php echo ((is_array($_tmp=$_SESSION['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="confirm" value="登録確認"></td>
</tr>
</table>
</form>
</body>
</html>