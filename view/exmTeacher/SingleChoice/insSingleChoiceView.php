<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>单项选择题信息</title>

	<style type="text/css">
	#content{
		position: absolute;
		top:50%;
		left: 50%;
		width: 900px;
		height: 600px;
		margin:-100px 0 0 -450px;
	}
	</style>
</head>
<body>
<form action="../../../controller/exmTeacher/SingleChoice/qusSingleChoiceAction.php" method="POST">
	<h1>单项选择题信息:</h1>
	<?php
		// if(date_default_timezone_get() != "1Asia/Shanghai") {
		// 	date_default_timezone_set("Asia/Shanghai");	
		// }
		// session_start();
		// if(!empty($_SESSION['user_id'])){			
		// 	$user_id=$_SESSION['user_id'];
		// 	$time_stmp = date('Y-m-d-H-i-s');
		// 	$qusNo=$user_id.'-'.$time_stmp;
		// 	echo "<input type='hidden' name='qusNo' value=$qusNo width=0 />";
		// }
		session_start();
		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$qusOwner=$_SESSION['user_id'];
			echo "<input type='hidden' name='qusOwner' value='$qusOwner' width='0' />";
		}else{
			echo "<input type='hidden' name='qusOwner' value=' ' width='0' />";
		}
		
	?>
<table>
	<tr>
		<td align="right">课程:</td>
		<td>
			<select name="course">
				<?php
					require_once("../../../controller/class.common.inc.php"); 
					$clsCom = new SqlHelper();
					$con = mysql_connect("localhost","root","");
					if (!$con) {
						$clsCom->day_log(mysql_error());
						die('Could not connect: ' . mysql_error());
					}
					mysql_select_db("tms", $con) or $clsCom->day_log("use db tms err:".mysql_error());
					mysql_query('set names utf8', $con) or $clsCom->day_log("setup_db_code fail: ".mysql_error());
					
					$sql="SELECT  `COURSE_NO`, `COURSE_DESC` FROM `tb_course`";
					$res=mysql_query($sql,$con);
					$cnt=mysql_num_rows($res);
					for($i=0;$i<$cnt;$i++){
						$col1=mysql_fetch_array($res);
						echo "<option value='$col1[COURSE_NO]'>$col1[COURSE_DESC]";
						echo "</option>";
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">题目描述:</td>
		<td>
			<textarea cols="15" rows="8" name="qusDesc"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">A:</td>
		<td><input type="text" name="qusItemA" /></td>
	</tr>
	<tr>
		<td align="right">B:</td>
		<td><input type="text" name="qusItemB" /></td>
	</tr>
	<tr>
		<td align="right">C:</td>
		<td><input type="text" name="qusItemC" /></td>
	</tr>
	<tr>
		<td align="right">D:</td>
		<td><input type="text" name="qusItemD" /></td>
	</tr>
		<tr>
		<td align="right">Answer:</td>
		<td><input type="text" name="answer" /></td>
	</tr>
</table>
&nbsp;&nbsp; 
		<input type="reset" value="重新填写"/>&nbsp;&nbsp;
<input type="submit" name="btnSubmit" value="提交"/>

<input type='hidden' name='oper' value='add'>

	<div id="log-form" title="login">
       		<!--<iframe id="funIFrame" src="regis.htm" frameborder="0"></iframe>-->
            email: <input type="text" id="txt_email" name="email" /><br/>
	        name : <input type="text" id="txt_uname" name="username" /><br/>
	        password: <input type="text" id="txt_paswd" name="password" /><br/>
	</div>
	<script language="javascript">
			$(document).ready(function(){
					$( "#log-form" ).dialog({
			            autoOpen: false,
			            height: 500,
			            width: 550,
			            modal: true,
			            //position: [1300,900] 
			            buttons: {
			            	// Login:'test',
			            	"Submit": sbumitFunc,
			                Cancel:function(){
			                    $( this ).dialog( "close" );
			                }
			            }
			        });

					$("#logbtn").click(function(){
							 $( "#log-form" ).dialog( "open" );
					});


					function sbumitFunc() {
			        	var v_email = $("#txt_email").val();
			        	var	v_uname = $("#txt_uname").val();
			        	var v_paswd = $("#txt_paswd").val();
			        	
			            $.ajax({
			                        type: "POST",
			                        url: "../Ajax/reg_act.php?",
			                        data:"email="+ v_email +"&paswd=" + v_paswd + "&uname=" + v_uname,
			                        dataType:"text",
			                        success: function (msg) {
									setCookie(msg);
									parent.document.getElementById("btn_refresh").click();  
			                            //TODO Refresh Login Page
			                            alert('suc');
			                            //$("#btnRemindEmail").attr("disabled","disabled");
			                        },
			                        error: function (msg) {
			                        }
			                    });

			            $( this ).dialog( "close" );

			        }//submitFunc end

			        function setCookie(msg){
		        	// alert('0. Setting cookie');
		        	var name = 'cur_usr';//arguments[0];
		        	var value= 'jianren';//arguments[1];
					var exp = new Date();					
					var Days = 1; 
					exp.setTime(exp.getTime() + Days*24*60*60*1000/2);					
					document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
					// alert('1. cookie done');

				    /*
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
				    }*/
				}//setCookie End


			})//document ready end

	</script>

</form>
</body>
</html>
