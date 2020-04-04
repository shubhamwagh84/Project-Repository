<?php
	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "VIT";
  				
	// Create connection
	$conn = mysqli_connect($servername, $username,"", $dbname);
	// Check connection
	if (!$conn) 

	{
	    die("Connection failed: " . mysqli_connect_error());
	}

$enroll1=$_POST['enrolla1'];
$pass1=$_POST['passa1'];
$name1=$_POST['namea1'];
$mail1=$_POST['maila1'];
$role1=$_POST['rolea1'];
$dept1=$_POST['depta1'];
$divi1='';

$sql= "insert into logins (pids, passwords, roles, names, emails, dept, divi) values('$enroll1','$pass1','$role1','$name1','$mail1','$dept1','$divi1')";
$result = mysqli_query($conn,$sql) or die(mysql_error());
 	mysqli_close($conn);
header('Location:login.php');
?>