<?php
	session_start();

	if(isset($_SESSION['ID']) && isset($_SESSION['user_name'])) {
?>

<html>
	<head>
		<title>European Space Agency</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<a href="home.php">European Space Agency</a>
		<a href="homepage.php">Homepage</a> | 
		<a href="addastronaut.php">add Astronauts</a> | 
		<a href="addmissions.php">add missions</a> | 
		<a href="addtargets.php">add targets </a> | 
		<a href="seeastronauts.php">see astronauts</a> |
		<a href="seemissions.php">see missions</a> |
		<a href="seetargets.php">see targets</a> |
		
		<br><hr><br>
		
		<h3>Use buttons above</h3>
		
	</body>
</html>

<?php
}
else{
	header("Location: index.php");
	exit();
}
?>
	
