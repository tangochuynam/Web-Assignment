<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>    
    @include("header")
    
    @if ($data == NULL)
        <h3><center> Không tìm thấy dữ liệu </h3>
    @endif
    <h3 style = "margin-left: 50px; color: red"> {{count($data)}} kết quả: </h3>

    @for ($i=0; $i < count($data) ; $i++)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> {{$data[$i]['TEN_QUAN']}} </h4>
                </div>
                <div class="panel-body">
                    <a href="{{Asset('details')}}/{{$data[$i]['MA_QUAN']}}"> <img class="img-responsive img-portfolio img-hover" style='width: 275px; height: 183px' src='{{$image[$i]}}' alt=""></a>
                    <br>
                    <p> Địa chỉ: {{$data[$i]['DIA_CHI']}} </p>
                    <p> Thời gian hoạt động: {{$data[$i]['GIO_MO_CUA']}} - {{$data[$i]['GIO_DONG_CUA']}} </p>
                    <p> Giá: {{$data[$i]['GIA_THAP_NHAT']}} - {{$data[$i]['GIA_CAO_NHAT']}} </p>
                    <button type = "button" onclick = "myfuction()" class="btn btn-default">Chi tiết</a>
                </div>
                <div class = "panel-footer"> 
                    <p>Footer</p> 
                </div>
            </div>
        </div>
    @endfor
    <div>
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
