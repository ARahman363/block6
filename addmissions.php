<html>
	<head>
	   <!--this is the title of the website-->
		<title>European Space Agency</title>
	</head>
	   <body style="background-color: #d3f1f5;">
		<h1>European Space Agency</h1>
		<hr>
		<!--these are the A tag links to each page of the European Space Agency-->
		<p>choose an option below:</p>
		<a href="homepage.php">Homepage</a> | 
		<a href="addastronaut.php">add Astronauts</a> | 
		<a href="addmissions.php">add missions</a> | 
		<a href="addtargets.php">add targets </a> | 
		<a href="seeastronauts.php">see astronauts</a> |
		<a href="seemissions.php">see missions</a> |
		<a href="seetargets.php">see targets</a> |
		<hr>
		
		<h3>Add new mission</h3>
		
		<?php
		//this here links to the database//
		$host = "localhost";
			$username = "root";
			$password = "";
			$database_name ="assignment_part2";
			
			$link = mysqli_connect($host, $username, $password, $database_name );
			//this here confirms whether it has connected to the database successfully or not//
			if($link === false) {
				die("Error:could not connect");
			} 
		?>
		
		<form method="post" action="addmissions.php">
		<!--this a form for the user to in put data-->
			<label>Name of mission</label><br>
			<input type="text" name="mission_name">
			<br>
			
			<label>Mission destination</label><br>
			<input type="text" name="mission_destination"><br>
			
			<label>Launch date</label><br>
			<input type="date" name="launch_date"><br>
			
			<label>Mission type</label><br>
			<input type="text" name="mission_type"><br>
			
			<label>Crew size</label><br>
			<input type="text" name="crew_size"><br>
			
			<label>choose astronaut</label><br>
			<select name="astronaut_id">
			<?php
			//this code here fetches associated data from the astronauts database//
				$sql = mysqli_query($link, " SELECT astronaut_id, name FROM astronauts");
				while ($row = $sql->fetch_assoc()){
				echo "<option value=' {$row['astronaut_id']}'>{$row['name']}</option>";
				}
			?>
			</select>
			<br>
			<label>choose target</label><br>
			<select name="target_id">
			<?php
			
				$sql = mysqli_query($link, " SELECT target_id, name FROM targets");
				while ($row = $sql->fetch_assoc()){
				echo "<option value=' {$row['target_id']}'>{$row['name']}</option>";
				}
			?>
			</select>
			<br>
			
			
			<input type="submit" name="submit">
		</form>
		
		
		<?php
		     //the isset here
			if(isset($_POST['submit'])) {
				//following vairables are used to store values from the missions table//
				$mission_name = $_POST['mission_name'];
				$astronaut_id = $_POST['astronaut_id'];
				$target_id = $_POST['target_id'];
				$mission_destination = $_POST['mission_destination'];                           
				$launch_date = $_POST['launch_date'];
				$mission_type = $_POST['mission_type'];
				$crew_size = $_POST['crew_size'];
				
				$sql = "INSERT INTO missions (mission_name, astronaut_id, target_id, mission_destination,
				launch_date, mission_type, crew_size) VALUES ('$mission_name', '$astronaut_id', '$target_id', 
				'$mission_destination', '$launch_date', '$mission_type', '$crew_size')";
				//this here validates whether the data entered has been successful, 
				if (mysqli_query($link, $sql)) {
					echo "new record created successfully";
				} else {
					echo "Error adding record";
				}
			$link->close();
			}
		?>
			
	</body>
</html>
