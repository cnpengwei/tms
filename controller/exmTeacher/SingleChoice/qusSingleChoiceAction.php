<?php


// echo "qusSingleChoiceAction.php";//controller :)
header("content-type:text/html;charset=utf-8");

require_once('../../class.common.inc.php');
$clsCom = new clsCommon();


// try {	
// 	$clsCom->inverse(0);
// } catch (Exception $e) {
// 	$clsCom->day_log($e->getMessage());
// }


date_default_timezone_set('PRC');

$oper=$_POST['oper'];

$con = mysql_connect("localhost","root","");
if (!$con) {
	$clsCom->day_log(mysql_error());
	die('Could not connect: ' . mysql_error());
}


mysql_query('set names utf8', $con) or day_log("setup_db_code fail: ".mysql_error());

mysql_select_db("tms", $con) or day_log("use db tms err:".mysql_error());

$sql = "";

if($oper==='add'){	
		$qusNo = $_POST['qusNo'];
		$qusDesc=$_POST['qusDesc'];
		$qusItemA=$_POST['qusItemA'];
		$qusItemB=$_POST['qusItemB'];
		$qusItemC=$_POST['qusItemC'];
		$qusItemD=$_POST['qusItemD'];
		$answer=$_POST['answer'];

		$sql.="INSERT INTO `tb_qus_sin_choice`";
		$sql.=" (`single_choice_qus_no`, `single_choice_qus_desc`,  ";
		$sql.=" `single_choice_itemA`, `single_choice_itemB`, `single_choice_itemC`,`single_choice_itemD`,";
		$sql.=" `single_choice_answer`,`single_choice_owner`) ";	
		$sql.=" VALUES";
		$sql.="('$qusNo','$qusDesc','$qusItemA','$qusItemB','$qusItemC','$qusItemD','$answer', '123' )";

		if (!mysql_query($sql, $con)) {
			$clsCom->day_log('err:'.mysql_error());
			die('Error: ' . mysql_error());
		}else{
			//mysql_insert_id() 函数返回上一步 INSERT 操作产生的 ID
			//如果上一查询没有产生 AUTO_INCREMENT 的 ID，则 mysql_insert_id() 返回 0
			//如果没有指定 connection ，则使用上一个打开的连接
			//生成静态文件
			$id=mysql_insert_id();
		}
		
		mysql_close($con);	
		echo "单项选择题-添加成功....<a href='../../../view/exmTeacher/SingleChoice/qusSingleChoiceListView.php'>查看最新</a>";	
}//if($oper==='add') end

if($oper==='del'){
	$id=intval($_GET['id']);
	$sql.= "DELETE FROM `tb_qus_sin_choice` WHERE ID=$id";
	if(!mysql_query($sql,$con)){
		$clsCom->day_log('err:'.mysql_error());
		die('Error: '.mysql_error());
	}
	mysql_close($con);
	echo "删除成功....<a href='../../../view/exmTeacher/SingleChoice/singleChoiceListView.php'>查看最新</a>";
}//if($oper==='del') end

if($oper==='upd'){

}
