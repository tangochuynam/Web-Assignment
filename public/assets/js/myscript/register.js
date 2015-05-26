$(function() {
	$("#form-register").validate({
		submitHandler: function(form) {
			var url = $("#form-register").attr('action'); // login
			var register_form = $("#form-register").serializeArray();
  			  $.post(url,register_form,function(data){
  			  	   $("#fdk_1").removeClass("alert alert-danger");
  			  		if(data == "success") {
  			  			$("#fdk_1").addClass("alert alert-info").fadeIn(1000,function(){
						});
						$("#msg_1").text("Successfully Register");
						setTimeout(function(){
     						$("#close_button_register").click();
   						 },2000);
  			  		} else {	
  			  			$("#fdk_1").addClass("alert alert-danger").fadeIn(1000,function(){
						});
						$("#msg_1").text("User or Email is existed");
  			  		}
  			  });
 		 },
		rules:{
			username_1:{
				required:true,	
				minlength:3,
				/*remote:{
					url:"{{Asset('check/check-username')}}",
					type:"POST"
				}*/
			},
			password_1:{
				required:true,
				minlength:6
			},
			password_confirmation_1:{
				equalTo:"#password_1"
			},
			email_1:{
				required:true,
				email:true,
				/*remote:{
					url:"{{Asset('check/check-email')}}",
					type:"POST"
				}*/
			}
		},
		messages:{
			username_1:{
				required:"Vui lòng nhập username",
				minlength:"Nhập 3 kí tự trở lên",
				remote:"Username đã tồn tại"
			},
			password_1:{
				required:"Vui lòng nhập password",
				minlength:"Nhập 6 kí tự trở lên"
			},
			password_confirmation_1:{
				equalTo:"Password xác nhận không đúng"
			},
			email_1:{
				required:"Vui lòng nhập email",
				email:"Không đúng định dạng email",
				remote:"Email đã tồn tại"
			}
		}
	});

});
