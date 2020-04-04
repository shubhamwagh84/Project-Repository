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
		<div class="row">
	  <div class="col-3">
	    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">View Project</a>
	      <a class="nav-link" id="v-pills-tiger-tab" data-toggle="pill" href="#v-pills-tiger" role="tab" aria-controls="v-pills-tiger" aria-selected="false">View project Idea</a>
	      <a class="nav-link" id="v-pills-done1-tab" data-toggle="pill" href="#v-pills-done1" role="tab" aria-controls="v-pills-done1" aria-selected="false">View Project Domains</a>
	      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Your Project Idea</a>
	      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Your Project Detail</a>


	    </div>
	  </div>

	  <div class="col-9">
	    <div class="tab-content" id="v-pills-tabContent">
	      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	      	

		<form method="post">
				  <label class="my-1 mr-2" for="inlineFormCustomSelectPref" >Acedemic Year</label>
				  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="ay1" >
				    <option selected>Choose</option>	    
				    <option value="2019-20">2019-20</option>
				    <option value="2020-21">2020-21</option>
				    <option value="2021-22">2021-22</option>
				    <option value="2022-23">2021-22</option>
				  </select>				      	

				  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Department</label>
				  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="dept1">
				    <option selected>Choose</option>
				      <option value="alldept">All</option>
				    <option value="Computer Engineering">Computer Engineering</option>
				    <option value="Information Technology">Information Technology</option>
				    <option value="Electronics Engineering">Electronics Engineering</option>
				    <option value="Electronics & Telecommunication Engineering">Electronics & Telecommunication Engineering</option>
				    <option value="Biomedical Engineering">Biomedical Engineering</option>
				  	<option value="VIT School of Management (MMS)">VIT School of Management (MMS)</option>
				  </select>				      	





				 
				  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Division</label>
  				  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="divi1">
				    <option selected>Choose</option>
				    <option value="alldivi">All</option>
				    <option value="A">A</option>
				    <option value="B">B</option>
				    <option value="C">C</option>
				  </select>
			

				<center>			
				<button type="submit" name="submit1" class="btn btn-primary">Submit</button>	
				</center>
			</form>
			<hr/>

<?php

function display()
{

	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "VIT";
	$ay1=$_POST['ay1'];
	$dept1=$_POST['dept1'];
	$divi1=$_POST['divi1'];

	
	

	if ($divi1=='alldivi')
	 {
	$divi1="'A','B','C'";
	}
	else
	{
		$divi1="'$divi1'";
	}

	if ($dept1=='alldept')
	 {
 	$dept1="'Information Technology','Computer Engineering','Electronics Engineering','Electronics & Telecommunication Engineering','Biomedical Engineering','VIT School of Management (MMS)'";
 	}
 	else
 	{
 		$dept1="'$dept1'";
 	}
 	// Create connection
	$conn = mysqli_connect($servername, $username,"", $dbname);
	// Check connection
	if (!$conn) 

	{
	    die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql= "SELECT * FROM project where pid in (select pid from pdetail where year='$ay1' and dept IN ($dept1) and division IN ($divi1))";
            $result = mysqli_query($conn,$sql) or die(mysql_error());
            while ($row    = mysqli_fetch_array($result))
            {
            $pid60=$row['pid'];
   			 $sql60= "SELECT * FROM pdetail where pid='$pid60'";
            $result60 = mysqli_query($conn,$sql60) or die(mysql_error());
            while ($row60    = mysqli_fetch_array($result60))
            {
            

		echo "	<div class='card'>
    <h5 class='card-header'>Year : " .$row60['year']. " &nbsp &nbsp Department : " .$row60['dept']. " &nbsp &nbsp  Division : " .$row60['division']. "</h5>
			"; 
			}

			echo "
  <div class='card-body'>
    <h4 class='card-title'>Project Title : " .$row['ptitle']. "  </h4>
   </div>
			 


<table class='table'>
  <tbody>

   <tr>
      <th width='270px'>Project Area</th>
      <th> "  .$row['parea']. "</th>

    </tr>


    <tr>
      <th >Project Synopsis</th>
      <td >
			<form action='stud13.php' target='stud13.php'  method='post'>
		<input type='hidden' id='custId0' name='custId0' value='".$row['psynopsis']."'>
     <button type='submit' class='btn btn-outline-secondary' name='submit10'>VIEW</button>
</form>  
</td>
    </tr>   


    <tr>
      <th>Project Report</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			   <input type='hidden'  id='custId' name='custId1' value='".$row['preport']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit11'>VIEW</button>
			  </form>
	  </td>

    </tr>



    <tr>
      <th>Project Publication</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			   <input type='hidden' id='custId' name='custId2' value='".$row['ppublication']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit12'>VIEW</button>
			  </form>
	  </td>

    </tr>

	
   <tr>
      <th>Project Code</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			      <input type='hidden' id='custId' name='custId3' value='".$row['pcode']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit13'>VIEW</button>
			  </form>
	  </td>

    </tr>
   

   <tr>
      <th>Project PPT</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			    <input type='hidden' id='custId' name='custId4' value='".$row['ppt1']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit14'>VIEW</button>
			  </form>
	  </td>

    </tr>
	

   <tr>
      <th>Project Achievment</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
 			<input type='hidden' id='custId' name='custId5' value='".$row['achieve']."'>
 			  <button type='submit' class='btn btn-outline-secondary' name='submit15'>VIEW</button>
			  </form>
	  </td>

    </tr>




		    

   </tbody>
</table>


		    


		
   <div class='card-footer text-muted'>
    
			  <lable class='font-weight-bold' >Project Guide</lable> &nbsp
			  <lable class='font-weight-bold'>:&nbsp &nbsp" .$row['guide']. "</lable>
		    

  </div> ";
$pid1=$row['pid'];


echo "<div class='accordion' id='accordionExample'>
  <div class='card'>
    <div class='card-header' id='headingOne'>
      <h2 class='mb-0'>
        <button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
          Show Project Member Inforamtion
        </button>
      </h2>
    </div>

    <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample'>";


echo "<table class='table'>
			  <thead class='thead-dark'>
			    <tr>
			      <th scope='col'>Enrollment No</th>
			      <th scope='col'>Name</th>
			      <th scope='col'>Contact No</th>
			    </tr>
			  </thead>
			   ";

$sql2    = "SELECT * FROM pmember where pid='$pid1' ";
            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
            while ($row2   = mysqli_fetch_array($result2))
            {

                			
  		
				  echo " <tr> ";
				     echo "<td>" .$row2['mno']. "</td>";
				     echo "<td>" .$row2['mname']. "</td>";
				     echo "<td>" .$row2['mphone']. "</td>";
			
				    
				echo "</tr>";
			   
			
            }
 			echo " </table> ";	  

echo "</div>
    </div>
  </div>


</div> <hr/>";
	}		
	mysqli_close($conn);

}


if(isset($_POST['submit1']))
{
   display();


   echo "*No more data found.";
}
?>
 
<br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/>

	      </div>



<!--CLOSE the VIEW PROJECT TAB HERE-->

	
	      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">	

 


 <?php


	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "VIT";
  				$pid= $loginid1;
                $dept = '';
                $division = '';
                $year = '';
	// Create connection
	$conn = mysqli_connect($servername, $username,"", $dbname);
	// Check connection
	if (!$conn) 

	{
	    die("Connection failed: " . mysqli_connect_error());
	}
             $sql    = "SELECT * FROM pdetail where pid='$loginid1'" ;
            $result = mysqli_query($conn,$sql) or die(mysql_error());
            while ($row    = mysqli_fetch_array($result))
            {


                $dept = $row['dept'];
                $division = $row['division'];
                $year = $row['year'];

            }


if($dept=='' & $division=='' & $year=='')
{
echo "
	<form method='post' enctype='multipart/form-data' action='stud31.php'>
	  <label class='my-1 mr-2' for='inlineFormCustomSelectPref' >Acedemic Year</label>
				  <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='ay' >
				    <option selected>Choose</option>
				    <option value='2019-20'>2019-20</option>
				    <option value='2020-21'>2020-21</option>
				    <option value='2021-22'>2021-22</option>
				  </select>				      	

				  <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Department</label>
				  <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='dept'>
				    <option selected>Choose...</option>
				    <option value='Computer Engineering'>Computer Engineering</option>
				    <option value='IT Engineering'>IT Engineering</option>
				    <option value='Electronic Engineering'>Electronic Engineering</option>
				    <option value='Electrical Engineering'>Electrical Engineering</option>
				    <option value='Bio-medical Engineering'>Bio-medical Engineering</option>
				  </select>				      	

				  <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Division</label>
  				  <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='divi'>
				    <option selected>Choose</option>
				    <option value='A'>A</option>
				    <option value='B'>B</option>
				    <option value='C'>C</option>
				  </select>
				   <hr/>
				<br/>
				<nav aria-label='breadcrumb'>
				  <ol class='breadcrumb'>
				    <li class='breadcrumb-item active' aria-current='page'>Fill Group Member Details</li>
				  </ol>
				</nav>

			
					<label>Member-1 (Group Leader)</label>
						
						  <div class='row'>
						    <div class='col'>
						      <input type='text' name='m1no' class='form-control' placeholder='Enrollment No'>
						    </div>
						    <div class='col'>
						      <input type='text' name='m1name' class='form-control' placeholder='Full Name'>
						    </div>
						    <div class='col'>
						      <input type='text' name='m1phone' class='form-control' placeholder='Contact No'>
						    </div>
						  </div>
						
						<hr/>
					<label>Member-2</label>
						
						  <div class='row'>
						    <div class='col'>
						      <input type='text' name='m2no' class='form-control' placeholder='Enrollment No'>
						    </div>
						    <div class='col'>
						      <input type='text' name='m2name' class='form-control' placeholder='Full Name'>
						    </div>
						    <div class='col'>
						      <input type='text' name='m2phone' class='form-control' placeholder='Contact No'>
						    </div>
						  </div>
						<hr/>
					<label>Member-3</label>
						
						  <div class='row'>
						    <div class='col'>
						      <input type='text' name='m3no' class='form-control' placeholder='Enrollment No'>
						    </div>
						    <div class='col'>
						      <input type='text' name='m3name' class='form-control' placeholder='Full Name'>
						    </div>
						    <div class='col'>
						      <input type='text' name='m3phone' class='form-control' placeholder='Contact No'>
						    </div>
						  </div>
					<br/>
				<center>
				<button type='submit' name='Submitstud31' class='btn btn-primary'>Submit</button>	
				
				</center>
			</form>
	

				

				<br/>


				   ";


		

}
else
{
	echo "
<label>Department</label>
<input type='text' readonly='' value='$dept'>
<label>Year</label>
<input type='text' readonly='' value='$year'>
<label>Division</label>
<input type='text' readonly='' value='$division'>
<hr/>


";
echo "<table class='table'>
			  <thead class='thead-dark'>
			    <tr>
			      <th scope='col'>Enrollment No</th>
			      <th scope='col'>Name</th>
			      <th scope='col'>Contact No</th>
			    </tr>
			  </thead>
			   ";


$sql2    = "SELECT * FROM pmember where pid='$loginid1'";
            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
            while ($row2   = mysqli_fetch_array($result2))
            {

                			
  		
				  echo " <tr> ";
				     echo "<td>" .$row2['mno']. "</td>";
				     echo "<td>" .$row2['mname']. "</td>";
				     echo "<td>" .$row2['mphone']. "</td>";
			
				    
				echo "</tr>";
			   
			
            }
 			echo " </table> <hr/> ";	

echo "
			<nav aria-label='breadcrumb'>
				  <ol class='breadcrumb'>
				    <li class='breadcrumb-item active' aria-current='page'>Project Idea</li>
				  </ol>
				</nav> ";
	echo "
 						<form action='stud32.php' method='post'>
<center>
		<button type='submit' class='btn btn-primary'>Add New Project idea</button>
</center></form>
<br/>";

	
	$sql70= "SELECT * FROM pidea where pid='$loginid1'";
            $result70 = mysqli_query($conn,$sql70) or die(mysql_error());
            while ($row70    = mysqli_fetch_array($result70))
            {
            

		echo "	<div class='card'>
    <h5 class='card-header'>Year : " .$year. " &nbsp &nbsp Department : " .$dept. " &nbsp &nbsp  Division : " .$division. "</h5>
			"; 

			echo "
  <div class='card-body'>
    <h4 class='card-title'>Project Idea : " .$row70['ptitle']. "  </h4>
   </div>
			 


<table class='table'>
  <tbody>

   <tr>
      <th width='200px'>Project Area</th>
      <th>: "  .$row70['parea']. "</th>

</tr>


    <tr>
      <th >Project Details</th>
      <td >
			<form action='stud13.php' target='stud13.php'  method='post'>
		<input type='hidden' id='custId0' name='custId40' value='".$row70['pabstract']."'>
     <button type='submit' class='btn btn-outline-secondary' name='submit19'>VIEW</button>
</form>  
</td>
    </tr>   




		    

   </tbody>
</table>


		    


		
   <div class='card-footer text-muted'>
    
			  <lable class='font-weight-bold' >Project Guide</lable> &nbsp
			  <lable class='font-weight-bold'>:&nbsp &nbsp" .$row70['guide']. "</lable>
		    

  </div> ";








echo "</div> <hr/>";
	}		






echo "
 						<form action='stud32.php' method='post'>
<center>
		<button type='submit' class='btn btn-primary'>Add New Project idea</button>
</center></form>
<br/>";







}


            mysqli_close($conn);

?>

      </div>





<!--2nd tab close at here -->









<!--3rd Options-->
	      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
	      	
	
<?php


	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "VIT";
  				$pid= $loginid1;
                $dept = '';
                $division = '';
                $year = '';
	// Create connection
	$conn = mysqli_connect($servername, $username,"", $dbname);
	// Check connection
	if (!$conn) 

	{
	    die("Connection failed: " . mysqli_connect_error());
	}
             $sql    = "SELECT * FROM pdetail where pid='$loginid1'" ;
            $result = mysqli_query($conn,$sql) or die(mysql_error());
            while ($row    = mysqli_fetch_array($result))
            {


                $dept = $row['dept'];
                $division = $row['division'];
                $year = $row['year'];

            }

$ptitle70='';
             $sql77    = "SELECT ptitle FROM project where pid='$loginid1'" ;
            $result77 = mysqli_query($conn,$sql77) or die(mysql_error());
            while ($row77    = mysqli_fetch_array($result77))
            {


				$ptitle70=$row77['ptitle'];


            }

 
if($dept=='' & $division=='' & $year=='' )
{
	echo "<div class='alert alert-danger' role='alert'>
  Go to the 'Your Project idea' Tab and fill this form first
</div>";
}
elseif ($dept!='' & $division!='' & $year!='' & $ptitle70=='')
{
		echo "	<div class='alert alert-info'>
			  <strong>Info!</strong> This form fill at the end of the semister
			</div>
							<hr/>
			

				<nav aria-label='breadcrumb'>
				  <ol class='breadcrumb'>
				    <li class='breadcrumb-item active' aria-current='page'> Details</li>
				  </ol>
				</nav>
";
echo"

<label>Department</label>
<input type='text' readonly='' value=' $dept'>
<label>Year</label>
<input type='text' readonly='' value='$year'>
<label>Division</label>
<input type='text' readonly='' value='$division'>
<hr/>
";




echo "
<hr/>
				<nav aria-label='breadcrumb'>
				  <ol class='breadcrumb'>
				    <li class='breadcrumb-item active' aria-current='page'>Fill Project Details</li>
				  </ol>
				</nav>
				
		<form action='stud12.php' method='post' enctype='multipart/form-data'>
				<div class='form-group'>
				    <h5>Project Title</h5>
				    <input type='text' class='form-control' name='ptitle' id='exampleFormControlInput1' placeholder=''>
				  </div>
				  <hr/> ";


echo "
				  <div class='form-group'>
			      <label for='exampleFormControlSelect1'>Project Area</label>
				    <select class='form-control' id='exampleFormControlSelect1' name='parea'>
				   <option selected>Choose</option>";	    
			      $sql2    = "	SELECT subdname FROM domains where dept='$deptname'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['subdname']."'>".$row2['subdname']."</option> ";	
		        	}
echo "</select>";
echo " </div>";








           echo "

				  <label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Select Project Guide Preference</label>
				  <select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name='pguide12'>
				  	   <option selected>Choose</option>";	 

			      $sql2    = "SELECT * FROM logins where roles IN ('DeptCO','Faculty','DiviCo') and dept='$deptname'";
		            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
		            while ($row2   = mysqli_fetch_array($result2))
		            {
		        echo " <option value='".$row2['pids']."'>".$row2['names']."</option> ";	
		        	}
echo "</select>";


echo "
				  <div class='form-group'>
				  		<h5>Project Synopsis</h5>
					    <input name='psynopsis' type='file' class='form-control-file' id='exampleFormControlFile1'>
					  </div>

				  <hr/>
						<div class='form-group'>
					    <h5>Project Report</h5>
					    <input type='file' name='preport' class='form-control-file' id='exampleFormControlFile1'>
					  </div>

				  <hr/>
						<div class='form-group'>
						<h5>Project Publication</h5>
					    <input name='ppub' type='file' class='form-control-file' id='exampleFormControlFile1'>
					  	 
					  </div>

				  <hr/>
					  <div class='form-group'>
					  	<h5>Project Code</h5>
					    <input name='pcode' type='file' class='form-control-file' id='exampleFormControlFile1'>
					  </div>

				  <hr/>
						<div class='form-group'>
						<h5>Project Presentation</h5>
					    <input name='ppt1' type='file' class='form-control-file' id='exampleFormControlFile1'>
					  </div>

				  <hr/>
						<div class='form-group'>
						<h5>Achievment (if Any)</h5>
					    <input name='achiev' type='file' class='form-control-file' id='exampleFormControlFile1'>
					  </div>
					  <hr/>
				<center>
				<button type='submit' name='projectsubmit' class='btn btn-primary'>Submit</button>
				</center>
		</form>
";

         
}
else
{

echo "
			<nav aria-label='breadcrumb'>
				  <ol class='breadcrumb'>
				    <li class='breadcrumb-item active' aria-current='page'>Your Project Details</li>
				  </ol>
				</nav> ";
	

	$sql81= "SELECT * FROM project where pid='$loginid1'";
            $result81 = mysqli_query($conn,$sql81) or die(mysql_error());
            while ($row81    = mysqli_fetch_array($result81))
            {
            $pid81=$row['pid'];
            

		echo "	<div class='card'>
    <h5 class='card-header'>Year : " .$year. " &nbsp &nbsp Department : " .$dept. " &nbsp &nbsp  Division : " .$division. "</h5>
			"; 


			echo "
  <div class='card-body'>
    <h4 class='card-title'>Project Title : " .$row81['ptitle']. "  </h4>
   </div>
			 


<table class='table'>
  <tbody>

   <tr>
      <th width='270px'>Project Area</th>
      <th> "  .$row81['parea']. " </th>
   
    </tr>


    <tr>
      <th >Project Synopsis</th>
      <td >
			<form action='stud13.php' target='stud13.php'   method='post'>
		<input type='hidden' id='custId0' name='custId0' value='".$row81['psynopsis']."'>
     <button type='submit' class='btn btn-outline-secondary' name='submit10'>VIEW</button>
</form>  
</td>
    </tr>   


    <tr>
      <th>Project Report</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			   <input type='hidden'  id='custId' name='custId1' value='".$row81['preport']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit11'>VIEW</button>
			  </form>
	  </td>

    </tr>



    <tr>
      <th>Project Publication</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			   <input type='hidden' id='custId' name='custId2' value='".$row81['ppublication']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit12'>VIEW</button>
			  </form>
	  </td>

    </tr>

	
   <tr>
      <th>Project Code</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			      <input type='hidden' id='custId' name='custId3' value='".$row81['pcode']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit13'>VIEW</button>
			  </form>
	  </td>

    </tr>
   

   <tr>
      <th>Project PPT</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
			    <input type='hidden' id='custId' name='custId4' value='".$row81['ppt1']."'>
			  <button type='submit' class='btn btn-outline-secondary' name='submit14'>VIEW</button>
			  </form>
	  </td>

    </tr>
	

   <tr>
      <th>Project Achievment</th>
      <td>
			<form action='stud13.php' target='stud13.php'  method='post'>
 			<input type='hidden' id='custId' name='custId5' value='".$row81['achieve']."'>
 			  <button type='submit' class='btn btn-outline-secondary' name='submit15'>VIEW</button>
			  </form>
	  </td>

    </tr>




		    

   </tbody>
</table>


		    


		
   <div class='card-footer text-muted'>
    
			  <lable class='font-weight-bold' >Project Guide</lable> &nbsp
			  <lable class='font-weight-bold'>:&nbsp &nbsp" .$row81['guide']. "</lable>
		    

  </div> ";
$pid1=$row81['pid'];


echo "<div class='accordion' id='accordionExample'>
  <div class='card'>
    <div class='card-header' id='headingOne'>
      <h2 class='mb-0'>
        <button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
          Show Project Member Inforamtion
        </button>
      </h2>
    </div>

    <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample'>";


echo "<table class='table'>
			  <thead class='thead-dark'>
			    <tr>
			      <th scope='col'>Enrollment No</th>
			      <th scope='col'>Name</th>
			      <th scope='col'>Contact No</th>
			    </tr>
			  </thead>
			   ";

$sql23    = "SELECT * FROM pmember where pid='$pid1' ";
            $result23 = mysqli_query($conn,$sql23) or die(mysql_error());
            while ($row23   = mysqli_fetch_array($result23))
            {

                			
  		
				  echo " <tr> ";
				     echo "<td>" .$row23['mno']. "</td>";
				     echo "<td>" .$row23['mname']. "</td>";
				     echo "<td>" .$row23['mphone']. "</td>";
			
				    
				echo "</tr>";
			   
			
            }
 			echo " </table> ";	  

echo "</div>
    </div>
  </div>


</div> <hr/>";
	}		


}	
mysqli_close($conn);
?>




	      </div>


      <div class="tab-pane fade" id="v-pills-tiger" role="tabpanel" aria-labelledby="v-pills-tiger-tab">
      




      			<form method="post" >
				  <label class="my-1 mr-2" for="inlineFormCustomSelectPref" >Acedemic Year</label>
				  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="ay213" >
				    <option selected>Choose</option>	    
				    <option value="2019-20">2019-20</option>
				    <option value="2020-21">2020-21</option>
				    <option value="2021-22">2021-22</option>
				    <option value="2022-23">2021-22</option>
				  </select>				      	

				  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Department</label>
				  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="dept212">
				    <option selected>Choose</option>
				      <option value="alldept">All</option>
				    <option value="Computer Engineering">Computer Engineering</option>
				    <option value="Information Technology">Information Technology</option>
				    <option value="Electronics Engineering">Electronics Engineering</option>
				    <option value="Electronics & Telecommunication Engineering">Electronics & Telecommunication Engineering</option>
				    <option value="Biomedical Engineering">Biomedical Engineering</option>
				  	<option value="VIT School of Management (MMS)">VIT School of Management (MMS)</option>
				  </select>				      	





				 
				  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Division</label>
  				  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="divi211">
				    <option selected>Choose</option>
				    <option value="alldivi">All</option>
				    <option value="A">A</option>
				    <option value="B">B</option>
				    <option value="C">C</option>
				  </select>
			

				<center>	
				<button type="submit" name="submit191" class="btn btn-primary">Submit</button>		
				</center>
			</form>
			<hr/>

<?php

if(isset($_POST['submit191']))
{
 

	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "VIT";
	$ay11=$_POST['ay213'];
	$dept11=$_POST['dept212'];
	$divi11=$_POST['divi211'];

	
	

	if ($divi11=='alldivi')
	 {
	$divi11="'A','B','C'";
	}
	else
	{
		$divi11="'$divi11'";
	}

	if ($dept11=='alldept')
	 {
 	$dept11="'Information Technology','Computer Engineering','Electronics Engineering','Electronics & Telecommunication Engineering','Biomedical Engineering','VIT School of Management (MMS)'";
 	}
 	else
 	{
 		$dept11="'$dept11'";
 	}
 	// Create connection
	$conn = mysqli_connect($servername, $username,"", $dbname);
	// Check connection
	if (!$conn) 

	{
	    die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql92= "SELECT pid FROM pdetail where year='$ay11' and dept IN ($dept11) and division IN ($divi11)";
            $result92 = mysqli_query($conn,$sql92) or die(mysql_error());
            while ($row92    = mysqli_fetch_array($result92))
            {
            $i=0;	
            $pid80=$row92['pid'];

			$sql98="select pid from pidea where pid='$pid80'";
           $result98 = mysqli_query($conn,$sql98) or die(mysql_error());
            if($row98    = mysqli_fetch_array($result98))
 			{

            $sql71= "SELECT * FROM pdetail where pid='$pid80'";
            $result71 = mysqli_query($conn,$sql71) or die(mysql_error());
            while ($row71    = mysqli_fetch_array($result71))
            {
            

		echo "	<div class='card'>
    <h5 class='card-header'>Year : " .$row71['year']. " &nbsp &nbsp Department : " .$row71['dept']. " &nbsp &nbsp  Division : " .$row71['division']. "</h5>
			"; 
			}



            	$sql91= "SELECT * FROM pidea where pid='$pid80' ";
            $result91 = mysqli_query($conn,$sql91) or die(mysql_error());
            while ($row91    = mysqli_fetch_array($result91))
            {
            $i++;	
            $pid70=$row91['pid'];


	

			echo "

<div class='alert alert-warning' role='alert'>
  Project idea $i
</div>

			 


<table class='table table-borderless'>
  <tbody>

   <tr>
      <th width='200px'>Project Title</th>
      <th>:&nbsp "  .$row91['ptitle']. "</th>
    </tr>

   <tr>
      <th>Project Area</th>
      <th>:&nbsp "  .$row91['parea']. "</th>
    </tr>


    <tr>
      <th >Project Details</th>
      <td >
			<form action='stud13.php' target='stud13.php'  method='post'>
		<input type='hidden' id='custId0' name='custId40' value='".$row91['pabstract']."'>
     <button type='submit' class='btn btn-outline-secondary' name='submit19'>VIEW</button>
</form>  
</td>
    </tr> 

      <tr>
      <th>Project Guide</th>
      <th>:&nbsp "  .$row91['guide']. "</th>
</tr>



   </tbody>
</table>";

}
$pid19=$pid80;

echo "<div class='accordion' id='accordionExample'>
  <div class='card'>
    <div class='card-header' id='headingOne'>
      <h2 class='mb-0'>
        <button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
          Show Project Member Inforamtion
        </button>
      </h2>
    </div>

    <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample'>";


echo "<table class='table'>
			  <thead class='thead-dark'>
			    <tr>
			      <th scope='col'>Enrollment No</th>
			      <th scope='col'>Name</th>
			      <th scope='col'>Contact No</th>
			    </tr>
			  </thead>
			   ";

$sql71    = "SELECT * FROM pmember where pid='$pid19' ";
            $result71 = mysqli_query($conn,$sql71) or die(mysql_error());
            while ($row71   = mysqli_fetch_array($result71))
            {

                			
  		
				  echo " <tr> ";
				     echo "<td>" .$row71['mno']. "</td>";
				     echo "<td>" .$row71['mname']. "</td>";
				     echo "<td>" .$row71['mphone']. "</td>";
			
				    
				echo "</tr>";
			   
			
            }
 			echo " </table> ";	  

echo "</div>
    </div>
  </div>


</div> <hr/>";
}
}		      	


  echo "*No more data found.";
mysqli_close($conn);
}

	
?>



      </div>

      <div class="tab-pane fade" id="v-pills-done1" role="tabpanel" aria-labelledby="v-pills-done1-tab">

<form method="post">
      		  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Department</label>
				  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="dept150">
				    <option selected>Choose</option>
				    <option value="Computer Engineering">Computer Engineering</option>
				    <option value="Information Technology">Information Technology</option>
				    <option value="Electronics Engineering">Electronics Engineering</option>
				    <option value="Electronics & Telecommunication Engineering">Electronics & Telecommunication Engineering</option>
				    <option value="Biomedical Engineering">Biomedical Engineering</option>
				  	<option value="VIT School of Management (MMS)">VIT School of Management (MMS)</option>
				  </select>				      	

				<center>			
				<button type="submit" name="submit121" class="btn btn-primary">Submit</button>			
				</center>
			
	</form>
<hr/>
<?php

if(isset($_POST['submit121']))
{


	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "VIT";
	
	$dept151=$_POST['dept150'];


	// Create connection
	$conn = mysqli_connect($servername, $username,"", $dbname);
	// Check connection
	if (!$conn) 

	{
	    die("Connection failed: " . mysqli_connect_error());
	}

	echo "<table class='table'>
			  <thead class='thead-dark'>
			    <tr>
			      <th scope='col'>Domain name</th>
			      <th scope='col'>Sub Domain name</th>
			      
			    </tr>
			  </thead>
			   ";

$sql2    = "SELECT * FROM domains where dept='$dept151' ";
            $result2 = mysqli_query($conn,$sql2) or die(mysql_error());
            while ($row2   = mysqli_fetch_array($result2))
            {

                			
  		
				  echo " <tr> ";
				     echo "<td>" .$row2['dname']. "</td>";
				     echo "<td>" .$row2['subdname']. "</td>";
			
				    
				echo "</tr>";
			   
			
            }
 			echo " </table> <hr/>";	  

           mysqli_close($conn);	
}
?>




<br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/>
<br/><br/><br/>


</div>






	    </div>
	  </div>
	</div>













</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>