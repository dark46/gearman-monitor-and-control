<?php /* Smarty version Smarty-3.1.8, created on 2012-06-30 20:46:13
         compiled from "view/tpl/functions_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6906321914fee57ea57d5e3-66945106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11550f2ea894604bad5fb66b5816c5d815106322' => 
    array (
      0 => 'view/tpl/functions_table.tpl',
      1 => 1341078372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6906321914fee57ea57d5e3-66945106',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fee57ea585406_37670938',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fee57ea585406_37670938')) {function content_4fee57ea585406_37670938($_smarty_tpl) {?><div class="table_title_msg2" >Функции обработки на сервере очередей</div>
<table id="functions_table">
    <thead>
        <th style="width: 350px;">Функция</th>
        <th style="width: 100px;">В очереди</th>
        <th style="width: 100px;">В работе</th>
        <th style="width: 140px;">Свободных обработчиков</th>
        <th style="width: 70px;">Сброс задачи</th>
    </thead>
    <tbody id="functions_progress">
    <tr id="first_functions_string">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="reset_task"></td>
    </tr>
    </tbody>
</table><?php }} ?>