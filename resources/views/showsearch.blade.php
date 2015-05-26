<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>    
    <?php include("header.php");?>
    @if ($a == NULL)
        <h3><center> Không tìm thấy dữ liệu </h3>
    @endif
    <h3 style = "margin-left: 50px; color: red"> {{count($a)}} kết quả: </h3>
    @for ($i=0; $i < count($a) ; $i++)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> {{$a[$i]['TEN_QUAN']}} </h4>
                </div>
                <div class="panel-body">
                    <img class="img-responsive img-portfolio img-hover" style='width: 275px; height: 183px' src='{{$b[$i]}}' alt="">
                    <br>
                    <p> Địa chỉ: {{$a[$i]['DIA_CHI']}} </p>
                    <p> Thời gian hoạt động: {{$a[$i]['GIO_MO_CUA']}} - {{$a[$i]['GIO_DONG_CUA']}} </p>
                    <p> Giá: {{$a[$i]['GIA_THAP_NHAT']}} - {{$a[$i]['GIA_CAO_NHAT']}} </p>
                    <button type = "button" onclick = "myfuction()" class="btn btn-default">Chi tiết</a>
                </div>
                <div class = "panel-footer"> 
                    <p>Footer</p> 
                </div>
            </div>
        </div>
    @endfor
</body>
</html>
