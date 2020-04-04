
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
		<a href="admin.php">
			
		<button type="button" class="btn btn-primary">Click Here for Home Page</button></a>
		<hr/>




<?php
session_start();
$loginid1= $_SESSION['Admin'];

if($_SESSION['Admin']==true)
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

echo "<form method='post'>";
echo "<table class='table'>
			  <thead>
			    <tr>
			      <th scope='col'>department</th>
			      <th scope='col'> Select Project Co-ordinator </th> </tr> ";
 

echo "
 <tr>
			      <td scope='col'>Computer Engineering</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptcomp'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='Computer Engineering'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>


 </th> </tr> ";

Echo "    <tr>
			      <td scope='col'>Information Technology</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptit'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='Information Technology'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>


 </th> </tr> ";

Echo "    <tr>
			      <td scope='col'>Electronics Engineering</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptec'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='Electronics Engineering'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>
 </th> </tr> ";



Echo "    <tr>
			      <td scope='col'>Electronics & Telecommunication Engineering</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptet'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='Electronics & Telecommunication Engineering'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>


 </th> </tr> ";


Echo "    <tr>
			      <td scope='col'>Biomedical Engineering</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptbio'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='Biomedical Engineering'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>


 </th> </tr> ";




Echo "    <tr>
			      <td scope='col'>VIT School of Management (MMS)</td>
			      <th scope='col' >
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptmms'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='VIT School of Management (MMS)'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>


 </th> </tr> ";



 echo " </thead> </table> <hr/>";



	echo "
<center>
		<button type='submit' class='btn btn-primary' name='adminsubmit'>submit</button>
				<a href='admin.php'>
		</form>			
	
		<button type='button' class='btn btn-primary'>Close</button></a>

</center>
<hr/>";





if(isset($_POST['adminsubmit']))
{
	 $sql19    = "update logins set roles='Faculty' where roles='DeptCo'";
		            $result19 = mysqli_query($conn,$sql19) or die(mysql_error());


	$cmpn=$_POST['deptcomp'];
	$ite=$_POST['deptit'];
	$ec=$_POST['deptec'];
	$et=$_POST['deptet'];
	$bio=$_POST['deptbio'];
	$mms=$_POST['deptmms'];
	
	

          $sql21    = "update logins set roles='DeptCo' where pids='$cmpn'";
		            $result21 = mysqli_query($conn,$sql21) or die(mysql_error());


          $sql22    = "update logins set roles='DeptCo' where pids='$ite'";
		            $result22 = mysqli_query($conn,$sql22) or die(mysql_error());


          $sql23    = "update logins set roles='DeptCo' where pids='$ec'";
		            $result23 = mysqli_query($conn,$sql23) or die(mysql_error());


          $sql24    = "update logins set roles='DeptCo' where pids='$et'";
		            $result24 = mysqli_query($conn,$sql24) or die(mysql_error());

          $sql25    = "update logins set roles='DeptCo' where pids='$bio'";
		            $result25 = mysqli_query($conn,$sql25) or die(mysql_error());


          $sql26    = "update logins set roles='DeptCo' where pids='$mms'";
		            $result26 = mysqli_query($conn,$sql26) or die(mysql_error());

   echo "*Update Successfully!";
   header('location:admin.php');

}



	mysqli_close($conn);
}
else
{
	header('location:login.php');
}	
?>




</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
    

