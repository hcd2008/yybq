<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>营养成分表</title>
<link rel="stylesheet" href="<?php echo DT_SKIN;?>bootstrap.min.css">
<style>
#content{
width:600px;
margin:10px auto;
}
</style>
</head>
<body>

<div id="content">
<table class="table table-hover">
<tr>
<th width=30%>项目</th>
<th width=40%>每100g</th>
<th width=30%>营养素参考值%</th>
</tr>
<?php if(is_array($nlist)) { foreach($nlist as $k => $v) { ?>
<?php if($info[$k]) { ?>
<tr>
<td><?php echo $v['name'];?>/<?php echo $v['en_name_true'];?></td>
<td><?php echo $info[$k];?><?php echo $v['unit'];?>(<?php echo trim($v['en_unit']); ?>)</td>
<td ><?php if($v['NRV']) { ?><?php $nrv=$info[$k]/$v['NRV']; $nrv=sprintf("%.2f",$nrv); echo $nrv*100; ?>%<?php } else { ?>/<?php } ?>
</td>
</tr>
<?php } ?>
<?php } } ?>
</table>
</div>
</body>
</html>