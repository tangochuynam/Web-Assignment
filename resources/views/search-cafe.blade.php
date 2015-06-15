<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body> 
    <div class = "container-fluid">
    @include("header")
    
    @if ($data == NULL)
        <h3><center> Không tìm thấy dữ liệu </h3>
    @endif
    <h3 style = "margin-left: 50px; color: red"> {{count($data)}} kết quả: </h3>
    <div class = "row">
    @foreach ($data as $datas)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> {{$datas['TEN_QUAN']}} </h4>
                </div>
                <div class="panel-body">
                    <a href="{{Asset('details')}}/{{$datas['MA_QUAN']}}"> <img class="img-responsive img-portfolio img-hover" style='width: 275px; height: 183px' src='{{$datas['ANH_DAI_DIEN']}}' alt=""></a>
                    <br>
                    <p> Địa chỉ: {{$datas['DIA_CHI']}} </p>
                    <p> Thời gian hoạt động: {{$datas['GIO_MO_CUA']}} - {{$datas['GIO_DONG_CUA']}} </p>
                    <p> Giá: {{$datas['GIA_THAP_NHAT']}} - {{$datas['GIA_CAO_NHAT']}} </p>
                    <button type = "button" onclick = "myfuction()" class="btn btn-default">Chi tiết</a>
                </div>
                <div class = "panel-footer"> 
                    <p>Footer</p> 
                </div>
            </div>
        </div>
    @endforeach
    </div>

    @include("footer")
    </div>
    
    <script>
    $(function() {      
          $('.img-responsive').lazyload({
                 effect: "fadeIn"
            });
    });
    </script>
     
</body>
</html>
