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
<h3 class="title">配料信息编辑</h3>
<form action="" class="form-inline" method="post">
<input type="hidden" name="id" value="<?php echo $id;?>">
<table class="table table-hover">
<tr>
<td>配料分类：<span class="red">*</span></td>
<td>
<?php include DT_ROOT.'\include\post.func.php'; echo category_select('catid', '选择分类', $catid, $moduleid); ?>
</td>
</tr>
<tr>
<td>配料名称：<span class="red">*</span></td>
<td><input type="text" class="form-control" name="name" value="<?php echo $name;?>"></td>
</tr>
<tr>
<td>配料代码：<span class="red">*</span></td>
<td><input type="text" class="form-control" name="daima" value="<?php echo $code;?>"></td>
</tr>
<?php if(is_array($nlists)) { foreach($nlists as $k => $v) { ?>
<tr>
<td><?php echo $v['name'];?>/<?php echo $v['en_name_true'];?>：</td>
<td><input type="text" value="<?php if($res[$v['en_name']]) { ?><?php echo $res[$v['en_name']];?><?php } ?>
" class="form-control" name="post[<?php echo $v['id'];?>]">&nbsp;<?php echo $v['unit'];?>(<?php echo $v['en_unit'];?>)</td>
</tr>
<?php } } ?>
<tr>
<td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="编 辑"></td>
</tr>
</table>
</form>
</div>
</div>
<?php include template('footer','yybq');?>