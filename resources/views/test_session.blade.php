<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if(Session::has('username')) {
			echo Session::get("username")."<br>";
			echo Session::get("password");
		} else {
			echo "hello nam";
		}
	?>

</body>
</html>