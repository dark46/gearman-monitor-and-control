<?php /* Smarty version Smarty-3.1.8, created on 2012-06-30 08:41:00
         compiled from "view/tpl/log_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17569647384fee57ea592cf9-00068728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3797ab6001e410d372b4a4277f2b1a8880b1f346' => 
    array (
      0 => 'view/tpl/log_view.tpl',
      1 => 1341034856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17569647384fee57ea592cf9-00068728',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fee57ea5958a0_34275551',
  'variables' => 
  array (
    'path_to_view' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fee57ea5958a0_34275551')) {function content_4fee57ea5958a0_34275551($_smarty_tpl) {?><div class="table_title_msg2">Лог-файл</div>
<div id="log_row_limiter" style="background: url(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/img/bg_log.gif)">
<table id="log_view" style="height: 30 !important; overflow-y: scroll;">
    <tbody id="log_table_tbody">
       <tr id="first_log_row"></tr>
    </tbody>
</table>
</div><?php }} ?>