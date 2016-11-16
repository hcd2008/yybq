<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header','yybq');?>
<style>
.peiliao{
width:1000px;
margin:10px auto;
border:1px solid #ccc;
padding:20px;
border-radius: 3px;
background: #fff;
}
.red{
color:red;
}
</style>
<div id="container">
<div class="neirong pinfo">
<h3 class="title">营养成分表</h3>
<table class="table table-hover">
<tr>
<th>项目</th>
<th>每100g</th>
<th>营养素参考值</th>
</tr>
<?php if(is_array($yybq)) { foreach($yybq as $k => $v) { ?>
<tr>
<td><?php echo $v['name'];?>/<?php echo $v['en_name'];?></td>
<td><?php echo $v['zhi'];?><?php echo $v['unit'];?><?php if($v['en_unit']) { ?>(<?php echo $v['en_unit'];?>)<?php } ?>
</td>
<td>%</td>
</tr>
<?php } } ?>
</table>
</div>
</div>
<?php include template('footer','yybq');?>