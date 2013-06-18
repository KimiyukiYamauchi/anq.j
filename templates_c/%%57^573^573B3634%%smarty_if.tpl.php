<?php /* Smarty version 2.6.27, created on 2013-06-13 10:43:14
         compiled from smarty_if.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php if ($this->_tpl_vars['se'] == 'm' || $this->_tpl_vars['se'] == '1'): ?>
男
<?php else: ?>
女
<?php endif; ?>
<br />
<?php if (date ( 'a' ) == 'am'): ?>
おはようございます！
<?php else: ?>
お世話になっております！
<?php endif; ?>
</body>
</html>