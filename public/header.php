<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--  <link rel="stylesheet" href="bootstrap-3.3.4/dist/css/bootstrap.css"> -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- LINK LOCAL -->
        <!-- 
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css"></link> 
        <link rel="stylesheet" type="text/css" href="jquery-1.9.1.min.js">
        -->
        <link rel='stylesheet' href="{{Asset('assets/css/Overide_BST.css')}}"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- plugin for lazay load-->
        <script type='text/javascript' src="{{Asset('assets/js/jquery_lazyload/jquery.lazyload.js')}}"></script>
        <link rel="stylesheet" href="{{Asset('assets/css/easy-autocomplete.min.css')}}" type="text/css">
        <script src="http://code.jquery.com/jquery-1.11.2.js"></script>
            <!-- JS file -->
        <script src="{{Asset('assets/js/easyautocomplete/jquery.easy-autocomplete.js')}}" type="text/javascript"></script> 
        <style>
            #carousel-example-generic {
                background-color : #FF4500 ;
            }
            body {
                min-height: 1000px;
               padding-top: 50px;
            }
            .modal-header, .close {
                 background-color: #5cb85c;
                color:white !important;
                text-align: center;
                font-size: 30px;
            }
            .modal-footer {
                background-color: #f9f9f9;

            } 
            .btn-success {
                width: 100%;
                 padding: 10px;
            }
        </style>
        
    </head>
    <body>
        
        <div class="container-fluid" id = "main">
            <!-- Navigation -->
            <div class = "row">
                <h1 class = "text-center" id = "logo"> <a href = "#">Cafe</a></h1>
                <div id = "navigation_1">
                    <!-- class navbar-static-top dung de doi bo tron thanh bo thang -->
                    <nav class = "navbar navbar-inverse navbar-static-top navbar-fixed-top">
                        <!-- class ="container" boc ngoai navbar de canh deu voi noi dung o duoi -->
                        <div class = "container">
                            <div class = "navbar-header">
                              <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target ="#menu">
                                <span class = "sr-only">Toggle navigation</span>
                                <span class = "icon-bar"></span>
                                <span class = "icon-bar"></span>
                                <span class = "icon-bar"></span>
                              </button>
                              <a href ="#" class = "navbar-brand"><span class = "glyphicon glyphicon-th"></span> </a>
                            </div>
                        <!-- chu y them collpase vao navbar-collapse de an menu khi man hinh nho-->
                            <div class = "navbar-collapse collapse" id = "menu">
                               <ul class="nav navbar-nav">
                                 <li><a href="#">Homepage</a></li>
                                 <li><a href="#">Introduction</a></li>
                                 <li><a href="#">Best Place</a></li>
                                 <li><a href="#">Showcase</a></li>
                                 <!-- nhung dropdown menu vao navbar -->
                                 <li class = "dropdown">
                                    <a data-toggle = "dropdown"href="#">ContactUs<span class = "caret"></span></a>
                                    <ul class = "dropdown-menu">
                                        <li><a href="#">Information</a></li>
                                        <li><a href="#">Assistant</a></li>
                                        <!-- Tao duong gach chia 2 nua bang class divider -->
                                        <div class = "divider"></div>
                                        <li><a href="#">Phone</a></li>
                                    </ul>
                                </li>
                                </ul>
                                <!-- chen FORM vao thanh MENU -->
                                <form method = "post" action ="{{Asset('search-cafe')}}" id="form-search" class = "navbar-form navbar-right">
                                    <div class = "form-group">
                                        <input type = "text" class = "form-control" id="search" name="keyword" placeholder = "Search coffee place">
                                    </div>
                                    <div class = "form-group">
                                        <button class="btn btn-success">Search</button>
                                    </div>
                                    <?php
                                    $myfile = fopen("test.json", "w") or die("Unable to open file!");
                                    $array = DB::select('select * from quan_cafe');
                                    $txt = json_encode($array);
                                    fwrite($myfile, $txt);
                                    fclose($myfile); ?>

                                    <script>
                                        var options = {
                                    url: "test.json",

                                    getValue: function(element) {
                                        return element.TEN_QUAN + " " + element.DIA_CHI;
                                    },

                                    list: {
                                        match: {
                                            enabled: true
                                        },
                                        maxNumberOfElements: 5
                                    }
                                };

                                $("#search").easyAutocomplete(options);
                                    </script>
                                    <div class = "form-group">
                                         <!-- Modal for Login  -->

                                         <!-- Trigger the modal with a button -->
                                         <!-- data-keyboard="true" : when press ESC it remove model  -->
                                        <button type="button" class="btn btn-success" id="myBtn"  data-keyboard="true" data-toggle="modal" data-target="#myModal">Login</button>

                                    </div>
                                </form>
                                <!--Co the chen cac button vao navbar -- Here ^-^ -->
                             </div>
                         </div>
                    </nav>     
                </div>
            </div> <!-- End of navigation  -->
        </div>
    </body>
</html>   