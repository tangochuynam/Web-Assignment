$(document).ready(function() {
	$("#sign_in").on("click", function(){
		// alert("hello");
		
		var login_form = $("#login_form").serializeArray();
		// [{"name": "username", "value" : ""},{"name": "password", "value" : ""}]

		// alert(login_form[0].value + " " + login_form[1].value);
		// $.each(login_form,function(name, value){
		// 	alert(value.name + " "  + name + " : " +value.value);
		// });
		var url = $("#login_form").attr('action'); // login
		 // alert(url);
			// loader("on");
		$.post(url, login_form, function(data) {

			
			// loader("off");
			if(data == "fail") {
				$("#fdk").addClass("alert alert-danger").fadeIn(1000,function(){
					$(this).hide();	
				});
				$("#msg").text("Invalid user");
				$.each(login_form,function(i,k){
					$("#" + k.name).val('');
				});
			} elprimary
				$("#fdk").addClass("alert alert-success").fadeIn(500,function(){
					// $(this).hide();	
				});
				// $("#login_btn").text("LogOut");
				$("#msg").text("successfully loggin... Redicrect to Home")
				
				setTimeout(function() {$("#close_button_login").click();},3000);
				
				// $("#close_button_login").trigger('click'); // cach 2
				
				// $("#name_login").text("Hello" + " " + login_form[0].value);
				// $("#login_btn").css("display","none");
				// $("#logout_btn").css("display","initial");
				// alert("run");

				// }) ;
				setTimeout(function() {redicrect("mainlayout");},2000);
				
			}
		 });
		 
	});
	$("#logout_btn").on("click",function(){
		
	});
	
});
function redicrect(url) {
	window.location = url;
}
function loader(v) {
	if ( v == "on") {
		$("#form-login").css({
			opacity: 0.8	
		});
		$("#loader").show();
	} else {
		$("form-login").css({
			opacity : 1
		});
		$("#loader").hide();
	}
}