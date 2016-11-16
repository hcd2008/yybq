<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/module/'.$module.'/yybq.class.php';
$do=new yybq($moduleid);
$action=isset($_GET['action'])?trim($_GET['action']):'index';
if($_username==''){
	message("请登录",DT_PATH."member/login.php");
}
switch ($action) {
	case 'mylist':
		$mylist=$do->get_mylist("state=1 and userid=$_userid");
		foreach ($mylist as $k => $v) {
			$catid=$v[catid];
			$catarr=$db->get_one("select catname from bq_category where catid=$catid");
			$mylist[$k]['catname']=$catarr[catname];
		}
		include template('mylist', $module);
		break;
	case 'self_del':
		if(intval($id)<1){
			message("非法访问");
		}
		$res=$db->query("update {$table} set state=0 where id=$id and userid=$_userid");
		if($res){
			message("删除成功",DT_PATH."yybq/self.php?action=mylist");
		}else{
			message("删除失败");
		}
		break;
	case 'self_edit':
		if($submit){
			if(trim($name)==''){
				message("请填写配料名称");
			}
			if(intval($catid)<1){
				message("请选择配料分类");
			}
			//营养元素数组
			$yyarr=$db->query("select id,en_name from {$table_n} order by id");
			while($r=$db->fetch_array($yyarr)){
				$yylist[$r[id]]=$r['en_name'];
			}
			$str="name='{$name}',catid={$catid},userid={$_userid}";
			if($daima!=''){
				$str.=",code='{$daima}'";
			}
			foreach ($post as $k => $v) {
				if(trim($v)!=''){
					$ziduan=$yylist[$k];
					$str.=",".$ziduan."='".$v."'";
				}
				
			}
			$res=$db->query("update {$table} set $str where id=$id and userid={$_userid}");
			if($res){
				message("编辑成功",DT_PATH."yybq/self.php?action=self_edit&id=2218");
			}else{
				message("非常抱歉发生错误了");
			}
		}else{
			if(intval($id)<1){
				message("非法访问");
			}
			$res=$db->get_one("select * from {$table} where id=$id and userid={$_userid}");
			extract($res);
			$nlists=$do->get_nutrition();
			include template('self_edit', $module);
		}
		
		break;
	default:
		if($submit){
			if(trim($name)==''){
				message("请填写配料名称");
			}
			if(intval($catid)<1){
				message("请选择配料分类");
			}
			//营养元素数组
			$yyarr=$db->query("select id,en_name from {$table_n} order by id");
			while($r=$db->fetch_array($yyarr)){
				$yylist[$r[id]]=$r['en_name'];
			}
			$str="name='{$name}',catid={$catid},userid={$_userid}";
			if($daima!=''){
				$str.=",code='{$daima}'";
			}
			foreach ($post as $k => $v) {
				if(trim($v)!=''){
					$ziduan=$yylist[$k];
					$str.=",".$ziduan."='".$v."'";
				}
				
			}
			$res=$db->query("insert into {$table} set $str");
			if($res){
				message("添加成功",DT_PATH."yybq/self.php");
			}else{
				message("非常抱歉发生错误了");
			}
		}else{
			$nlists=$do->get_nutrition();
			include template('self', $module);
		}
		break;
}


?>