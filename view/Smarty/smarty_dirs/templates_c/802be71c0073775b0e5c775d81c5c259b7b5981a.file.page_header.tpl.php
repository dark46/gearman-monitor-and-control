<?php /* Smarty version Smarty-3.1.8, created on 2012-06-30 04:28:51
         compiled from "tpl/page_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11895155144fee5653682980-87896305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '802be71c0073775b0e5c775d81c5c259b7b5981a' => 
    array (
      0 => 'tpl/page_header.tpl',
      1 => 1340932805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11895155144fee5653682980-87896305',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'page_path_to_CSS' => 0,
    'js' => 0,
    'client_js' => 0,
    'page_wrapper_class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fee56537d6ba4_33434746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fee56537d6ba4_33434746')) {function content_4fee56537d6ba4_33434746($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Reports API" : $tmp);?>
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link type="text/css" rel="stylesheet" href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_path_to_CSS']->value)===null||$tmp==='' ? "../views/css/style.css" : $tmp);?>
"/>
    <link type="text/css" rel="stylesheet" href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_path_to_CSS']->value)===null||$tmp==='' ? "../views/css/js.css" : $tmp);?>
"/>
    <script type="text/javascript" src="../views/js/jquery.js"></script>
    <?php  $_smarty_tpl->tpl_vars['client_js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['client_js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['client_js']->key => $_smarty_tpl->tpl_vars['client_js']->value){
$_smarty_tpl->tpl_vars['client_js']->_loop = true;
?>
        <script type="text/javascript" src="../views/js/<?php echo $_smarty_tpl->tpl_vars['client_js']->value;?>
"></script>
    <?php } ?>


</head>
<body>
<div class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_wrapper_class']->value)===null||$tmp==='' ? "wrapper" : $tmp);?>
"><?php }} ?>