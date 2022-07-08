<?php
//this here starts the login session from the user login database//
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
//this here checks that the username and password match from the database//
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
//this code here flags up a message if the box has been left blank
    if (empty($uname)) { 
        header("Location: index.php?error=User Name is required");
        exit();
		//this code here ensures that the password field isn't left blank//
    } else if(empty($pass)) {
        header("Location: index.php?error=password is required");
        exit();
    } else {
		//this code here gets the username and password from the users table from the database that holds the user credentials//
        $sql = "SELECT * FROM users Where user_name='$uname' AND password='$pass'";
		//queries between the login form and database to ensure the password and username are available in the database//
        $result = mysqli_query($conn, $sql);
//this here fetches from the associated table from the database which holds the login data//
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
			//this code here checks whether the username and password are correct and if they are then a welcomepage with a welcome message appears//
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                echo"Welcome!";
				
//if the password or username are incorrect then it will run the else statement and display the corresponding error message such as if the password is incorrect//
            } else {
				echo"Wrong username or password";
            }
        } else {
				echo"No creds returned from the DB";
        }
    }
}
?>
<!--this is my html link to gain access to the main database website-->
<html>
<a href="homepage.php">Homepage</a>
</html>