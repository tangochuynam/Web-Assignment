<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.css')}}"/>
	<script src="http://code.jquery.com/jquery-1.11.2.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--  <link rel="stylesheet" href="bootstrap-3.3.4/dist/css/bootstrap.css"> -->
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- plugin for lazay load and validate-->
        <script type="text/javascript" src = "jquery_lazyload/jquery.lazyload.js"></script>
        <script src="{{Asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>
</head>
<body>
<div class="container">
	<div class = "col-md-2">	
	</div>
	<div class = "col-md-8">
		<form class = "form-horizontal" role = "form" method ="post" action="{{Asset('add-quancafe')}}" id="form-insert" enctype="multipart/form-data">
		<h2>Thêm địa điểm</h2>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="ten_quan">Tên quán </label>
		      <div class="col-md-10">
		        <input type="text" name="ten_quan" id="ten_quan" placeholder="Tên quán" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="dia_chi">Địa chỉ </label>
		      <div class="col-md-10">
		       <input type="text" name="dia_chi" id="dia_chi" placeholder="Địa chỉ" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="gia_thap_nhat">Giá thấp nhất </label>
		      <div class="col-md-10">
		        <input type="string" name="gia_thap_nhat" id="gia_thap_nhat" placeholder="Giá thấp nhất" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="gia_cao_nhat">Giá cao nhất </label>
		      <div class="col-md-10">
		        <input type="string" name="gia_cao_nhat" id="gia_cao_nhat" placeholder="Giá cao nhất" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="wifi">Wifi </label>
		      <div class="col-md-10">
		        <input type="string" name="wifi" id="wifi" placeholder="Wifi" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="may_lanh">Máy lạnh </label>
		      <div class="col-md-10">
		        <input type="string" name="may_lanh" id="may_lanh" placeholder="Máy lạnh" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="cho_dau_xe_hoi">Chỗ đậu xe hơi </label>
		      <div class="col-md-10">
		        <input type="string" name="cho_dau_xe_hoi" id="cho_dau_xe_hoi" placeholder="Chỗ đậu xe hơi" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="so_dien_thoai">Số điện thoại </label>
		      <div class="col-md-10">
		        <input type="string" name="so_dien_thoai" id="so_dien_thoai" placeholder="Số điện thoại" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="gio_mo_cua">Giờ mở cửa </label>
		      <div class="col-md-10">
		        <input type="string" name="gio_mo_cua" id="gio_mo_cua" placeholder="Giờ mở cửa" class="form-control"/>
			</div>
		</div>
	    <div class = "form-group">
			<label class="control-label col-sm-2" for="gio_dong_cua">Giờ đóng cửa </label>
		      <div class="col-md-10">
		        <input type="string" name="gio_dong_cua" id="gio_dong_cua" placeholder="Giờ đóng cửa" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="thich_hop_doi_tuong">Đối tượng thích hợp </label>
		      <div class="col-md-10">
		       <input type="string" name="thich_hop_cho_doi_tuong" id="thich_hop_cho_doi_tuong" placeholder="Thích hợp cho đối tượng" class="form-control"/>
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="khong_gian">Không gian </label>
		      <div class="col-md-10">
		        <input type="string" name="khong_gian" id="khong_gian" placeholder="Không gian" class="form-control"/>	
			</div>
		</div>
		<div class = "form-group">
			<label class="control-label col-sm-2" for="ANH_DAI_DIEN">Ảnh đại diện </label>
		      <div class="col-md-10">
		       <input type="file" name="ANH_DAI_DIEN" id="ANH_DAI_DIEN"/>
			</div>
		</div>
		<div class = "form-group">
		      <div class="col-sm-offset-2 col-md-10">
		        <button class="btn btn-lg btn-primary btn-block">Thêm địa điểm</button>
			</div>
		</div>
	</form>
	</div>
	<div class = "col-md-2">		
	</div>
	
</div>
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
</body>
</html>

