<?php /* Smarty version 2.6.27, created on 2013-06-18 10:43:17
         compiled from smarty1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'smarty1.tpl', 3, false),)), $this); ?>
<html>
<body>
<?php echo ((is_array($_tmp=$this->_tpl_vars['sc'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
<?php echo ((is_array($_tmp=$this->_tpl_vars['se']['m'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
<?php echo ((is_array($_tmp=$this->_tpl_vars['se']['f'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</body>
</html>