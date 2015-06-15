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
                <div  style = "height:70px" class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> {{$datas['TEN_QUAN']}} </h4>
                </div>
                <div style = "height: 350px"  class="panel-body">
                    <a href="{{Asset('details')}}/{{$datas['MA_QUAN']}}"> <img class="img-responsive img-portfolio img-hover" style='width: 275px; height: 183px;margin-left:30px' data-original='{{$datas['ANH_DAI_DIEN']}}' alt=""></a>
                    <br>
                    <div style = "overflow:hidden; max-width:400px; max-height:25px">
                        <p> Địa chỉ: {{$datas['DIA_CHI']}} </p>
                    </div>
                    <div style = "overflow:hidden; max-width:400px; max-height:25px">
                        <p> Thời gian hoạt động: {{$datas['GIO_MO_CUA']}} - {{$datas['GIO_DONG_CUA']}} </p>
                    </div>
                    <div style = "overflow:hidden; max-width:400px; max-height:25px">
                        <p> Giá: {{$datas['GIA_THAP_NHAT']}} - {{$datas['GIA_CAO_NHAT']}} </p>
                    </div> 
                    <button type = "button" onclick = "myfuction()" class="btn btn-default">Chi tiết</a>
                </div>
                <div style = "height:50px" class = "panel-footer"> 
                    <p></p> 
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
