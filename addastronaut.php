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
		<a href="homepage.php">Homepage</a> 
		<a href="addastronaut.php">add Astronauts</a> 
		<a href="addmissions.php">add missions</a> 
		<a href="addtargets.php">add targets </a> 
		<a href="seeastronauts.php">see astronauts</a> 
		<a href="seemissions.php">see missions</a> 
		<a href="seetargets.php">see targets</a> 
		<hr>
		<h3>Add new astronauts</h3> 
		
		<?php
		//this here links to the database//
		$host = "localhost"; //name of database host//
			$username = "root";
			$password = "";
			$database_name ="assignment_part2";
			//this here looks for a secure connection to the database//
			$link = mysqli_connect($host, $username, $password, $database_name );
			
			if($link === false) {
				die("Error:could not connect");
			} 
		?>
		<!-- this here is the form for adding the astronauts name and the number of missions 
		they have been on-->
		<form method="post" action="addastronaut.php">
			<label>astronaut name</label><br>
			<input type="text" name="astronaut_name">
			<br><br>
			<label>select number of missions:</label>
			<br>
			<input type="text" name="no_missions">
			<br><br>
			<input type="submit" name="submit">
		</form>
		
		<?php
		//the PHP submits the data that has been inputted by the user into the astronauts table//
		if(isset($_POST['submit'])) {
		$astronaut_name = $_POST['astronaut_name'];
		$no_missions = $_POST['no_missions'];
		
		
		$sql = "INSERT INTO astronauts (name, no_missions) VALUES ('$astronaut_name', '$no_missions')";
		
		if (mysqli_query($link, $sql)) 
		//this code here lets the user know whether the data has been submited successfully or not//
		{
				echo "astronaut has been added";
		} else {
				echo "Error: problem adding mission";
		}
		mysqli_close($link);
		}
		?>
		
	</body>
</html>
