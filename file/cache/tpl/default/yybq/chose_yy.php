<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header','yybq');?>
<div id="container">
<div class="neirong pinfo">
<h4>产品信息</h4>
<ul class="myul">
<li>产品分类: <?php echo $bq_catname;?></li>
<li>产品名称: <?php echo $_SESSION['yybq_name'];?></li>
<?php if($_SESSION['yybq_code']) { ?>
<li>产品代码: <?php echo $_SESSION['yybq_code'];?></li>
<?php } ?>
</ul>
</div>

<div class="neirong pinfo">
<h4>已选择配料</h4>
<p class="plp">
<?php if(is_array($foodsarr)) { foreach($foodsarr as $k => $v) { ?>
<span alt="<?php echo $v['fid'];?>" class='yycf'><?php echo $v['foodname'];?></span>*<?php echo $v['weight'];?>克&nbsp;&nbsp;
<?php } } ?>
</p>
</div>

<div class="neirong peiliao">
<h3 class="title">选择需要的营养成分</h3>
<form action="" method="post" class="form-inline">
<input type="hidden" name="action" value="create_bq">
<ul class="choseul">
<?php if(is_array($nlist)) { foreach($nlist as $k => $v) { ?>
<li><input <?php if(in_array($v['id'],$moren)) echo "checked"; ?> type="checkbox" name="post[]" value="<?php echo $v['id'];?>">&nbsp;<?php if(in_array($v['id'],$moren)) echo "<b>".$v['name']."</b>"; else echo $v['name']   ?></li>
<?php } } ?>
</ul>

<div class="clear"></div>
<p style="text-align:center;padding-top:10px;">
<input type="submit" class="btn btn-default btn-primary" value="生成标签" name="submit">
</p>
</form>
</div>
</div>
<?php include template('footer','yybq');?>