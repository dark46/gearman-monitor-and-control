<?php /* Smarty version Smarty-3.1.8, created on 2012-06-30 06:40:34
         compiled from "view/tpl/interval_div.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12770621164fee71c7e66e55-77258048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44356f66a25212eda72fce4f4668510222ddadf8' => 
    array (
      0 => 'view/tpl/interval_div.tpl',
      1 => 1341027612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12770621164fee71c7e66e55-77258048',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fee71c7ec7dd6_44595869',
  'variables' => 
  array (
    'refresh_interval' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fee71c7ec7dd6_44595869')) {function content_4fee71c7ec7dd6_44595869($_smarty_tpl) {?><div id="interval" style="width: 0px; height: 0px; visibility: hidden;"
     class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['refresh_interval']->value)===null||$tmp==='' ? "2000" : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['refresh_interval']->value)===null||$tmp==='' ? "2000" : $tmp);?>
</div><?php }} ?>