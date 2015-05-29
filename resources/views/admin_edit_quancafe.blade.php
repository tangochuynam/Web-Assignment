@extends("main")

@section('title')
Admin Page - Edit Quán cafe
@endsection

@section('content')
<form method ="post" action="{{Asset('admin-edit-quancafe')}}/{{$quan[0]['MA_QUAN']}}" >
	<h2>Chỉnh sửa quán cafe</h2>
	<input type="text" name="TEN_QUAN" id="TEN_QUAN" value="{{$quan[0]['TEN_QUAN']}}" placeholder="Tên quán" class="form-control"/>
	<input type="text" name="dia_chi" id="dia_chi" value="{{$quan[0]['DIA_CHI']}}" placeholder="Địa chỉ" class="form-control"/>
	<input type="string" name="gia_thap_nhat" id="gia_thap_nhat" value="{{$quan[0]['GIA_THAP_NHAT']}}" placeholder="Giá thấp nhất" class="form-control"/>
	<input type="string" name="gia_cao_nhat" id="gia_cao_nhat" value="{{$quan[0]['GIA_CAO_NHAT']}}" placeholder="Giá cao nhất" class="form-control"/>
	<input type="string" name="wifi" id="wifi" value="{{$quan[0]['WIFI']}}" placeholder="Wifi" class="form-control"/>
	<input type="string" name="may_lanh" id="may_lanh" value="{{$quan[0]['MAY_LANH']}}" placeholder="Máy lạnh" class="form-control"/>
	<input type="string" name="cho_dau_xe_hoi" id="cho_dau_xe_hoi" value="{{$quan[0]['CHO_DAU_XE_HOI']}}" placeholder="Chỗ đậu xe hơi" class="form-control"/>
	<input type="string" name="so_dien_thoai" id="so_dien_thoai" value="{{$quan[0]['SO_DIEN_THOAI']}}" placeholder="Số điện thoại" class="form-control"/>
	<input type="string" name="gio_mo_cua" id="gio_mo_cua" value="{{$quan[0]['GIO_MO_CUA']}}" placeholder="Giờ mở cửa" class="form-control"/>
	<input type="string" name="gio_dong_cua" id="gio_dong_cua" value="{{$quan[0]['GIO_DONG_CUA']}}" placeholder="Giờ đóng cửa" class="form-control"/>
	<input type="string" name="thich_hop_cho_doi_tuong" id="thich_hop_cho_doi_tuong" value="{{$quan[0]['THICH_HOP_CHO_DOI_TUONG']}}" placeholder="Thích hợp cho đối tượng" class="form-control"/>
	<input type="string" name="khong_gian" id="khong_gian" value="{{$quan[0]['KHONG_GIAN']}}" placeholder="Không gian" class="form-control"/>	
	<button class="btn btn-lg btn-primary btn-block">Chỉnh sửa</button>
</form>

@endsection
