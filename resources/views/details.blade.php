

<!DOCTYPE html>
<html>
<head>
    <title>
        Coffee Detail 
    </title>
    <meta charset = 'utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <meta charset = 'utf-8'>
    <script
        src='http://maps.googleapis.com/maps/api/js'>
    </script>
    <style>
        #googleMap {
            width: 100%;
            height: auto;
        }
    </style>

</head>
<body>
    @include("header")

    <div class = "container-fluid">
        <div class = "row">
            <div class="col-md-5 col-sm-5">
                    <div class = "panel panel-default">
                        <div class = "panel-heading">
                            <h4><i class="fa fa-fw fa-check"></i> {{$data[0]['TEN_QUAN']}} </h4>
                        </div>
                        <div class = "panel-body">
                            <img style = "widht: 400x; height: 300px"class="img-responsive img-portfolio img-hover" src="{{$image}}" alt="">
                        </div>
                        <div class = "panel-footer">
                        </div>
                    </div>
            </div>
            <div class = "col-md-7 col-sm-7">
                <table class="table">
                  <thead>
                    <tr>
                      <h1>Infomation Details</h1>
                    </tr>
                 </thead>
                <tbody>
                    <tr>
                         <td><h4><span class = "glyphicon glyphicon-globe"> <strong> Address </strong></span></h4></td>
                 <td>{{$data[0]['DIA_CHI']}}</td>
                  </tr>
                    <tr>
                        <td><h4><span class = "glyphicon glyphicon-time"> <strong>Time</strong></span></h4></td>
                <td>{{$data[0]['GIO_MO_CUA']}} - {{$data[0]['GIO_DONG_CUA']}}</td>
                    </tr>
                <tr>
                    <td><h4><span class = "glyphicon glyphicon-euro"> <strong>Price</strong></span></h4></td>
                <td>{{$data[0]['GIA_THAP_NHAT']}} - {{$data[0]['GIA_CAO_NHAT']}}</td>
                    </tr>
                  <tr>
                          <td><h4><span class = "glyphicon glyphicon-star"> <strong>Wifi</strong></span></h4></td>
                <td>{{$data[0]['WIFI']}}</td>
                  </tr>
            <tr>
                <td><h4><span class = "glyphicon glyphicon-heart"> <strong>AirConditioner</strong></span></h4></td>
                <td>{{$data[0]['MAY_LANH']}}</td>
            </tr>
            <tr>
                <td><h4><span class = "glyphicon glyphicon-road"> <strong>Parking Lot</strong></span></h4></td>
                <td>{{$data[0]['CHO_DAU_XE_HOI']}}</td>
            </tr>
                </tbody>
                </table>    
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-5">
                <div id='googleMap' style='width:500px;height:400px;'></div>
            </div>
            <div class = "col-md-7">
                <form method = "post" action = "{{Asset('bai-dang')}}" class = "pull-left">
                     <h2>Comment </h2>
                     <input type="hidden" id ="cafe_id" name="cafe_id" value="{{$data[0]['MA_QUAN']}}">
                     <textarea name="content" id="content" placeholder = "Write your comment to support for everyone better " style = "resize: none" rows = "10" cols = "100">
                     </textarea>
                     <br><br>
                     <button class = "btn btn-primary"type = "submit">Submit</button>
                </form>
            </div>
        </div>

        <div>
            @if (count(App\bai_dang::load_baidang($data[0]['MA_QUAN']) != 0))
              
                @foreach(App\bai_dang::load_baidang($data[0]['MA_QUAN']) as $com)
                <li><b>{{$com['user']}} :</b><br>
                  {{$com['content']}}
                </li>
                @endforeach
            @else {{Chưa}}
            @endif
        </div>

        @include("footer")
    </div>
    <script>
        var mycenter = new google.maps.LatLng({{$lat}},{{$long}});
        function initialize() {
          var mapProp = {
            center:mycenter,
            zoom:17,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          };
          var map=new google.maps.Map(document.getElementById('googleMap'), mapProp);
          var marker = new google.maps.Marker({
            position: mycenter,
            animation:google.maps.Animation.BOUNCE,
          });
          marker.setMap(map);
          var infowindow = new google.maps.InfoWindow({
            content: '{{$address}}'
          });
          infowindow.open(map,marker);
          // zoom when clickking on marker 
          google.maps.event.addListener(marker, 'click', function(){
            map.setZoom(20);
            map.setCenter(marker.getPosition());
          });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>
</html>
