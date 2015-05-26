<!DOCTYPE HTML>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/style.css')}}"/>
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
	@yield("content")
</div>	
</body>
</html>