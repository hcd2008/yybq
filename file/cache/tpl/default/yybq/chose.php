<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header','yybq');?>
<script src="<?php echo DT_PATH;?>file/script/layer/layer.js"></script>
<script>
$(function(){
$(".yycf").on('click', function(){
var id=$(this).attr('alt');
var zhi=$(this).text();
    layer.open({
        type: 2,
        title: zhi+' 营养成分表',
        maxmin: true,
        shadeClose: true, //点击遮罩关闭层
        area : ['700px' , '600px'],
        content: "<?php echo DT_PATH;?>yybq/label.php?action=show&itemid="+id
    });
});
})

</script>
<script>
$(function(){
$(".chosefood").click(function(){
var zhi=$(this).val();
layer.open({
        type: 1,
        title:'请填写您要添加的重量',
        area: ['300px', '120px'],
        shadeClose: true, //点击遮罩关闭
        content: '<div id="chosew"><form action="" method="post" ><input type="hidden" name="catid" value="<?php echo $catid;?>" /><input type="hidden" name="kw" value="<?php echo $kw;?>" /><input type="hidden" name="action" value="addfood" /><input type="hidden" name="fid" value='+zhi+' />&nbsp;&nbsp;<input type="text" name="weight" size="5">&nbsp;克(g)<input type="submit" id="add" name="tijiao" value="添加">&nbsp;&nbsp;</form></div>'
    });
})
$(".edit_peiliao").click(function(){
var zhi=$(this).attr('alt');
var zhi1=$(this).attr('alt1');
layer.open({
        type: 1,
        title:'修改添加量',
        area: ['300px', '120px'],
        shadeClose: true, //点击遮罩关闭
        content: '<div id="chosew"><form action="" method="post" ><input type="hidden" name="catid" value="<?php echo $catid;?>" /><input type="hidden" name="kw" value="<?php echo $kw;?>" /><input type="hidden" name="action" value="edit_peiliao" /><input type="hidden" name="fid" value='+zhi+' />&nbsp;&nbsp;<input type="text" name="weight" value='+zhi1+' size="5">&nbsp;克(g)<input type="submit" id="add" name="tijiao" value="修改">&nbsp;&nbsp;</form></div>'
    });
})
})
</script>
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
<?php if($_SESSION['yybq_foods']) { ?>
<div class="neirong peiliao">
<h4>已选择配料</h4>
<p class="plp">
<?php if(is_array($foodsarr)) { foreach($foodsarr as $k => $v) { ?>
<span alt="<?php echo $v['fid'];?>" class='yycf'><?php echo $v['foodname'];?></span>*<?php echo $v['weight'];?>克&nbsp;<span alt1="<?php echo $v['weight'];?>" alt="<?php echo $v['fid'];?>" class="edit_peiliao"><img src="<?php echo DT_SKIN;?>images/edit.png" alt=""></span>&nbsp;<a href="?action=del_peiliao&id=<?php echo $v['fid'];?>&catid=<?php echo $catid;?>&kw=<?php echo $kw;?>" onclick="return confirm('确定删除吗？')"><img src="<?php echo DT_SKIN;?>images/delete.png" alt=""></a>&nbsp;&nbsp;&nbsp;
<?php } } ?>
</p>
</div>
<?php } ?>
<div class="neirong peiliao">
<h3 class="title">选择配料、添加剂</h3>
<form action="" method="get" class="form-inline">
<input type="hidden" name="action" value="chose">
<input type="hidden" name="type" value="<?php echo $type;?>">
<p><span class="sspan">数据来源：</span><a href="<?php echo DT_PATH;?>yybq/label.php?action=chose" class="btn btn-default <?php if(!$type) { ?>btn-info<?php } ?>
 btn-sm">公共配料</a>&nbsp;&nbsp;<a href="<?php echo DT_PATH;?>yybq/label.php?action=chose&type=self" class="btn btn-default <?php if($type&&$type=='self') echo "btn-info"; ?> btn-sm">自定义配料</a>&nbsp;<a href="" class="btn btn-default btn-sm">添加剂</a></p>
<p><span class="sspan">食品分类：</span><?php echo category_select('catid', '选择分类', $catid, $moduleid); ?></p>
<p><span class="sspan">关键词搜索：</span><input type="text" name="kw" value="<?php echo $kw;?>" class="form-control"> <input type="submit" class="btn btn-primary" value="搜索"></p>
<p><span class="sspan">营养成分表：</span><span style="color:#999">请点击食物名称查看该食物的营养成分表</span></p>
<ul class="choseul">
<?php if(is_array($foods)) { foreach($foods as $v) { ?>
<li><input class="chosefood" type="checkbox" name="food[]" value="<?php echo $v['id'];?>">&nbsp;<span alt="<?php echo $v['id'];?>" class='yycf'><?php echo $v['name'];?></span></li>
<?php } } ?>
</ul>
</form>
<div class="clear"></div>
<div class="pages">
<?php echo $pages; ?>
</div>
<p style="text-align:center;padding-top:10px;"><a href="?action=chose_yy" class="btn btn-primary">下一步</a></p>
</div>
</div>
<?php include template('footer','yybq');?>