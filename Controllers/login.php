<div class="changedisplay dropdown" style="position: absolute">
	<a data-toggle="modal" href="#loginModal" title="Đăng nhập" 
    	style="color: White; font-weight: bold; text-decoration: none; outline: none; background">
        Đăng nhập &nbsp;
        <span class="icon-user icon-white"></span>
	</a> 
</div>

<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            Đăng nhập</h3>
    </div>
    <div class="modal-body" id="loginBody">
        <table class="noborder" style="margin-top:5px; width:100%">
        	<tbody>
            	<tr>
                	<td colspan="2"> 
                    	<div id="errorMsg" style="color: red; font-size: 16px; font-style: normal;">
                        </div>
                    </td>
                </tr>
            	<tr>
                	<td align="center" colspan="2"> 
                        <i class="icon-user" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                        <input type="text" name="username" id="username" size='25' placeholder="Tên đăng nhập/Email" /> 
                    </td>
                </tr>
            	<tr>
                	<td align="center" colspan="2"> 
                        <i class="icon-lock" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                    	<input type="password" name="password" id="password" size='25' placeholder="Mật khẩu" />
                    </td>
                </tr>
            	<tr hidden="hidden">
                	<td colspan="2">
                        <label for="checkbox">
                            <!--<input type="checkbox" id="checkbox" name="ckbRememverme">Remember me -->
                        </label>
                    </td>
                </tr>
            	<tr>
                	<td align="left">
                    	<a data-toggle="modal" href="#forgotModal" title="Trying to recover lost password?" onclick="$('#loginModal').modal('hide'); callClear()">
                                    Quên mật khẩu?</a> 
                    </td>
                	<td align="right">
                    	<a data-toggle="modal" href="#regisModal" title="Not a member yet? Register with us now." onclick="callClear()">
                                    Đăng ký ngay</a>
                    </td>
                </tr>
            </tbody>
		</table>        
    </div>
    <div class="modal-footer">
    	<input type="button" id="btnlogin" name = "Login" value="Đăng Nhập" class="btn btn-success">
    </div>
</div>
<!-- ================================ END Login Display ================================ -->
<!-- ================= ForgotPassword Dialog =============== -->
<div id="forgotModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none; ">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            Quên mật khẩu</h3>
    </div>
    <div class="modal-body" id="forgotBody">
        <table class="noborder" style="margin-top:5px; width:100%">
        	<tbody>
				<tr>
					<td colspan="2" style="padding: 0 20px 15px">
						Hãy cung cấp cho chúng tôi địa chỉ Email tài khoản đăng kí của quý khách để lấy lại mật khẩu.
					</td>
				</tr>
            	<tr>
					<td align="center"> 
                    	<i class="icon-envelope" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
						<input type="text" name="email" id="email" size='25' placeholder="Email" />
                    </td>
					<td> 
						<div id="emailError" class="mustInput"></div> 
					</td>
                </tr>
				<tr>
					<td colspan="2" style="padding: 15px 30px 0px; font-size: 12px;">
						** Chúng tôi sẽ gửi mật khẩu mới vào Email này trong thời gian sớm nhất. Vui lòng kiểm tra & tiếp tục mua hàng. Cảm ơn!
					</td>
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
    aria-hidden="true" style="display: none;">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            Đăng ký</h3>
    </div>
    <div class="modal-body" id="regisBody" style="overflow: visible">
        <table class="noborder" style="margin-top:5px; width:100%">
        	<tbody>
            	<tr>
                	<td align="center"> 
                    	<i class="icon-user" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                        <input type="text" name="name" id="name" size='25' placeholder="Họ & Tên" />
                    </td>
                    <td> 
                    	<div id="nameError" class="mustInput"></div> 
                    </td>
                </tr>
            	<tr>
                	<td align="center"> 
                    	<i class="icon-user" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                        <input type="text" name="facebookname" id="facebookname" size='25' placeholder="Tên Facebook" />
                    </td>
                    <td> 
                    	<div id="facebooknameError" class="mustInput"></div> 
                    </td>
                </tr>
            	<tr>
                	<td align="center"> 
                    	<i class="icon-book" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                        <input type="text" name="phone" id="phone" placeholder="Số điện thoại" /> 
                    </td>
                    <td> 
                    	<div id="phoneError" class="mustInput"></div> 
                    </td>
                </tr>
            	<tr>
                	<td align="center">  
                        <i class="icon-user" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                        <input type="text" name="username" id="username" size='25' placeholder="Tên đăng nhập" />
                    </td>
                    <td> 
                    	<div id="usernameError" class="mustInput"></div> 
                    </td>
                </tr>
            	<tr>
                	<td align="center"> 
                        <i class="icon-home" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                    	<input type="text" name="address" id="address" placeholder="Địa chỉ" /> 
                    </td>
                    <td> 
                    	<div id="addressError" class="mustInput"></div> 
                    </td>
                </tr>
            	<tr>
                	<td align="center"> 
                        <i class="icon-envelope" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                    	<input type="text" name="email" id="email" placeholder="Email" /> 
                    </td>
                    <td> 
                    	<div id="emailError" class="mustInput"></div> 
                    </td>
                </tr>
            	<tr>
                	<td align="center"> 
                        <i class="icon-lock" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                    	<input type="password" name="password" id="password" size='25' placeholder="Mật khẩu" />
                    </td>
                    <td> 
                    	<div id="passError" class="mustInput"></div> 
                    </td>
                </tr>
            	<tr>
                	<td align="center"> 
                        <i class="icon-lock" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                    	<input type="password" name="password2" id="password2" size='25' placeholder="Nhập lại mật khẩu" />
                    </td>
                    <td> 
                    	<div id="pass2Error" class="mustInput"></div> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <input type="button" id="btnRegis" value="Đăng ký" onclick = "sendRegister()" class="btn btn-success">
    </div>
</div>
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
				AjaxLogin(user, pass);
			}			
		});
	});
	
	function AjaxLogin(user, pass) {
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
	
	function sendForgot()
	{
		$("#forgotBody input:text#email").select();
		var email = $("#forgotBody input:text#email").val();
		clearError();
		
		var errorNull = "Bắt buộc nhập";
		var errorEmail = "Email không hợp lệ";
				
		var IsValid = true;
		
		// email
		if(!$.trim(email))
		{
			$("#forgotBody div#emailError").text(errorNull);
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
		
		if(IsValid)
		{
			$.ajax({ url: '../Models/xl_forgotPassword.php',
					 data: {email: $("#forgotBody input:text#email").val()},
					 type: 'post',
					 success: function(output) {
								  //alert(output);
								  if(output == "NotExisted")
								{
									$("#forgotBody div#emailError").text("Email không tồn tại!");
								}
								else if (output == "Success")
								{
									$("div#message h3").text("Đã cấp lại mật khẩu! Vui lòng kiểm tra mail!");
									$("#forgotModal").modal("hide");
									$("#MessageModal").modal("show");
								}
								else if (output == "Fail")
								{
									$("div#message h3").text("Có lỗi, hiện tại không thể cấp lại mật khẩu! Vui lòng liên hệ!");
									$("#forgotModal").modal("hide");
									$("#MessageModal").modal("show");
								}
							  }
				});
			/*$.post("../Models/xl_forgotPassword.php", { email })
				.done(function(data) {
					var result = $.parseJSON(data);
					if(result == "NotExisted")
					{
						$("#forgotBody div#emailError").text("Email không tồn tại!");
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
				});*/
		}
	}
	
	function sendRegister()
	{
		$("#regisBody input:text#username").select();
		var name = $("#regisBody input:text#name").val();
		var facebookname = $("#regisBody input:text#facebookname").val();
		var phone = $("#regisBody input:text#phone").val();
		var username = $("#regisBody input:text#username").val();
		var address = $("#regisBody input:text#address").val();
		var email = $("#regisBody input:text#email").val();
		var password = $("#regisBody input:password#password").val();
		var password2 = $("#regisBody input:password#password2").val();
		
		var IsValid = true;
		
		var errorNull = "Bắt buộc nhập";
		var errorNumber = "Phải là số";
		var errorChar7 = "Ít nhất 7 kí tự";
		var errorChar9 = "Ít nhất 9 kí tự";
		var errorEmail = "Email không hợp lệ";
		var errorPassword = "Mật khẩu không giống nhau";
		
		clearError();
		
		// name
		if(!$.trim(name))
		{
			$("#regisBody div#nameError").text(errorNull);
			IsValid = false;
		}
		
		// facebookname
		
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
		
		// username
		if(!$.trim(username))
		{
			$("#regisBody div#usernameError").text(errorNull);
			IsValid = false;
		}
		
		// address
		if(!$.trim(address))
		{
			$("#regisBody div#addressError").text(errorNull);
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
		
		// pass
		if(!$.trim(password))
		{
			$("#regisBody div#passError").text(errorNull);
			IsValid = false;
		}
		
		// pass2
		if(!$.trim(password2))
		{
			$("#regisBody div#pass2Error").text(errorNull);
			IsValid = false;
		}
		else if(password2 !== password)
		{
			$("#regisBody div#pass2Error").text(errorPassword);
			IsValid = false;
		}
		
		if(IsValid)
		{
			/*$.post("../Models/xl_register.php", { name, facebookname, phone, username, address, email, password, password2 })
				.done(function(data) {
					var result = $.parseJSON(data);
					if(result == "isExisted")
					{
						$("#regisBody div#usernameError").text("Tên đăng nhập đã tồn tại");
					}
					else if (result == "isExistedEmail")
					{
						$("#regisBody div#emailError").text("Email đã tồn tại");
					}
					else if(result)
					{
						AjaxLogin(username, password);
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
				});*/
		}
	}
</script>