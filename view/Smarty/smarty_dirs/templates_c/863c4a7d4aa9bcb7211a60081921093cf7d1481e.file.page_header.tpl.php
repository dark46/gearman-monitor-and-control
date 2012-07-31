<?php /* Smarty version Smarty-3.1.8, created on 2012-06-30 16:33:44
         compiled from "view/tpl/page_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21375999794fee5785b628d3-53419990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '863c4a7d4aa9bcb7211a60081921093cf7d1481e' => 
    array (
      0 => 'view/tpl/page_header.tpl',
      1 => 1341063214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21375999794fee5785b628d3-53419990',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fee5785cce531_40421494',
  'variables' => 
  array (
    'page_title' => 0,
    'path_to_view' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fee5785cce531_40421494')) {function content_4fee5785cce531_40421494($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Gearman Monitor" : $tmp);?>
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate"/>
    <link type="text/css" rel="stylesheet" href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/css/gearman_style.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/css/jquery.alerts.css"/>
    <script type="text/javascript" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/js/jquery.alerts.js"></script>
    <script type="text/javascript" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/js/gearman.js"></script>


</head>
<body style="background: url(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/img/bg1.png)">
<div class="wrapper">
    <div class="header">
        <div class = "header_logo">
            <img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/img/glogo1.png" alt="Gearman Monitor">
        </div>
        <div class="header_title">
            <h1>Gearman Monitor</h1>
        </div>
        <div class="clearb"></div>
    </div><?php }} ?>