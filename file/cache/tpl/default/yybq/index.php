<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header','yybq');?>
<style>
body{
background: #fff;
}
a.learn-more-btn {
    background: rgba(61, 201, 179, 1) none repeat scroll 0 0;
    border-radius: 5px;
    box-shadow: 0 3px 0 0 #309383;
    color: #fff;
    display: inline-block;
    font-weight: bold;
    letter-spacing: 1px;
    text-decoration: none;
    padding: 15px 60px;
    text-transform: uppercase;
    cursor: pointer;
}
a.learn-more-btn:hover{
opacity: 0.8;
}
h3.title{
font-family: '宋体';
font-size: 38px;
font-weight: normal;
text-align: center;
color:#666;
}
.introdiv{
width:1000px;
margin:10px auto;
}
.introp{
padding: 10px 0;
text-align: center;
font-size: 16px;
color:#666;
}
.tedian{
width:100%;

margin-top: 50px;

background: #fff;
}
.tedian_c{
width:1000px;
margin:0 auto;
padding:30px 0;
}
</style>
<div class="tedian intro">
<div class="introdiv">
<img src="<?php echo DT_SKIN;?>image/liucheng.jpg" alt="">
<p class='introp'><a href="<?php echo DT_PATH;?>yybq/label.php" class="learn-more-btn">马上体验</a></p>
</div>
</div>
<div class="tedian">
<div class="tedian_c">
<h3 class="title">
易用、精确、强大
</h3>
<p class="introp">三步操作生成标签；精确计算营养值；官方食品营养、添加剂指标，判断功能含量声称，自定义配料等</p>
<img src="<?php echo DT_SKIN;?>image/shuiguo.jpg" alt="">
</div>
</div>
<div class="tedian">
<div class="tedian_c">
<h3 class="title">
打造您的专属食品标签库
</h3>
<p class="introp">只需一个账号即可拥有专属食品标签库，支持自定义添加食品营养值，保存您的每个产品标签</p>
<img src="<?php echo DT_SKIN;?>image/tedian3.png" alt="">
</div>
</div>
<br>
<br>
<?php include template('footer','yybq');?>