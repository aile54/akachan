<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// This file demonstrates a basic store setup

// If your page calls session_start() be sure to include jcart.php first
if (!isset($_SESSION)) {
  session_start();
}
?>
<div class="cart">
    <a data-toggle="modal" href="#DetailCartModal">
        <img class="cartimg shopping-cart cartEmpty" src="../Templates/Content/images/Cart/shinkansen.png"/>
        <img class="cartimg shopping-cart cartFill" style = "display: none" src="../Templates/Content/images/Cart/shinkansen1.png"/>
    </a>
    <img class="productimg" src="../Templates/Content/images/Cart/box.jpg"/>
    <p class="productx" style="z-index: 1">x</p>
    <p class="productnumber" style="padding-left: 10px;">
        <strong></strong>
    </p>
</div>
<div class="linkFB">
	<script>
	function hover(element) {
    	element.setAttribute('class', 'imgActive');
	}
	function unhover(element) {
		element.removeAttribute('class', 'imgActive');
	}
    </script>
    <a href="https://www.facebook.com/AkachanShop.hangnhatchobe" target="_blank"><img src="../Templates/Content/images/icon/facebook.png" name="Image65" border="0" id="Image65" onmouseover="hover(this);" onmouseout="unhover(this);" /></a>
</div>

<!-- ================ Modal for Detail ================ -->
<div id="DetailCartModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none; width: 800px; left: 40%">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            Đơn hàng
        </h3>
    </div>
    <div class="modal-body">    
		<div id="jcart">
			<?php $jcart->display_cart();?>
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="<< Gian hàng" data-dismiss="modal" aria-hidden="true" class="btn btn-success" style="float:left;">
        <input type="button" value="Gửi đơn hàng >>" onClick="goSendCart()" class="btn btn-success">
    </div>
</div>
<!-- ================ ================== ================ -->
<!-- ================ Modal for Customer ================ -->
<div id="CustomerDetailCartModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none; width: 550px">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
            GỬI ĐƠN HÀNG
        </h3>
    </div>
    <div class="modal-body" id="ordercartBody">
    	<table class="noborder" style="margin-top:5px;">
        	<tbody>
				<tr>
                	<td> <b>Thông tin khách hàng</b> </td>
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
				<?php if(isset($_SESSION['userid']) && !empty($_SESSION['userid']))
				{
				}
				else
				{
				?>
				<tr>
                	<td> 
						Bạn đã đăng kí tài khoản? Vui lòng 
						<b>
							<a data-toggle="modal" href="#loginModal" title="Đăng nhập" style="text-decoration: none;" onclick="$('#CustomerDetailCartModal').modal('hide')">
								ĐĂNG NHẬP
							</a>
						</b>
					</td>
				</tr>
				<?php
				}
				?>
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
                    	<i class="icon-book" style="position: absolute; z-index: 1; margin: 11px 0px 0px 8px;"></i>
                        <input type="text" name="phone" id="phone" placeholder="Số điện thoại" /> 
                    </td>
                    <td> 
                    	<div id="phoneError" class="mustInput"></div> 
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
                	<td> <b>Cách thức giao hàng</b> </td>
				</tr>
				<tr>
                	<td> <label for=""><input type="radio" id="shipType" name="shipType" value="1" style="margin: 0px" checked/> Giao hàng tận nhà </label> </td>
				</tr>
				<tr>
                	<td> <b>Phương thức thanh toán</b> </td>
				</tr>
				<tr>
                	<td> <label for=""><input type="radio" id="paidType" name="paidType" value="1" style="margin: 0px" checked/> Thanh toán trực tiếp (tiền mặt) </label> </td>
				</tr>
				<tr>
                	<td> <label for=""><input type="radio" id="paidType" name="paidType" value="2" style="margin: 0px"/> Tài khoản ngân hàng </label>	</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td> <b>Nhập mã ưu đãi:<b> <input type="text" name="coupon" id="coupon" placeholder="Điền mã ưu đãi" maxlength="20"/> </td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
                	<td> <b>Thông tin bổ sung</b> </td>
				</tr>
				<tr>
                	<td> Nếu bạn muốn thêm ghi chú về đơn hàng của bạn, xin vui lòng nhập vào đây </td>
				</tr>
				<tr>
                	<td> <textarea class="form-control" cols="5" id="loinhan" style="width:100%"></textarea> </td>
				</tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <input type="button" value="<< Quay lại" onClick="backCart()" class="btn btn-success" style="float: left">
        <input type="button" value="Xác nhận" onClick="sendCart()" class="btn btn-success">
    </div>
</div>
<!-- ================ ================= ================ -->
<!-- ================ Modal for Message ================ -->
<div id="MessageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none; width: 550px">
    <div class="modal-header cusheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick = "reloadDone()">
            ×</button>
        <h3 id="myModalLabel" style="font-size: 23px; margin-top: 5px;">
        	 Thông báo
        </h3>
    </div>
    <div class="modal-body">    
		<div id="message">
        	<h3></h3>
            <h2></h2>
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="Đóng" onclick = "reloadDone()" class="btn btn-success">
    </div>
</div>
<!-- ================ ================= ================ -->
<script>
	function goSendCart()
	{
		if($("div#jcart").has("td#jcart-empty").length == 0)
		{
			$("#DetailCartModal").modal("hide");
			clearError();
			clearInput();
			clearInput_nn();
			clearError_nn();
			loadInfoUser();
			$("#CustomerDetailCartModal").modal("show");
		}
	}
	function backCart()
	{
		$("#CustomerDetailCartModal").modal("hide");
		$("#DetailCartModal").modal("show");
	}
	function sendCart()
	{
		$("#ordercartBody input:text#name").select();
		var name = $("#ordercartBody input:text#name").val();
		var address = $("#ordercartBody input:text#address").val();
		var phone = $("#ordercartBody input:text#phone").val();
		var email = $("#ordercartBody input:text#email").val();
		var loinhan = $("#ordercartBody textarea#loinhan").val();
		var shiptype = $("#ordercartBody #shipType:checked").val();
		var paidtype = $("#ordercartBody #paidType:checked").val();
		var coupon = $("#ordercartBody input:text#coupon").val();
		
		var name_nn = name;
		var address_nn = address;
		var phone_nn = phone;
		var email_nn = email;
		
		var IsValid = true;
		
		var errorNull = "Bắt buộc nhập";
		var errorNumber = "Phải là số";
		var errorChar7 = "Ít nhất 7 kí tự";
		var errorEmail = "Email không hợp lệ";
			
		clearError();
		// name
		if(!$.trim(name))
		{
			$("#ordercartBody div#nameError").text(errorNull);
			IsValid = false;
		}
		
		// address
		if(!$.trim(address))
		{
			$("#ordercartBody div#addressError").text(errorNull);
			IsValid = false;
		}
		
		// phone
		if(!$.trim(phone))
		{
			$("#ordercartBody div#phoneError").text(errorNull);
			IsValid = false;
		}
		else if(!$.isNumeric($.trim(phone)))
		{
			$("#ordercartBody div#phoneError").text(errorNumber);
			IsValid = false;
		}
		else if($.trim(phone).length < 7)
		{
			$("#ordercartBody div#phoneError").text(errorChar7);
			IsValid = false;
		}
		
		// email
		if(!$.trim(email))
		{
			$("#ordercartBody div#emailError").text(errorNull);
			IsValid = false;
		}
		else
		{
			var atpos = $.trim(email).indexOf("@");
			var dotpos = $.trim(email).lastIndexOf(".");
			if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=$.trim(email).length)
			{
				$("#ordercartBody div#emailError").text(errorEmail);
				IsValid = false;
			}
		}
		
		if(IsValid)
		{
			$.post("../Models/xl_order_cart.php", { name, address, phone, email, loinhan, name_nn, address_nn, phone_nn, email_nn, shiptype, paidtype, coupon })
				.done(function(data) {
					var result = $.parseJSON(data);
					if(result)
					{
						$("div#message h3").text("Đặt hàng thành công!");
						$("div#message h2").text("Akanchan sẽ liên lạc với khách hàng để xác nhận đơn hàng!");
						//$.session.set("jcart", $("#uname").val());
					}
					else
					{
						$("div#message h3").text("Đặt hàng thất bại!");
					}
					$("#CustomerDetailCartModal").modal("hide");
					$("#MessageModal").modal("show");
				  })
				.fail(function() {
					$("div#message h3").text("Có lỗi, hiện tại không thể đặt hàng! Vui lòng liên hệ!");
					$("#CustomerDetailCartModal").modal("hide");
					$("#MessageModal").modal("show");
				  })
				.success(function() {
					//alert( "finished" );
				});
		}
	}
	
	function loadInfoUser()
	{
		$.post("../Models/xl_getInfoUser.php")
			.done(function(data) {
				var result = $.parseJSON(data);
				for (var i = 0; i < result.length; i++) {
					var name = result[i]["name"];
					var address = result[i]["address"];
					var phone = result[i]["phone"];
					var email = result[i]["email"];
					var name_nn = result[i]["name_nn"];
					var address_nn = result[i]["address_nn"];
					var phone_nn = result[i]["phone_nn"];
					var email_nn = result[i]["email_nn"];
					
					$("#ordercartBody input:text#name").val(name);
					$("#ordercartBody input:text#address").val(address);
					$("#ordercartBody input:text#phone").val(phone);
					$("#ordercartBody input:text#email").val(email);
					
					$("#ordercartBody input:text#name_nn").val(name_nn);
					$("#ordercartBody input:text#address_nn").val(address_nn);
					$("#ordercartBody input:text#phone_nn").val(phone_nn);
					$("#ordercartBody input:text#email_nn").val(email_nn);
					
					$("#ordercartBody #shipType").prop("checked", true);
					$($("#ordercartBody #paidType:first-child")[0]).prop("checked", true);
				}
			})
			.fail(function() {
			})
			.success(function() {
			});
	}
	
	function clearError()
	{
		$("#changePasswordBody div#oldPassError").text("");
		$("#changePasswordBody div#newPassError").text("");
		$("#regisBody div#usernameError").text("");
		$("#regisBody div#passError").text("");
		$("#forgotBody div#usernameError").text("");
		$("#forgotBody div#passError").text("");
		$("div#nameError").text("");
		$("div#addressError").text("");
		$("div#phoneError").text("");
		$("div#emailError").text("");
		$("div#cmndError").text("");
	}
	
	function clearInput()
	{
		$("input#oldPass").val("");
		$("input#newPass").val("");
		$("input#username").val("");
		$("input#pass").val("");
		$("input#name").val("");
		$("input#address").val("");
		$("input#phone").val("");
		$("input#email").val("");
		$("textarea#loinhan").val("");
		$("input#cmnd").val("");
		$("input#coupon").val("");
	}
	
	function clearError_nn()
	{
		$("div#name_nnError").text("");
		$("div#address_nnError").text("");
		$("div#phone_nnError").text("");
		$("div#email_nnError").text("");
	}
	
	function clearInput_nn()
	{
		$("input#name_nn").val("");
		$("input#address_nn").val("");
		$("input#phone_nn").val("");
		$("input#email_nn").val("");
	}
	
	function callClear()
	{
		clearError();
		clearInput();
	}
	
	function reloadDone()
	{
		$('#MessageModal').modal('hide');
		$("#jcart").load(location.href + " #jcart form", function(){ LoadCart(); });
	}
	
	function LoadCart()
	{
		var temp = $('#jcart-title').attr('title');
		if(temp == 0 || temp == '0' || temp == undefined)
		{
			$('.productimg').hide();
			$('.productx').hide();
			$('.productnumber').hide();
			$('.cartFill').hide();
			$('.cartEmpty').show();
		}
		else
		{
			//$('.productimg').show();
			$('.productx').show();
			$('.productnumber').show();
			$('.productnumber strong').text(temp);
			$('.cartFill').show().css("width", "149px");
			$('.cartEmpty').hide();
		}
	}
</script>