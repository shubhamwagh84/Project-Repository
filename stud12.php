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
<?php
session_start();
$loginid1= $_SESSION['student1'];

if($_SESSION['student1']==false)
{
	header('location:login.php');
}
else
{
$ptitle=$_POST['ptitle'];
$parea1=$_POST['parea'];
$pguide=$_POST['pguide12'];
$psynopsis=$_FILES['psynopsis']['name'];
$preport=$_FILES['preport']['name'];
$ppub1=$_FILES['ppub']['name'];
$pcode=$_FILES['pcode']['name'];
$ppt1=$_FILES['ppt1']['name'];
$achieve=$_FILES['achiev']['name'];

$servername = "localhost";
$username = "root";
$password = "password";
$dbname  = "VIT";
$pid10=$loginid1;
// Create connection
$conn = mysqli_connect($servername, $username,"", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$target_path1 = "/opt/lampp/htdocs/Project File/synopsis1/";  
$target_path1 = $target_path1.''.$pid10.basename( $_FILES['psynopsis']['name']);   
$fname=$_FILES['psynopsis']['tmp_name'];
if(move_uploaded_file($fname, $target_path1)) {  
    echo "File uploaded successfully!";  
}
 else
{  
    echo "Sorry, file not uploaded, please try again!";  
}  



$target_path2 = "/opt/lampp/htdocs/Project File/report1/";  
$target_path2 = $target_path2.''.$pid10.basename( $_FILES['preport']['name']);   
$fname=$_FILES['preport']['tmp_name'];
if(move_uploaded_file($fname, $target_path2)) {  
    echo "File uploaded successfully!";  
}
 else
{  
    echo "Sorry, file not uploaded, please try again!";  
}  



$target_path3 = "/opt/lampp/htdocs/Project File/publication1/";  
$target_path3 = $target_path3.''.$pid10.basename( $_FILES['ppub']['name']);   
$fname=$_FILES['ppub']['tmp_name'];
if(move_uploaded_file($fname, $target_path3)) {  
    echo "File uploaded successfully!";  
}
 else
{  
    echo "Sorry, file not uploaded, please try again!";  
}  



$target_path4 = "/opt/lampp/htdocs/Project File/code1/";  
$target_path4 = $target_path4.''.$pid10.basename( $_FILES['pcode']['name']);   
$fname=$_FILES['pcode']['tmp_name'];
if(move_uploaded_file($fname, $target_path4)) {  
    echo "File uploaded successfully!";  
}
 else
{  
    echo "Sorry, file not uploaded, please try again!";  
}  



$target_path5 = "/opt/lampp/htdocs/Project File/ppt1/";  
$target_path5 = $target_path5.''.$pid10.basename( $_FILES['ppt1']['name']);   
$fname=$_FILES['ppt1']['tmp_name'];
if(move_uploaded_file($fname, $target_path5)) {  
    echo "File uploaded successfully!";  
}
 else
{  
    echo "Sorry, file not uploaded, please try again!";  
}  



$target_path6 = "/opt/lampp/htdocs/Project File/achiev1/";  
$target_path6 = $target_path6.''.$pid10.basename( $_FILES['achiev']['name']);   
$fname=$_FILES['achiev']['tmp_name'];
if(move_uploaded_file($fname, $target_path6)) {  
    echo "File uploaded successfully!";  
}
 else
{  
    echo "Sorry, file not uploaded, please try again!";  
}  











$sql = "INSERT INTO project (ptitle, parea, psynopsis, preport, ppublication, pcode, ppt1, achieve,	pid, guide) VALUES ('$ptitle', '$parea1', '$target_path1', '$target_path2', '$target_path3', '$target_path4', '$target_path5', '$target_path6','$pid10','$pguide')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
header('Location:stud1.php');
?>

				  
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>


