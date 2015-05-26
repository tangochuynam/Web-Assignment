<html>
<head>
	<!-- CSS file -->
<link rel="stylesheet" href="{{Asset('assets/css/easy-autocomplete.min.css')}}" type="text/css">
<script src="http://code.jquery.com/jquery-1.11.2.js"></script>
	<!-- JS file -->
<script src="{{Asset('assets/js/easyautocomplete/jquery.easy-autocomplete.js')}}" type="text/javascript"></script> 
 
<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="{{Asset('assets/js/easyautocomplete/easy-autocomplete.themes.min.css')}}"> 


</head>
<body>
	<form method ="post" action="{{Asset('search')}}" id="form-search">
		<input id="search" name="keyword"/>
		<button class="btn btn-success">Search</button>
	</form>
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
</body>	
</html>