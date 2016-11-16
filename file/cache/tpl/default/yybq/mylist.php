<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header','yybq');?>
<style>
#peiliao{
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
<p><a href="<?php echo DT_PATH;?>yybq/self.php" class="btn btn-default ">手动添加配料</a>&nbsp;<a href="<?php echo DT_PATH;?>yybq/self.php?action=mylist" class="btn btn-default btn-info">我的自定义配料</a></p>
<div id="peiliao">
<table class="table table-hover">
<tr>
<th>分类</th>
<th>配料名称</th>
<th>配料代码</th>
<th>能量(kj)</th>
<th>蛋白质(g)</th>
<th>脂肪(g)</th>
<th>碳水化合物(g)</th>
<th>钠(mg)</th>
<th>操作</th>
</tr>
<?php if(is_array($mylist)) { foreach($mylist as $k => $v) { ?>
<tr>
<td><?php echo $v['catname'];?></td>
<td><?php echo $v['name'];?></td>
<td><?php echo $v['code'];?></td>
<td><?php echo $v['Energy'];?></td>
<td><?php echo $v['Protein'];?></td>
<td><?php echo $v['Fat'];?></td>
<td><?php echo $v['Carbohydrate'];?></td>
<td><?php echo $v['Sodium'];?></td>
<td><a href="?action=self_edit&id=<?php echo $v['id'];?>"><img src="<?php echo DT_SKIN;?>images/edit.png" alt="编辑" title="编辑"></a>&nbsp;&nbsp;<a href="?action=self_del&id=<?php echo $v['id'];?>"><img src="<?php echo DT_SKIN;?>images/delete.png" alt="删除" onclick="return confirm('确定删除吗')" title="删除"></a></td>
</tr>
<?php } } ?>
</table>
<div class="pages">
<?php echo $pages;?>
</div>
</div>
</div>
<?php include template('footer','yybq');?>