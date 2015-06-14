@extends("main")

@section('title')
Thêm quán cafe
@endsection

@section('content')
<form method ="post" action="{{Asset('add-quancafe')}}" id="form-insert" enctype="multipart/form-data">
	<h2>Thêm địa điểm</h2>
	<input type="text" name="ten_quan" id="ten_quan" placeholder="Tên quán" class="form-control"/>
	<input type="text" name="dia_chi" id="dia_chi" placeholder="Địa chỉ" class="form-control"/>
	<input type="string" name="gia_thap_nhat" id="gia_thap_nhat" placeholder="Giá thấp nhất" class="form-control"/>
	<input type="string" name="gia_cao_nhat" id="gia_cao_nhat" placeholder="Giá cao nhất" class="form-control"/>
	<input type="string" name="wifi" id="wifi" placeholder="Wifi" class="form-control"/>
	<input type="string" name="may_lanh" id="may_lanh" placeholder="Máy lạnh" class="form-control"/>
	<input type="string" name="cho_dau_xe_hoi" id="cho_dau_xe_hoi" placeholder="Chỗ đậu xe hơi" class="form-control"/>
	<input type="string" name="so_dien_thoai" id="so_dien_thoai" placeholder="Số điện thoại" class="form-control"/>
	<input type="string" name="gio_mo_cua" id="gio_mo_cua" placeholder="Giờ mở cửa" class="form-control"/>
	<input type="string" name="gio_dong_cua" id="gio_dong_cua" placeholder="Giờ đóng cửa" class="form-control"/>
	<input type="string" name="thich_hop_cho_doi_tuong" id="thich_hop_cho_doi_tuong" placeholder="Thích hợp cho đối tượng" class="form-control"/>
	<input type="string" name="khong_gian" id="khong_gian" placeholder="Không gian" class="form-control"/>	
	Ảnh đại diện:
	<input type="file" name="ANH_DAI_DIEN" id="ANH_DAI_DIEN" />
	<button class="btn btn-lg btn-primary btn-block">Thêm địa điểm</button>
</form>

<script type="text/javascript">
	$("#form-insert").validate({
		rules:{
			ten_quan:{
				required:true
			},
			dia_chi:{
				required:true
			}
		},
		messages:{
			ten_quan:{
				required:"Vui lòng nhập tên quán"
			},
			dia_chi:{
				required:"Vui lòng nhập địa chỉ quán"
			}
		}
	});
</script>
@endsection