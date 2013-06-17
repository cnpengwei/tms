<!DOCTYPE HTML>
<html>
<head>
	<link href="../css/css.css" rel="stylesheet" type="text/css"></link>    
	<link href="../css/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />

	<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>
	<script src="../js/jquery-ui-1.9.1.custom.js" type="text/javascript"></script>
	<style type="text/css">
		#divShowDetail{
			display: none;
		}	
	</style>
	<script type="text/javascript">
		function confirm_del(){
			if (confirm("删除题目?")){
				return true;
			}else{
				return false;
			}
		}
	</script>
</head>
<body>	
	
<?php
	session_start();
	if(!empty($_SESSION['user_name'])){
		echo "当前登录用户:".$_SESSION['user_name'];
	}
	echo "<h1>单项选择题管理</h1>";

	echo "<a href='insSingleChoiceView.php'>添加单项选择题</a><hr/>";

	header("content-type:text/html;charset=utf-8");

$con=mysql_connect("localhost","root","");
if(!$con){
	die("connect fail");
}

mysql_select_db("tms", $con);
mysql_query('set names utf8', $con);
//----------------------------------------------------------------
$pageSize=3;//show record count every page, can from user input
$rowCount=0;//fetch from DB
// $pageNow=1;//change with <a> link
$pageCount=0;//total pages count

// if(!empty($_GET['pageNow'])){
// 	$pageNow=$_GET['pageNow'];
// }
$pageNow=empty($_GET['pageNow'])? 1 : $_GET['pageNow'];
$sql="select count(ID) from tb_qus_sin_choice";
$res1=mysql_query($sql);
if($row=mysql_fetch_row($res1)){
	$rowCount=$row[0];
}
$pageCount=ceil($rowCount/$pageSize);
//----------------------------------------------------------------

$sql="select * from tb_qus_sin_choice ORDER BY create_time ASC limit ".($pageNow-1)*$pageSize.", $pageSize " ;

$res=mysql_query($sql, $con);

echo "<table border=1 bordercolor='green' cellspacing='0'>";
echo "<tr><td>id</td><td>课程编号</td><td>题目描述</td><td>查看详情</td><td>修改题目</td><td>修改题目</td><td>删除题目</td></tr>";
while($row=mysql_fetch_assoc($res)){
	$str_table=  '<tr>';
	$str_table.= '<td>'.$row['ID'].'</td>';
	$str_table.= '<td>'.$row['SINGLE_CHOICE_COURSE_NO'].'</td>';
	$str_table.= '<td>'.$row['SINGLE_CHOICE_QUS_DESC'].'</td>';
	$str_table.= '<td><a class="intro" href="#">查看详情</a></td>';
	$str_table.= '<td><a href="updSingleChoiceView.php?id='.$row['ID'].'">修改题目_PAGE</a></td>';
	$str_table.= '<td><span class="updateItem" itemID='.$row['ID'].' >修改题目_DIV</span></td>';
	$str_table.= '<td><a href="delSingleChoiceView.php?id='.$row['ID'].'" onclick="return confirm_del()">删除题目</a></td>';
	$str_table.= '</tr>';
	echo $str_table;
}
echo "</table>";
// for($i=1;$i<=$pageCount;$i++){
// 	echo "<a href='singleChoiceListView.php?pageNow=$i'>$i</a> &nbsp;";
// }

echo "首页";
echo "<a href='#'><<</a> &nbsp;&nbsp;";//every 10 page forward
if($pageNow>1){
	$prePage=$pageNow-1;
	echo "<a href='singleChoiceListView.php?pageNow=$prePage'>上一页</a>";
}

echo "<a href='#'>[1]</a>";
echo "<a href='#'>[2]</a>";
echo "<a href='#'>[3]</a>";
echo "<a href='#'>[4]</a>";
echo "<a href='#'>[5]</a>";

if($pageNow<$pageCount){
	$nextPage=$pageNow+1;
	echo "<a href='singleChoiceListView.php?pageNow=$nextPage'>下一页</a>&nbsp;&nbsp;";
}
echo "<a href='#'>>></a>";//every 10 pages backward
echo "末页";
echo "当前页{$pageNow}/共{$pageCount}页&nbsp;&nbsp;&nbsp;";

?>


<form action="singleChoiceListView.php">
跳转到<input type="text" name="pageNow"><input type='Submit' value='Go'/>
</form>


<pre>
	<a class="intro" href="javascript:void(0);" >me one link</a>
</pre>





	<div id="divShowDetail" title="SingleChoiceDetail">
       		<!--<iframe id="funIFrame" src="regis.htm" frameborder="0"></iframe>-->
            email: <input type="text" id="txt_email" name="email" /><br/>
	        name : <input type="text" id="txt_uname" name="username" /><br/>
	        password: <input type="text" id="txt_paswd" name="password" /><br/>
	</div>
	<script language="javascript">
			$(document).ready(function(){
					$(".updateItem").click(function(){
						var itemID=$(this).attr('itemID');
						alert(itemID);
					});
					// $( "#divShowDetail" ).dialog({
			  //           autoOpen: false,
			  //           height: 500,
			  //           width: 550,
			  //           modal: true,
			  //           //position: [1300,900] 
			  //           buttons: {
			  //           	// Login:'test',
			  //           	"Submit": sbumitFunc,
			  //               Cancel:function(){
			  //                   $( this ).dialog( "close" );
			  //               }
			  //           }
			  //       });

					$("a.intro").click(function(){
						alert('m');
						return false;
						// $( "#divShowDetail" ).dialog( "open" );
					});


					// function sbumitFunc() {
			  //       	var v_email = $("#txt_email").val();
			  //       	var	v_uname = $("#txt_uname").val();
			  //       	var v_paswd = $("#txt_paswd").val();
			        	
			  //           $.ajax({
			  //                       type: "POST",
			  //                       url: "../Ajax/reg_act.php?",
			  //                       data:"email="+ v_email +"&paswd=" + v_paswd + "&uname=" + v_uname,
			  //                       dataType:"text",
			  //                       success: function (msg) {
					// 				setCookie(msg);
					// 				parent.document.getElementById("btn_refresh").click();  
			  //                           //TODO Refresh Login Page
			  //                           alert('suc');
			  //                           //$("#btnRemindEmail").attr("disabled","disabled");
			  //                       },
			  //                       error: function (msg) {
			  //                       }
			  //                   });

			  //           $( this ).dialog( "close" );

			  //       }//submitFunc end

			        function setCookie(msg){
						// alert('0. Setting cookie');
						var name = 'cur_usr';//arguments[0];
						var value= 'jianren';//arguments[1];
						var exp = new Date();					
						var Days = 1; 
						exp.setTime(exp.getTime() + Days*24*60*60*1000/2);					
						document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
						// alert('1. cookie done');

					    
					    if(arguments.length==2){
					        var name=arguments[0];
					        var value=arguments[1];
					        var Days = 1; 
					        var exp  = new Date();
					        exp.setTime(exp.getTime() + Days*24*60*60*1000/2);
					        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
					    }else if(arguments.length==3){
					        var name=arguments[0];
					        var value=arguments[1];
					        var Seconds = arguments[2];
					        var exp  = new Date();
					        exp.setTime(exp.getTime() + Seconds*24*60*60*1000/2);
					        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
					    }else{
					        alert("操作错误！");
					    }
					}//setCookie End
			})//document ready end

	</script>

</body>
</html>