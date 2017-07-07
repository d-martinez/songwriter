<?php
$servername = "localhost";
$database = "okw_database";
$username = "root";
$password = "phptesting";

$con = mysqli_connect($servername, $username, $password) or die("Failed to connect to MySQL: " . mysqli_connect_error());
$db = mysql_select_db($database,$con) or die("Failed to connect to MySQL: " . mysqli_error());
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn()
{
session_start();   //starting the session for user profile page
if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$query = mysqil_query("SELECT *  FROM user where username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error());
	$row = mysqli_fetch_array($query) or die(mysqli_error());
	if(!empty($row['username']) AND !empty($row['password']))
	{
		$_SESSION['username'] = $row['password'];
		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";

	}
	else
	{
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}
}
}
if(isset($_POST['submit']))
{
	SignIn();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Processing</title>
	</head>
	<body>
        <?php
           /* other ways to check form submission: use 'submit' check instead
           
            if (isset($_POST["username"])) {
                $username = $_POST["username"];
            }
            else {
                $username = "";
            }
            if (isset($_POST["password"])) {
                $password = $_POST["password"];
            }
            else {
                $password = "";
            }
            echo "{$username}: {$password}";
            */
        ?>
        <?php
            if (isset($_POST['submit'])) {
                echo "Form was submitted";
            }
            else {
                echo "Please go back and submit the form.";
            }
        ?>
	</body>
</html>
