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
		<h3>see all astronauts</h3>
		
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
		
		<table>
		<!--this here is a table to hold the data of the astronauts, the astronaut ID uses auto-increment-->
			<tr>
				<th width="100px">astronaut ID<br><hr></th>
				<th width="300px">astronaut name<br><hr></th>
				<th width="150px">number of missions<br><hr></th>
			</tr>
			
			<?php
			$sql = mysqli_query($link, "SELECT astronaut_id, name, no_missions FROM astronauts");
			while ($row = $sql->fetch_assoc()) {
				echo "
				<tr>
					<th>{$row['astronaut_id']}</th>
					<th>{$row ['name']}</th>
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
 