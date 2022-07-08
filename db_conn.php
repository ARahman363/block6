<?php	

	$name = "localhost";
	$uname = "root";
	$password = "";
	
	$db_name = "test_db";
	
	$conn = mysqli_connect($name, $uname, $password, $db_name);
	
	if(!$conn) {
		echo "connection failed";
	}
	?>
	
	<?php	$link = mysqli_connect("localhost", "root", "", "assignment_part2");
	
	if ($link === false) {
		die("connection failed:");
	}
	?>