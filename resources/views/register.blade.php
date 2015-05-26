@extends("main")

@section('title')
Đăng ký
@endsection

@section('content')
<!--
<form method ="post" action="{{Asset('register')}}" id="form-register">
	<h2>Đăng ký</h2>
	<input type="text" name="username" id="username" placeholder="Username" class="form-control"/>
	<input type="password" name="password" id="password" placeholder="Password" class="form-control"/>
	<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-password" class="form-control"/>
	<input type="email" name="email" id="email" placeholder="Email" class="form-control"/>
	<button type = "submit" class="btn btn-lg btn-primary btn-block">Đăng ký</button>
</form>
-->
<button type="button" style = "background-color: #00CC66" class="btn btn-primary" id="register_btn" data-keyboard="true" data-toggle="modal" data-target="#Register_Modal">Register</button>

<form method ="post" action="{{Asset('register')}}" id="form-register">
         <div class="modal fade" id="Register_Modal" role="dialog">
              <div class="modal-dialog">
                    <!-- Modal content-->
                   <div class="modal-content">
                          <div class="modal-header" style="padding:35px 50px;">
                              <button type="button" class="close" data-dismiss="modal" id = "close_button_login">&times;</button>
                               <h4 style="color: white;"><span class="glyphicon glyphicon-lock"></span>Register</h4>
                          </div>
                          <div class="modal-body" style="padding:40px 50px;">
                                <form role="form">
                                     <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="text" class="form-control" id="username_1" name="username_1" placeholder="Enter username">
                                     </div>
                                     <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" class="form-control" id="password_1" name="password_1" placeholder="Enter password">
                                     </div>
                                     <div class="form-group">
                                        <label for="re-psw"><span class="glyphicon glyphicon-eye-open"></span> Re-Password</label>
                                        <input type="password" class="form-control" id="password_confirmation_1" name="password_confirmation_1" placeholder="Enter re-password">
                                     </div>
                                     <div class="form-group">
                                        <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                                        <input type="email" class="form-control" id="email_1" name="email_1" placeholder="Enter email">
                                     </div>
                                     <!-- type = submit : goi thang len server, type = button: dung ajax -->
                                     <button style = "background-color: #00CC66"class="btn btn-success" id = "register" ><span class="glyphicon glyphicon-off"></span>Register</button> 
                                </form>
                          </div>
                          <div class="modal-footer">
                          </div>
                   </div>
               </div>
         </div> 
</form>

<script type="text/javascript">
	$("#form-register").validate({
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
</script>
@endsection