<?php
session_start();
$loginid1= $_SESSION['student1'];
$deptname=  $_SESSION['Deptname'];


if($_SESSION['student1']==true)
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

	mysqli_close($conn);
}
else
{
	header('location:login.php');
}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>VIT</title>
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
		 
		</nav>
		<hr/>
		<a href="stud1.php">
			
		<button type="button" class="btn btn-primary">Click Here for Home Page</button></a>
		



		<form method="post" enctype="multipart/form-data">
	  			<br/>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page">Fill Project Idea Details</li>
				  </ol>
				</nav>

				
				<h5>Project Idea</h5>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Project Title</label>
				    <input type="text" name="i1name" class="form-control" id="exampleFormControlInput1" placeholder="">
				  </div>


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


echo "
				  <div class='form-group'>
				    <label for='exampleFormControlSelect1'>Project Area</label>
				    <select class='form-control' id='exampleFormControlSelect1' name='i1area'>
				   <option selected>Choose</option>";	    
			      $sql2    = "	SELECT subdname FROM domains where dept='$deptname'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['subdname']."'>".$row2['subdname']."</option> ";	
		        	}
echo "</select>";
mysqli_close($conn);
?>
				  </div>


					<div class="form-group">
					    <label for="exampleFormControlFile1">Upload Project Detail/Abstract</label>
					    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="i1file">
					  </div>

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


           echo "

				  <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Select Project Guide Preference</label>
				  <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='i1guide'>
				  	   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='$deptname'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";	
		        	}
echo "</select>";
mysqli_close($conn);
?>
			
				
				  <hr/>

				
				<center>
				<button type="submit" name="Submitstud11" class="btn btn-primary">Submit</button>	
				<a href="stud1.php">
		<button type="button" class="btn btn-primary">Close</button></a>
		<hr/>	
				</center>
			</form>
				<br/>

<?php
if(isset($_POST['Submitstud11']))
{
$i1name=$_POST['i1name'];
$i1area=$_POST['i1area'];
$i1file=$_FILES['i1file']['name'];
$i1guide=$_POST['i1guide'];
$pid11=$loginid1;


$target_path1 = "/opt/lampp/htdocs/Project File/pidea1/";  
$target_path1 = $target_path1.''.$pid11.'1'.basename( $_FILES['i1file']['name']);   
$fname=$_FILES['i1file']['tmp_name'];
		if(move_uploaded_file($fname, $target_path1)) {  
		    echo "File uploaded successfully!";  
		}
		 else
		{  
		    echo "Sorry, file not uploaded, please try again!";  
		}  


$servername = "localhost";
$username = "root";
$password = "password";
$dbname  = "VIT";

// Create connection
$conn = mysqli_connect($servername, $username,"", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql5 = "INSERT INTO pidea (pid, ptitle, parea, pabstract,guide)
VALUES ('$pid11', '$i1name', '$i1area', '$target_path1', '$i1guide')";

if (mysqli_query($conn, $sql5)) {
    echo "New record created successfully5";
} else {
    echo "Error5: " . $sql5 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header('Location:stud1.php');
}
?>					  
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>