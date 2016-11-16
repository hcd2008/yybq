<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>营养标签生成-食品伙伴网</title>
<link rel="stylesheet" href="<?php echo DT_SKIN;?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo DT_SKIN;?>yybq.css">
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>


</head>
<body>
<div id="header">
<div id="header_c">
<span class='header_title'><a href="<?php echo DT_PATH;?>yybq">营养标签生成系统</a></span>
<div id="banner">
<ul>
<li><a href="<?php echo DT_PATH;?>yybq">首 页</a></li>
<li><a href="<?php echo DT_PATH;?>yybq/label.php">标签生成</a></li>
<li><a href="<?php echo DT_PATH;?>yybq/self.php">自定义配料</a></li>
<li><a href="#">已完成标签</a></li>
</ul>
</div>

<div class="header_r">
<?php if($_username) { ?>
<?php echo $_username;?>&nbsp;&nbsp; <a href="<?php echo DT_PATH;?>member/logout.php">退出</a>
<?php } else { ?>
<a href="<?php echo DT_PATH;?>member/login.php">登录</a>&nbsp;&nbsp;<a href="<?php echo DT_PATH;?>member/register.php">注册</a>
<?php } ?>
</div>
</div>
</div>