<?php /* Smarty version Smarty-3.1.8, created on 2012-06-30 19:43:03
         compiled from "view/tpl/workers_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2259917494fee57ea38d3b2-63224329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df9dc90b18d6c730d71295bb51650cea7a8a856a' => 
    array (
      0 => 'view/tpl/workers_table.tpl',
      1 => 1341074582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2259917494fee57ea38d3b2-63224329',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fee57ea573445_75075350',
  'variables' => 
  array (
    'path_to_view' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fee57ea573445_75075350')) {function content_4fee57ea573445_75075350($_smarty_tpl) {?><div class="table_title_msg2" >Обработчики (workers)</div>
<table id="workers_table">
    <tr>
        <td>Запущено Обработчиков:
        <span id="count_workers">0</span></td>
        <td id="add_worker"><img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/img/add.png"> Добавить еще один</td>
        <td id="stop_workers"><img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/img/stop.png"> Остановить все</td>
        <td id="reset_queue" title="Сброс всей очереди, останов всех обработчиков"><img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['path_to_view']->value)===null||$tmp==='' ? '' : $tmp);?>
/img/delete.png"> Полный сброс</td>
    </tr>
</table><?php }} ?>