@extends("main")

@section('title')
Admin Page
@endsection

@section('content')
    <a href="{{Asset('admin-thanhvien')}}" class = "btn btn-success" >Thành viên</a>
    <a href="{{Asset('admin-quancafe')}}" class = "btn btn-success" >Quán cafe</a>
    <a href="{{Asset('admin-baidang')}}" class = "btn btn-success" >Bài đăng</a>
@endsection
