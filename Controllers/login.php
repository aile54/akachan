<script>
	$(document).ready(function(){
		$("#btnlogin").click( function(){
			$("div#errorMsg").text("");
			var user = $("input#username").val();
			var pass = $("input#password").val();
			var errorNullUser = "Nhập tên đăng nhập";
			var errorNullPass = "Nhập mật khẩu";
			
			if(!$.trim(user))
			{
				$("div#errorMsg").text(errorNullUser);
			}
			else if(!$.trim(pass))
			{
				$("div#errorMsg").text(errorNullPass);
			}
			else
			{
				$.post("../Models/xl_login.php", { username: user, password: pass })
					.done(function(data) {
						var result = $.parseJSON(data);
						if($.trim(result))
						{
							if(result == true)
							{			
								//$("#islogin").load(location.href + " #islogin");
								//$("#DetailCartModal .modal-body").load(location.href + " #jcart");
								location.reload();
							}
							else
							{
								$("div#errorMsg").text(result);
								reloadDone();
							}
						}
						else
						{
							reloadDone();
						}
					  })
					.fail(function() {
						$("div#errorMsg").text("Có lỗi, hiện tại không thể đăng nhập! Vui lòng liên hệ!");
					  });
			}			
		});
	});
</script>
<div class="changedisplay dropdown" style="position: absolute">
    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="" style="color: White;
        font-weight: bold; text-decoration: none; outline: none; background">Đăng nhập &nbsp;&nbsp;&nbsp;<span
            class="caret"></span></a>
</div>
<div id="logindisplay">
    <div id="updateDialog" title="Change Password">
    </div>
    <div id="headerbar">
        <div id="bar">
            <div id="login-bar" class="clearfix root-wrapper right">
                <div class="main-root">
                    <div id="login-bar-left" class="wrapper-login-bar right">
                        <div id="block-menu-menu-top-login" class="wrapper clear-block block block-menu">
                            <ul class="menu">
                                <li class=""><a data-toggle="modal" href="#forgotModal" title="Trying to recover lost password?" onclick="callClear()">
                                    Quên mật khẩu</a> </li>
                                <li class=""><a data-toggle="modal" href="#regisModal" title="Not a member yet? Register with us now." onclick="callClear()">
                                    Đăng ký</a></li>
                                <li class=""><a style="cursor: pointer" id="loginButton"><span>Đăng nhập</span></a>
                                </li>
                                <li class="closedisplay" style="margin-right: -10px"><a
                                    style="cursor: pointer;"><span><i class="icon-chevron-up icon-white"></i></span>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="loginBox" style="display: none;">
                <div id="loginForm">
                    <div id="errorMsg" style="color: White; font-size: 16px; font-style: normal;">
                    </div>
                    <fieldset id="body">
                        <fieldset>
                            <label for="email">
                                Tên đăng nhập:</label>
                            <input type="text" name="username" id="username" size='25' />
                        </fieldset>
                        <fieldset>
                            <label for="password">
                                Mật khẩu:</label>
                            <input type="password" name="password" id="password" size='25' />
                        </fieldset>
                        <input type="button" id="btnlogin" name = "Login" value="Đăng Nhập">
                        <label for="checkbox">
                            <!--<input type="checkbox" id="checkbox" name="ckbRememverme">Remember me -->
                        </label>
                    </fieldset>
                    <span></span>
            	</div>
            </div>
        </div>
    </div>
</div>
<!-- ================================ END Login Display ================================ -->
<!-- ================= ForgotPassword Dialog =============== -->
<div id="forgotModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            Quên mật khẩu</h3>
    </div>
    <div class="modal-body" id="forgotBody">
        <table class="noborder" style="margin-top:5px;">
        	<tbody>
            	<tr>
                	<td> Tên đăng nhập<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="username" /> </td>
                    <td> <div id="usernameError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> CMND<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="cmnd" /> </td>
                    <td> <div id="cmndError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> Mật khẩu mới<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="password" id="pass" /> </td>
                    <td> <div id="passError" class="mustInput"></div> </td>
                </tr>
            </tbody>
		</table>
    </div>
    <div class="modal-footer">
        <input type="button" id="btnForgot" onclick = "sendForgot()"  value="Gửi" class="btn btn-success">
    </div>
</div>
<!-- ====================== End=============================== -->
<!-- ================= Register Dialog =============== -->
<div id="regisModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none; width: 522px;">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            Đăng ký</h3>
    </div>
    <div class="modal-body" id="regisBody" style="overflow: visible">
        <table class="noborder" style="margin-top:5px;">
        	<tbody>
            	<tr>
                	<td> Tên đăng nhập<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="username" /> </td>
                    <td> <div id="usernameError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> Mật khẩu<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="password" id="pass" /> </td>
                    <td> <div id="passError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> Họ và tên<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="name" /> </td>
                    <td> <div id="nameError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> Địa chỉ<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="address" /> </td>
                    <td> <div id="addressError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> ĐT di động<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="phone" /> </td>
                    <td> <div id="phoneError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> CMND<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="cmnd" /> </td>
                    <td> <div id="cmndError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> Email<span class="mustInput"> (*) </span>: </td>
                	<td> <input type="text" id="email" /> </td>
                    <td> <div id="emailError" class="mustInput"></div> </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <input type="button" id="btnRegis" value="Đăng ký" onclick = "sendRegister()" class="btn btn-success">
    </div>
</div>
<script>
	function sendForgot()
	{
		$("#forgotBody input:text#username").select();
		var username = $("#forgotBody input:text#username").val();
		var cmnd = $("#forgotBody input:text#cmnd").val();
		var pass = $("#forgotBody input:password#pass").val();
		clearError();
		
		var errorNull = "Bắt buộc nhập";
		var errorNumber = "Phải là số";
		var errorChar9 = "Ít nhất 9 kí tự";
		
		var IsValid = true;
		// username
		if(!$.trim(username))
		{
			$("#forgotBody div#usernameError").text(errorNull);
			IsValid = false;
		}
		// pass
		if(!$.trim(pass))
		{
			$("#forgotBody div#passError").text(errorNull);
			IsValid = false;
		}
		// cmnd
		if(!$.trim(cmnd))
		{
			$("#forgotBody div#cmndError").text(errorNull);
			IsValid = false;
		}
		else if(!$.isNumeric($.trim(cmnd)))
		{
			$("#forgotBody div#cmndError").text(errorNumber);
			IsValid = false;
		}
		else if($.trim(cmnd).length < 9)
		{
			$("#forgotBody div#cmndError").text(errorChar9);
			IsValid = false;
		}
		
		if(IsValid)
		{
			$.post("../Models/xl_forgotPassword.php", { username: username, pass: pass, cmnd: cmnd })
				.done(function(data) {
					var result = $.parseJSON(data);
					if(result == "NotExisted")
					{
						$("#forgotBody div#usernameError").text("Tên đăng nhập không tồn tại!");
						$("#forgotBody div#cmndError").text("CMND không đúng!");
					}
					else if (result == "Success")
					{
						$("div#message h3").text("Đã cấp lại mật khẩu! Vui lòng kiểm tra mail!");
						$("#forgotModal").modal("hide");
						$("#MessageModal").modal("show");
					}
					else if (result == "Fail")
					{
						$("div#message h3").text("Có lỗi, hiện tại không thể cấp lại mật khẩu! Vui lòng liên hệ!");
						$("#forgotModal").modal("hide");
						$("#MessageModal").modal("show");
					}
				  })
				.fail(function() {
					$("div#message h3").text("Có lỗi, hiện tại không thể cấp lại mật khẩu! Vui lòng liên hệ!");
					$("#forgotModal").modal("hide");
					$("#MessageModal").modal("show");
				  })
				.success(function() {
					//alert( "finished" );
				});
		}
	}
	
	function sendRegister()
	{
		$("#regisBody input:text#username").select();
		var username = $("#regisBody input:text#username").val();
		var pass = $("#regisBody input:password#pass").val();
		var name = $("#regisBody input:text#name").val();
		var address = $("#regisBody input:text#address").val();
		var phone = $("#regisBody input:text#phone").val();
		var email = $("#regisBody input:text#email").val();
		var cmnd = $("#regisBody input:text#cmnd").val();
		
		var IsValid = true;
		
		var errorNull = "Bắt buộc nhập";
		var errorNumber = "Phải là số";
		var errorChar7 = "Ít nhất 7 kí tự";
		var errorChar9 = "Ít nhất 9 kí tự";
		var errorEmail = "Email không hợp lệ";
		
		clearError();
		// username
		if(!$.trim(username))
		{
			$("#regisBody div#usernameError").text(errorNull);
			IsValid = false;
		}
		
		// pass
		if(!$.trim(pass))
		{
			$("#regisBody div#passError").text(errorNull);
			IsValid = false;
		}
		
		// name
		if(!$.trim(name))
		{
			$("#regisBody div#nameError").text(errorNull);
			IsValid = false;
		}
		
		// address
		if(!$.trim(address))
		{
			$("#regisBody div#addressError").text(errorNull);
			IsValid = false;
		}
		
		// phone
		if(!$.trim(phone))
		{
			$("#regisBody div#phoneError").text(errorNull);
			IsValid = false;
		}
		else if(!$.isNumeric($.trim(phone)))
		{
			$("#regisBody div#phoneError").text(errorNumber);
			IsValid = false;
		}
		else if($.trim(phone).length < 7)
		{
			$("#regisBody div#phoneError").text(errorChar7);
			IsValid = false;
		}
		
		// email
		if(!$.trim(email))
		{
			$("#regisBody div#emailError").text(errorNull);
			IsValid = false;
		}
		else
		{
			var atpos = $.trim(email).indexOf("@");
			var dotpos = $.trim(email).lastIndexOf(".");
			if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=$.trim(email).length)
			{
				$("#regisBody div#emailError").text(errorEmail);
				IsValid = false;
			}
		}
		// cmnd
		if(!$.trim(cmnd))
		{
			$("#regisBody div#cmndError").text(errorNull);
			IsValid = false;
		}
		else if(!$.isNumeric($.trim(cmnd)))
		{
			$("#regisBody div#cmndError").text(errorNumber);
			IsValid = false;
		}
		else if($.trim(cmnd).length < 9)
		{
			$("#regisBody div#cmndError").text(errorChar9);
			IsValid = false;
		}
		
		if(IsValid)
		{
			$.post("../Models/xl_register.php", { username: username, pass: pass, name: name,
													address: address, phone: phone, email: email, cmnd: cmnd })
				.done(function(data) {
					var result = $.parseJSON(data);
					if(result == "isExisted")
					{
						$("#regisBody div#usernameError").text("Tên đăng nhập đã tồn tại");
					}
					else if(result)
					{
						$("div#message h3").text("Đăng ký thành công!");
						$("#regisModal").modal("hide");
						$("#MessageModal").modal("show");
					}
					else
					{
						$("#regisBody div#usernameError").text("Đăng ký thất bại!");
					}
				  })
				.fail(function() {
					$("div#message h3").text("Có lỗi, hiện tại không thể đăng ký! Vui lòng liên hệ!");
					$("#regisModal").modal("hide");
					$("#MessageModal").modal("show");
				  })
				.success(function() {
					//alert( "finished" );
				});
		}
	}
</script>