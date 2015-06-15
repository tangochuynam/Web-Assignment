@extends("main")

@section('title')
Admin Page - Edit Quán cafe
@endsection

@section('content')
<form method ="post" action="{{Asset('admin-edit-quancafe')}}/{{$quan[0]['MA_QUAN']}}" enctype="multipart/form-data" >
	<h2>Chỉnh sửa quán cafe</h2>
	<input type="text" name="TEN_QUAN" id="TEN_QUAN" value="{{$quan[0]['TEN_QUAN']}}" placeholder="Tên quán" class="form-control"/>
	<input type="text" name="DIA_CHI" id="DIA_CHI" value="{{$quan[0]['DIA_CHI']}}" placeholder="Địa chỉ" class="form-control"/>
	<input type="string" name="GIA_THAP_NHAT" id="GIA_THAP_NHAT" value="{{$quan[0]['GIA_THAP_NHAT']}}" placeholder="Giá thấp nhất" class="form-control"/>
	<input type="string" name="GIA_CAO_NHAT" id="GIA_CAO_NHAT" value="{{$quan[0]['GIA_CAO_NHAT']}}" placeholder="Giá cao nhất" class="form-control"/>
	<input type="string" name="WIFI" id="WIFI" value="{{$quan[0]['WIFI']}}" placeholder="Wifi" class="form-control"/>
	<input type="string" name="MAY_LANH" id="MAY_LANH" value="{{$quan[0]['MAY_LANH']}}" placeholder="Máy lạnh" class="form-control"/>
	<input type="string" name="CHO_DAU_XE_HOI" id="CHO_DAU_XE_HOI" value="{{$quan[0]['CHO_DAU_XE_HOI']}}" placeholder="Chỗ đậu xe hơi" class="form-control"/>
	<input type="string" name="SO_DIEN_THOAI" id="SO_DIEN_THOAI" value="{{$quan[0]['SO_DIEN_THOAI']}}" placeholder="Số điện thoại" class="form-control"/>
	<input type="string" name="GIO_MO_CUA" id="GIO_MO_CUA" value="{{$quan[0]['GIO_MO_CUA']}}" placeholder="Giờ mở cửa" class="form-control"/>
	<input type="string" name="GIO_DONG_CUA" id="GIO_DONG_CUA" value="{{$quan[0]['GIO_DONG_CUA']}}" placeholder="Giờ đóng cửa" class="form-control"/>
	<input type="string" name="THICH_HOP_CHO_DOI_TUONG" id="THICH_HOP_CHO_DOI_TUONG" value="{{$quan[0]['THICH_HOP_CHO_DOI_TUONG']}}" placeholder="Thích hợp cho đối tượng" class="form-control"/>
	<input type="string" name="KHONG_GIAN" id="KHONG_GIAN" value="{{$quan[0]['KHONG_GIAN']}}" placeholder="Không gian" class="form-control"/>	
	Ảnh đại diện:
	<input type="file" name="ANH_DAI_DIEN" id="ANH_DAI_DIEN" value="{{$quan[0]['ANH_DAI_DIEN']}}"/>
	<img src = "{{$anh}}">

	<button class="btn btn-lg btn-primary btn-block">Chỉnh sửa</button>
</form>

@endsection
