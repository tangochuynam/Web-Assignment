<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--  <link rel="stylesheet" href="bootstrap-3.3.4/dist/css/bootstrap.css"> -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{Asset('assets/js/easyautocomplete/easy-autocomplete.themes.min.css')}}"> 
        <link rel="stylesheet" href="{{Asset('assets/js/easyautocomplete/easy-autocomplete.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{Asset('assets/css/style.css')}}"/>
        <!-- LINK LOCAL -->
        <!-- 
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css"></link> 
        <link rel="stylesheet" type="text/css" href="jquery-1.9.1.min.js">
        -->
        <!--
        <link rel = "stylesheet" href = "Overide_BST.css">
        <script src = "{{Asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{Asset('assets/js/easyautocomplete/jquery-1.11.2.min.js')}}"></script>
        -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- plugin for lazay load and validate-->
      <!--  <script type="text/javascript" src = "http://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script> -->
        <script src="{{Asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>
        <script src="{{Asset('assets/js/lazyload/jquery.lazyload.js')}}"></script> 
        <script src="{{Asset('assets/js/easyautocomplete/jquery.easy-autocomplete.js')}}"></script> 
        <script src = "{{Asset('assets/js/myscript/login_ajax.js')}}"></script>
        <script src = "{{Asset('assets/js/myscript/myjs.js')}}"></script>
        <script src = "{{Asset('assets/js/myscript/register.js')}}"></script>
        <style>
            #carousel-example-generic {
                background-color : #FAEBD7 ;
            }
            body {
                max-width: 100%;
                overflow-x: hidden;
            }
            .modal-header, .close {
                 background-color: #00CC66;
                color:white !important;
                text-align: center;
                font-size: 30px;
            }
            .modal-footer {
                background-color: #00CC66;

            } 
            .btn-success {
                width: 100%;
                 padding: 10px;
            }
            #kh {
                font-family: "Comic Sans MS", cursive, sans-serif;
                margin-top: 40px;
                padding-left: 40px;
            }
        </style>
    </head>
    <body>
        <header>
            <div class = "row">       
                <div class = "col-lg-5">
                    <a href = "#"><image style = "height: 100px; width: 90%" src ="coffee_IMG/logo.png" alt = "Coffe-logo"></a>
                </div>      
                <div class = "col-lg-7">
                    <h3 id = "kh" style = "color: #8B4513;">The Ho Chi Minh City Website Coffee For Everyone</h3>
                </div>    
            </div>
        </header>
        <div class="container-fluid" id = "main">
            <!-- Navigation -->
            <div class = "row">
                <div id = "sticky_navigation">
                    <!-- class navbar-static-top dung de doi bo tron thanh bo thang -->
                    <nav class = "navbar navbar-inverse navbar-static-top" style = "margin-bottom:0px">
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
                                 <li><a href="{{Asset('mainlayout')}}">Homepage</a></li>
                                 <li><a href="{{Asset('mainlayout')}}">Introduction</a></li>
                                 <li><a href="{{Asset('mainlayout')}}">Best Place</a></li>
                                 <li><a href="{{Asset('add-quancafe')}}">Add</a></li>
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
                                 <form method = "get" action ="{{Asset('logout')}}" class = "navbar-form navbar-right ">
                                    <?php
                                        if(Session::has("username")) {
                                            echo 
                                            "<script>
                                             $(function() {
                                               $('#login_btn').css('display','none');
                                             });
                                            </script>";
                                            echo 
                                            "<div class = 'form-group'>
                                                <button style = 'margin-left : -15px; color:#8B4513' id='logout_btn'class='btn btn-default'>Logout</button>
                                            </div>";
                                            echo 
                                            "<div class = 'form-group'>
                                                <span style = 'color: white; margin-left: 5px'>".Session::get("username")."</span>
                                            </div>";
                                        } 
                                    ?>
                                </form>
                                <form method = "get" action ="{{Asset('search-cafe')}}" class = "navbar-form navbar-right">
                                    <div class = "form-group">
                                             <input type = "text" class = "form-control" style ="width: 300px;margin-bottom: 0px" id = "search"  placeholder = "Search coffee place" name = "keyword">
                                        <!--<input type = "submit" class = "btn btn-success" value= "Search" > -->
                                    </div>
                                    
                                    <div class = "form-group">
                                        <span >
                                             <button style="color:#8B4513" class = "btn btn-default"><span class = "glyphicon glyphicon-search"></span></button>  
                                         </span>
                                    </div>
                                
                                    <div class = "form-group">
                                        <button type="button" class="btn btn-default" style="color:#8B4513" id="register_btn" data-keyboard="true" data-toggle="modal" data-target="#Register_Modal">Register</button>
                                    </div>
                                    <div class = "form-group">
                                         <!-- Modal for Login  -->
                                         <!-- Trigger the modal with a button -->
                                         <!-- data-keyboard="true" : when press ESC it remove model  -->
                                         <button type="button" class="btn btn-default" style="color:#8B4513" id="login_btn" data-keyboard="true" data-toggle="modal" data-target="#myModal">Login</button>
                                    </div>   
                                </form>
                                <!--Co the chen cac button vao navbar -- Here ^-^ -->
                             </div>
                         </div>
                    </nav>     
                </div>
            </div> <!-- End of navigation  -->
        </div>
        <!-- Modal -->
           <!--Just move the entire modal outside of the rest of your code, to the very bottom. It doesn't need to be nested in any other element, other than the body. Neu de nested thi no bi show phia sau cac phan tu khac -->
         <form method ="post" action="{{Asset('do-login')}}" id="login_form">
         <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                    <!-- Modal content-->
                   <div class="modal-content">
                          <div class="modal-header" style="padding:35px 50px;">
                              <button type="button" class="close" data-dismiss="modal" id = "close_button_login">&times;</button>
                               <h4 style="color: white;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
                          </div>
                          <div class="modal-body" style="padding:40px 50px;">
                                <div id = "fdk" style = "display:none">
                                    <a class = "close" data-dismiss = "aleart" aria-hidden = "true"></a>
                                    <span id= "msg"></span>
                                </div>
                                <form role="form">
                                     <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                     </div>
                                     <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                     </div>
                                     <div class="checkbox">
                                         <label><input type="checkbox" value="" checked>Remember me</label>
                                     </div>
                                     <!-- type = submit : goi thang len server, type = button: dung ajax -->
                                     <button type="button" class="btn btn-success" style = "background-color: #00CC66" id = "sign_in" ><span class="glyphicon glyphicon-off"></span> Login</button> 
                                </form>
                          </div>
                          <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <p>Not a member? <a href="#register_form">Register</a></p>
                                <p>Forgot <a href="#">Password?</a></p>
                          </div>
                   </div>
               </div>
         </div> 
        </form>
        <form method ="post" action="{{Asset('register')}}" id="form-register">
         <div class="modal fade" id="Register_Modal" role="dialog">
              <div class="modal-dialog">
                    <!-- Modal content-->
                   <div class="modal-content">
                          <div class="modal-header" style="padding:35px 50px;">
                              <button type="button" class="close" data-dismiss="modal" id = "close_button_register">&times;</button>
                               <h4 style="color: white;"><span class="glyphicon glyphicon-lock"></span>Register</h4>
                          </div>
                          <div class="modal-body" style="padding:40px 50px;">
                             <div id = "fdk_1" style = "display:none">
                                    <a class = "close" data-dismiss = "aleart" aria-hidden = "true"></a>
                                    <span id= "msg_1"></span>
                                </div>
                                <form role="form">
                                     <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="text" class="form-control" id="username_1" name="username_1" placeholder="Enter username">
                                     </div>
                                     <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="password" class="form-control" id="password_1" name="password_1" placeholder="Enter password">
                                     </div>
                                     <div class="form-group">
                                        <label for="re-psw"><span class="glyphicon glyphicon-eye-open"></span> Re-Password</label>
                                        <input type="password" class="form-control" id="password_confirmation_1" name="password_confirmation_1" placeholder="Enter re-password">
                                     </div>
                                     <div class="form-group">
                                        <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                                        <input type="email" class="form-control" id="email_1" name="email_1" placeholder="Enter email">
                                     </div>
                                     <!-- type = submit : goi thang len server, type = button: dung ajax -->
                                     <button style = "background-color: #00CC66"class="btn btn-success" id = "register" ><span class="glyphicon glyphicon-off"></span>Register</button> 
                                </form>
                          </div>
                          <div class="modal-footer">
                          </div>
                   </div>
               </div>
         </div> 
        </form>

    </body>
</html>