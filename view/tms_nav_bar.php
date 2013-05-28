

    <link href="../css/css.css" rel="stylesheet" type="text/css"></link>    
	<link href="../css/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />

	<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>
	<script src="../js/jquery-ui-1.9.1.custom.js" type="text/javascript"></script>
	

	<div id="hp_sw_hdr" class="sc_hl1">
		<div class="sw_tb">
			<ul id="sc_hdu" class="sc_hl1">
				<li id="scpt0" class="sc_active">
					<a href="" onclick="">Song</a>
					<div id="scpc0"></div>
				</li>
				<li id="scpt1">
					<a href="#" onclick="">Image</a>
					<div id="scpc1"></div> 
				</li>
				<li id="scpt2">
					<a href="#" onclick="">Video</a>
					<div id="scpc2"></div>
				</li>
				<li id="scpt3" class="">
					<a href="#" onclick="" h="ID=SERP,5014.1">Search</a>
					<div id="scpc3"></div>
				</li>
			</ul>
			
			<span class="sw_mktsw" id="sw_mktsw" mkt="en-us" style="right: 128px; display: block; visibility: visible;">
				<a href="#" h="ID=SERP,5000.1"> English </a>
				<span>|</span>
				<span id="span_login"><a href="#" id="logbtn">Log</a></span>
			</span>
			

		 	 
		</div>
	</div>

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