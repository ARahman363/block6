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
		<h3>see all targets</h3>
		
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
				<th width="100px">target ID<br><hr></th>
				<th width="300px">Name<br><hr></th>
				<th width="150px">first mission<br><hr></th>
				<th width="150px">type<br><hr></th>
				<th width="150px">no_missions<br><hr></th>
			</tr>
			
			<?php
			$sql = mysqli_query($link, "SELECT target_id, name, first_mission, type, no_missions FROM targets");
			while ($row = $sql->fetch_assoc()) {
				echo "
				<tr>
					<th>{$row['target_id']}</th>
					<th>{$row ['name']}</th>	
					<th>{$row ['first_mission']}</th>
					<th>{$row ['type']}</th>
					<th>{$row ['no_missions']}</th>
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
 