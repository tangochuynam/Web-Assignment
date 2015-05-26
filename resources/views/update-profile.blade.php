@extends("main")  
 @section('title') 
 Cập nhật thông tin  
  @endsection
 @section('content') 
 <form method ="post" action="{{Asset('update-profile')}}" id="form-update-profile"> 
  	<h2>Cập nhật thông tin</h2> 
  	<input type="text" name="TEN_THANH_VIEN" id="TEN_THANH_VIEN" placeholder="Họ tên" class="form-control"/>  	
  	<input type="text" name="GIOI_TINH" id="GIOI_TINH" placeholder="Giới tính" class="form-control"/> 
   	<input type="text" name="TINH_TRANG_HON_NHAN" id="TINH_TRANG_HON_NHAN" placeholder="Tình trạng hôn nhân" class="form-control"/> 
   	<input type="text" name="THANH_PHO/TINH" id="THANH_PHO/TINH" placeholder="Thành phố/Tỉnh" class="form-control"/>  
   	<input type="text" name="QUAN/HUYEN" id="QUAN/HUYEN" placeholder="Quận/Huyện" class="form-control"/>  
   	<p><a href="{{Asset('logout')}}">Đăng xuất</a></p>  
   	<button class="btn btn-lg btn-primary btn-block">Cập nhật</button>  
   	<br>  
   	<p id = "test_btn" style="color:green" >hello baby</p>  	
   	<button id = "try_btn">Logout</button>  
   </form> 
   @endsection