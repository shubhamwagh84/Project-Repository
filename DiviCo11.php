
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
		<a href="DiviCo.php">
			
		<button type="button" class="btn btn-primary">Click Here for Home Page</button></a>
		<hr/>

         <form method="post">
<?php

session_start();
$loginid1=  $_SESSION['DiviCo'];
$deptname= $_SESSION['Deptname'];
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
				  <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptcomp'>
				   <option selected>Choose</option>";	    
			      $sql2    = "	SELECT * FROM domains where dept='$deptname'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['subdname']."'>".$row2['subdname']."</option> ";	
		        	}
echo "</select>";
mysqli_close($conn);
?>

<center>
	<button type="Submit" class="btn btn-primary" name="domainfsubmit">ADD Domain</button></a>
	<a href="DiviCo.php">
		<button type="button" class="btn btn-primary">Close</button></a>
 </center>
</form>

<?php

if($_SESSION['DiviCo']==true)
{

if(isset($_POST['domainfsubmit']))
{  
	$dname3='';
	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "VIT";
  	$dname3=$_POST['deptcomp'];		
  	$a2='';
	// Create connection
	$conn = mysqli_connect($servername, $username,"", $dbname);
	// Check connection
	if (!$conn) 
	{
	    die("Connection failed: " . mysqli_connect_error());
	}


 $sql31    = "	SELECT * FROM domains where dept='$deptname' and subdname='$dname3'";
		            $result31 = mysqli_query($conn,$sql31) or die(mysql_error());
		            while ($row31   = mysqli_fetch_array($result31))
		            {
				         $a2=$row31['dname'];
		        										      	
					}



	
	 $sql30    = "INSERT INTO domainsf (dname, subdname, fname, dept) VALUES ('$a2', '$dname3', '$loginid1', '$deptname')";
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