@extends("main")

@section('title')
Admin Page - Edit Thành viên
@endsection

@section('content')
<form method ="post" action="{{Asset('admin-edit-thanhvien')}}/{{$user[0]['MA_THANH_VIEN']}}" >
	<h2>Chỉnh sửa thành viên</h2>
	<input type="text" name="TEN_THANH_VIEN" id="TEN_THANH_VIEN" value="{{$user[0]['TEN_THANH_VIEN']}}" placeholder="Họ tên" class="form-control"/>
	<button class="btn btn-lg btn-primary btn-block">Chỉnh sửa</button>
</form>

@endsection
