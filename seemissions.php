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
		<h3>see all missions</h3>
		
		<?php
		$host = "localhost";
			$username = "root";
			$password = "";
			$database_name ="assignment_part2";
			
			$link = mysqli_connect($host, $username, $password, $database_name );
			
			if($link === false) {
				die("Error:could not connect");
			} 
		?>
		
		<table>
			<tr>
				<th width="150px">mission ID<br><hr></th>
				<th width="300px">mission name<br><hr></th>
				<th width="150px">astronaut ID<br><hr></th>
				<th width="150px">target ID<br><hr></th>
				<th width="300px">mission destination<br><hr></th>
				<th width="200px">launch date<br><hr></th>
				<th width="200px">mission type<br><hr></th>
				<th width="150px">crew size<br><hr></th>
			</tr>
			
			<?php
			$sql = mysqli_query($link, "SELECT mission_id, mission_name, astronaut_id, target_id, mission_destination, launch_date, mission_type, crew_size FROM missions");
			while ($row = $sql->fetch_assoc()) {
				echo "
				<tr>
					<th>{$row['mission_id']}</th>
					<th>{$row ['mission_name']}</th>
					<th>{$row ['astronaut_id']}</th>
					<th>{$row ['target_id']}</th>
					<th>{$row ['mission_destination']}</th>
					<th>{$row ['launch_date']}</th>
					<th>{$row ['mission_type']}</th>
					<th>{$row ['crew_size']}</th>
				</tr>
				";
			}
			?>
			
		</table>
	
		<?php
		
			mysqli_close($link);
		?>

	</body>
</html>
 