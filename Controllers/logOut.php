<script>
	$(document).ready(function() {
	
	})
</script>
<div id="display">
    <div id="headerbar">
        <div id="bar">
            <div id="login-bar" class="clearfix root-wrapper right">
                <div class="main-root">
                    <div id="login-bar-left" class="wrapper-login-bar right">
                        <div id="block-menu-menu-top-login" class="wrapper clear-block block block-menu">
                            <ul class="menu">
                                <li class=""><a style="cursor: pointer; text-decoration: none"><span>Xin chào, <?php echo $_SESSION['username'] ?></span></a>
                                </li>
                                <!--<li class=""><a style="cursor: pointer;">Sản phẩm yêu thích</a></li>-->
                                <li class=""><a data-toggle="modal" href="#changePasswordModal" title="Change your password" onclick="callClear()">
                                    Đổi mật khẩu</a> </li>
                                <li class=""><a href="../Models/xl_logOut.php" style="cursor: pointer;">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================= ForgotPassword Dialog =============== -->
<div id="changePasswordModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            Đổi mật khẩu</h3>
    </div>
    <div class="modal-body" id="changePasswordBody">
        <table class="noborder" style="margin-top:5px;">
        	<tbody>
            	<tr>
                	<td> Mật khẩu cũ <span class="mustInput"> (*) </span>: </td>
                	<td> <input type="password" id="oldPass" /> </td>
                    <td> <div id="oldPassError" class="mustInput"></div> </td>
                </tr>
            	<tr>
                	<td> Mật khẩu mới <span class="mustInput"> (*) </span>: </td>
                	<td> <input type="password" id="newPass" /> </td>
                    <td> <div id="newPassError" class="mustInput"></div> </td>
                </tr>
            </tbody>
		</table>
    </div>
    <div class="modal-footer">
        <input type="button" id="btnForgot" onclick = "sendChangePass()"  value="Gửi" class="btn btn-success">
    </div>
</div>
<!-- ====================== End=============================== -->
<script>
	function sendChangePass()
    {
		clearError();
    	$.post("../Models/xl_changePassword.php", { oldPass: $("#changePasswordBody input:password#oldPass").val(),
													newPass: $("#changePasswordBody input:password#newPass").val() })
			.done(function(data) {
				var result = $.parseJSON(data);
                if(result == "oldPass")
                {
					$("#changePasswordBody div#oldPassError").text("Bắt buộc nhập");
                }
                else if(result == "newPass1")
                {
					$("#changePasswordBody div#newPassError").text("Bắt buộc nhập");
                }
                else if(result == "newPass2")
                {
					$("#changePasswordBody div#newPassError").text("Không được nhập mật khẩu cũ");
                }
				else if(result == "SessionOut")
                {
                    $("div#message h3").text("Đổi mật khẩu không thành công!");
                    $("div#message h2").text("Vui lòng đăng nhập lại và đổi mật khẩu");
                    $("#changePasswordModal").modal("hide");
                    $("#MessageModal").modal("show");
                }
                else if(result == "Success")
                {
                    $("div#message h3").text("Đổi mật khẩu thành công!");
                    $("#changePasswordModal").modal("hide");
                    $("#MessageModal").modal("show");
                }
                else if(result == "Fail")
                {
					$("#changePasswordBody div#oldPassError").text("Mật khẩu cũ không chính xác!");
                }
			})
			.fail(function() {
			})
			.success(function() {
			});
    }
</script>