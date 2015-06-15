@extends("main")

@section('title')
Admin Page
@endsection

@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-md-4"></div>
			<div class = "col-md-4" style = "margin-top: 200px">
				<a href="{{Asset('admin-thanhvien')}}" class = "btn btn-success" >Thành viên</a>
			    <a href="{{Asset('admin-quancafe')}}" class = "btn btn-success" >Quán cafe</a>
			    <a href="{{Asset('admin-baidang')}}" class = "btn btn-success" >Bài đăng</a>
			</div>
			<div class = "col-md-4"></div>
		</div>
	</div>
    
@endsection
