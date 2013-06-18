<?php /* Smarty version 2.6.27, created on 2013-06-18 15:42:26
         compiled from confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'confirm.tpl', 14, false),array('modifier', 'nl2br', 'confirm.tpl', 42, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="./css/base.css" rel="stylesheet" type="text/css" />
<title>アンケートフォーム確認</title>
</head>
<body>
<div class="sub-title">
アンケートフォーム確認
</div>
<table class="editform">
<tr>
<th>名前</th>
<td><?php echo ((is_array($_tmp=$_SESSION['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>メールアドレス</th>
<td><?php echo ((is_array($_tmp=$_SESSION['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>性別</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['sex_value'][$_SESSION['sex']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>年代</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['age_value'][$_SESSION['age']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
</tr>
<tr>
<th>好きな動物</th>
<td>
<?php $_from = ((is_array($_tmp=$_SESSION['animal'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['animal'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['animal']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['animal']):
        $this->_foreach['animal']['iteration']++;
?>
	<?php if (((is_array($_tmp=($this->_foreach['animal']['iteration'] <= 1))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['animal_value'][$this->_tpl_vars['animal']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php else: ?>
		 ,<?php echo ((is_array($_tmp=$this->_tpl_vars['animal_value'][$this->_tpl_vars['animal']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</td>
</tr>
<tr>
<th>コメント</th>
<td><?php echo ((is_array($_tmp=((is_array($_tmp=$_SESSION['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
<tr>
<td colspan="2">
<form action="confirm.php" method="post">
<input type="submit" name="register" value="登録">　　<input type="submit" name="modify" value="修正">
</form>
</td>
</tr>
</table>
</body>
</html>