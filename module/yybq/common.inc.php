<?php 
defined('IN_DESTOON') or exit('Access Denied');
define('MD_ROOT', DT_ROOT.'/module/'.$module);
require DT_ROOT.'/include/module.func.php';
require MD_ROOT.'/global.func.php';
$table = $DT_PRE.'public_food';
$table_n = $DT_PRE.'public_nutrition';
// $table_self=$DT_PRE."private_food";
?>