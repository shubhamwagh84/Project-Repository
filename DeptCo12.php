
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  
	<title>shubham</title>
</head>
<body>
	<div class="container-xl" style="background-color: LightGray;">
		<br/>
			
			<!-- Just an image -->
		<nav class="navbar navbar-light bg-light">
		    <img src="logo.png" width="140" height="50" alt="VIT LOGO"> 
		    <ul class="nav justify-content-end">
		  <li class="nav-item">
		    <a class="nav-link active" href="logout.php">Logout</a>
		  </li>
		</ul>
		</nav><hr/>
		<a href="DeptCo.php">
			
		<button type="button" class="btn btn-primary">Click Here for Home Page</button></a>
		<hr/>

<form method="post">

				  <div class="form-group">
				    <label for="exampleFormControlInput1">Domain Name</label>
				    <input type="text" class="form-control" name="domainname" id="exampleFormControlInput1" placeholder="">
				  </div>
				    <div class="form-group">
				    <label for="exampleFormControlInput1">Sub Domain Name</label>
				    <input type="text" class="form-control" name="subdomainname" id="exampleFormControlInput1" placeholder="">
				  </div>
				  <center>
	<button type="Submit" class="btn btn-primary" name="domainsubmit">ADD Domain</button></a>
	<a href="DeptCo.php">
		<button type="button" class="btn btn-primary">Close</button></a>
    	</center>
</form>


<?php
session_start();
$loginid1= $_SESSION['DeptCo'];
$deptname= $_SESSION['Deptname'];
if($_SESSION['DeptCo']==true)
{

if(isset($_POST['domainsubmit']))
{
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

	$dname1=$_POST['domainname'];
	$dname2=$_POST['subdomainname'];

	 $sql30    = "INSERT INTO domains (dname, subdname, dept) VALUES ('$dname1','$dname2','$deptname')";
		            $result30 = mysqli_query($conn,$sql30) or die(mysql_error());


		            echo "successfully	";
		            	mysqli_close($conn);


}
}
else
{
	header('location:login.php');
}	



?>


<br/><br/><br/><br/><br/><br/><br/>

</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>