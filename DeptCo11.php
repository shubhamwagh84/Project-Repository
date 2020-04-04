
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




<?php
session_start();
$loginid1= $_SESSION['DeptCo'];
$deptname= $_SESSION['Deptname'];
if($_SESSION['DeptCo']==true)
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
			      <th scope='col'>Division</th>
			      <th scope='col'> Select Division Co-ordinator </th> </tr> ";
 

echo "
 <tr>
 				<td scope='col'>$deptname</td>
			      <td scope='col'>A</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptcomp'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('Faculty','DiviCo') and dept='$deptname'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>


 </th> </tr> ";

Echo "    <tr>
 				<td scope='col'>$deptname</td>
			      <td scope='col'>B</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptit'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('Faculty','DiviCo') and dept='$deptname'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";									      	
				    }
echo "</select>


 </th> </tr> ";

Echo "    <tr>
 				<td scope='col'>$deptname</td>
			      <td scope='col'>C</td>
			      <th scope='col'>
			      <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='deptec'>
				   <option selected>Choose</option>";	    
			      $sql2    = "SELECT * FROM logins where roles IN ('Faculty','DiviCo') and dept='$deptname'";
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
		<button type='submit' class='btn btn-primary' name='deptCOsubmit'>submit</button>
				<a href='DeptCo.php'>
		</form>			
	
		<button type='button' class='btn btn-primary'>Close</button></a>

</center>
<hr/>";





if(isset($_POST['deptCOsubmit']))
{
	 $sql19    = "update logins set roles='Faculty', divi='' where roles='DiviCo' and dept='$deptname'";
		            $result19 = mysqli_query($conn,$sql19) or die(mysql_error());


	$cmpn=$_POST['deptcomp'];
	$ite=$_POST['deptit'];
	$ec=$_POST['deptec'];
	
	

          $sql21    = "update logins set roles='DiviCo', divi='A' where pids='$cmpn'";
		            $result21 = mysqli_query($conn,$sql21) or die(mysql_error());


          $sql22    = "update logins set roles='DiviCo', divi='B' where pids='$ite'";
		            $result22 = mysqli_query($conn,$sql22) or die(mysql_error());


          $sql23    = "update logins set roles='DiviCo', divi='C' where pids='$ec'";
		            $result23 = mysqli_query($conn,$sql23) or die(mysql_error());


   echo "*Update Successfully!";
   header('location:DeptCo.php');

}



	mysqli_close($conn);
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
    

