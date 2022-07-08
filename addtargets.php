<html>
	<head>
	   <!--this is the title of the website-->
		<title>European Space Agency</title>
	</head>
	   <body style="background-color: #d3f1f5;">
		<h1>European Space Agency</h1>
		<hr>
		<!--these are the links to each page of the European Space Agency-->
		<p>choose an option below:</p>
		<a href="homepage.php">Homepage</a> | 
		<a href="addastronaut.php">add Astronauts</a> | 
		<a href="addmissions.php">add missions</a> | 
		<a href="addtargets.php">add targets </a> | 
		<a href="seeastronauts.php">see astronauts</a> |
		<a href="seemissions.php">see missions</a> |
		<a href="seetargets.php">see targets</a> |
		<hr>
		<h3>Add new target</h3> 
		
		<?php
		//this code here checks and links to the database//
		$host = "localhost";
			$username = "root";
			$password = "";
			$database_name ="assignment_part2";
			
			$link = mysqli_connect($host, $username, $password, $database_name );
			//if the connection is void then the an error message will show//
			if($link === false) {
				die("Error:could not connect");
			} 
		?>
		<!--this form here is used by the user to enter their data relating to each data type i.e. choosing a date using the callender and typing text into fields such as 'name of target'-->
		<form method="post" action="addtargets.php">
			<label>name of target</label><br>
			<input type="text" name="name">
			<br>
			<label>first missions:</label>
			<br>
			<input type="date" name="first_mission">
			<br>
			<label>number of missions:</label>
			<br>
			<input type="text" name="no_missions">
			<br>
			<label>target type:</label>
			<br>
			<input type="text" name="type">
			<br><br>
			<input type="submit" name="submit">
		</form>
		
		<?php
		
		if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$first_mission = $_POST['first_mission'];
		$type = $_POST['type'];
		$no_missions = $_POST['no_missions'];
		
		
		$sql = "INSERT INTO targets (name,first_mission, type, no_missions) VALUES ('$name', '$first_mission', '$type', '$no_missions')";
		
		if (mysqli_query($link, $sql)) 
		
		{
				echo "target has been added";
		} else {
				echo "Error: problem adding target";
		}
		mysqli_close($link);
		}
		?>
		
	</body>
</html>
