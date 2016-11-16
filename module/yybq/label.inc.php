<?php 
defined('IN_DESTOON') or exit('Access Denied');
session_start();
// ini_set("display_errors", "On");

// error_reporting(E_ALL | E_STRICT);
require DT_ROOT.'/module/'.$module.'/common.inc.php';
require DT_ROOT.'/module/'.$module.'/yybq.class.php';
$do=new yybq($moduleid);
$action=isset($_REQUEST['action'])?trim($_REQUEST['action']):'index';
$tb_food="bq_public_food";
$tb_nutrition="bq_public_nutrition";
switch ($action) {
	case 'addinfo':
		if($catid<1){
			message("请选择食品分类");
		}
		if(trim($name)==''){
			message("请填写食品名称");
		}
		$_SESSION['yybq_name']=$name;
		$_SESSION['yybq_catid']=$catid;
		$_SESSION['yybq_code']=$code;
		header("Location:".DT_PATH."yybq/label.php?action=chose");
		break;
	case 'chose':
		
		require DT_ROOT."/include/post.func.php";
		$type=isset($_GET['type'])?trim($_GET['type']):0;
		$condition="state=1";
		if($type){
			$condition.=" and userid=$_userid";
		}
		$name=$_SESSION['yybq_name'];
		
		$code=$_SESSION['yybq_code'];
		if(isset($_GET['catid'])){
			$catid=$_GET['catid'];
		}else{
			if($type){

			}else{
				$catid=$_SESSION['yybq_catid'];
			}
			
		}
		$kw=isset($_GET['kw'])?trim($kw):'';
		if($kw!=''){
			$condition.=" and name like '%{$kw}%'";
		}
		// print_r($_SESSION);
		$catnamearr=$db->get_one("select catname from bq_category where catid={$_SESSION[yybq_catid]}");
		$bq_catname=$catnamearr['catname'];
		//食物
		if($catid){
			$condition.=" and catid=$catid";
		}
		//已选择的食品
		if($_SESSION['yybq_foods']){
			$foodsarr=array();
			$food_yixuan=$_SESSION['yybq_foods'];
			$str1='';
			foreach ($food_yixuan as $k => $v) {
				$oneinfo=$db->get_one("select name from {$table} where id={$v[fid]}");
				$v['foodname']=$oneinfo['name'];
				$foodsarr[$k]=$v;
				$str1.=",".$v['fid'];
			}
			$str1=substr($str1, 1);
			$str1="(".$str1.")";
			$condition.=" and id not in $str1";
		}
		// echo $condition;
		$foods=$do->get_list($condition);
		include template('chose',$module);
		break;

	case 'show':
		$itemid=isset($_GET['itemid'])?intval($_GET['itemid']):0;
		if($itemid==0){
			message("非法访问");
		}
		$do->itemid=$itemid;
		$info=$do->get_one();
		$nlist=$do->get_nutrition();
		include template('show',$module);
		break;
	//添加配料
	case 'addfood':
		$arr=array();
		$arr['fid']=$fid;
		$arr['weight']=$weight;
		if($_SESSION['yybq_foods']){
			$foods=$_SESSION['yybq_foods'];
		}else{
			$foods=array();
		}
		$foods[$fid]=$arr;
		$_SESSION['yybq_foods']=$foods;
		header("location:".DT_PATH."yybq/label.php?action=chose&catid=".$catid."&kw=".$kw."&type=".$type);
		break;
	//删除配料
	case 'del_peiliao':
		if(intval($id)<1){
			message('非法访问');
		}
		unset($_SESSION['yybq_foods'][$id]);
		header("Location:".DT_PATH."yybq/label.php?action=chose&catid=$catid&kw={$kw}");
		break;
	//编辑配料
	case 'edit_peiliao':
		$_SESSION['yybq_foods'][$fid]['weight']=$weight;
		header("Location:".DT_PATH."yybq/label.php?action=chose&catid=$catid&kw={$kw}");
		break;
	//选择营养成分
	case 'chose_yy':
		if(!isset($_SESSION['yybq_foods'])){
			message("您未选择任何配料");
		}
		//已选择的食品
		if($_SESSION['yybq_foods']){
			$foodsarr=array();
			$food_yixuan=$_SESSION['yybq_foods'];
			foreach ($food_yixuan as $k => $v) {
				$oneinfo=$db->get_one("select name from {$table} where id={$v[fid]}");
				$v['foodname']=$oneinfo['name'];
				$foodsarr[$k]=$v;
			}
			
		}
		//营养成分
		$nlist=$do->get_nutrition();
		//默认选中的营养元素
		$moren=array(1,2,3,9,12);
		// print_r($nlist);
		include template('chose_yy',$module);
		break;
	//生成标签
	case 'create_bq':
		// print_r($_POST);
		// print_r($_SESSION);
		$narr=array();
		$foods=$_SESSION['yybq_foods'];
		//总质量
		$weight=0;
		foreach ($foods as $k => $v) {
			$weight+=$v['weight'];
		}
		$yybq=array();
		foreach ($post as $k => $v) {
			$res=$do->get_one_nutrition($v);
			$ys=$res['en_name'];
			$name=$res['name'];
			//得到一个食物的一个元素的值
			$lastzhi=0;
			foreach ($foods as $k2 => $v2) {
				$jg=$do->get_one_weight($v2['fid'],$v2['weight'],$ys);
				$lastzhi+=$jg;

			}
			$lzhi=$lastzhi*100/$weight;
			$lzhi=number_format($lzhi,2);

			$yybq[$v]=array('id'=>$v,'en_name'=>$ys,'name'=>$name,'zhi'=>$lzhi,'unit'=>$res['unit'],'en_unit'=>$res['en_unit']);
		}
		// print_r($yybq);
		include template("yybq",$module);
		break;
	default:
		unset($_SESSION['yybq_foods']);
		include template('label', $module);
		break;
}

?>