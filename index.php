<!DOCTYPE html>

<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<form action="login.php" method="post">
	
		<h2>LOGIN</h2>
		
		<?php if (isset($_GET['error'])) { ?> <!--isset is to check the retrieved data is not null-->
			<p class="error"><?php echo $_GET['error']; ?></p> <!--if null then an error is shown -->
		<?php } ?>
		
	<!--this is the form for the login where the user enters their username and password-->
		<label>User Name</label>
		<input type="text" name="uname" id="uname" placeholder="User Name"><br>
		
		<label>Password</label>
		<input type="password" name="password" id="password" placeholder="password"><br>
		<button class="submit_button" type="submit" name="submit">Login</button>
		
	</form>
</body>
</html>