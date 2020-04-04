<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  
	<title>Create account</title>
</head>
<body>
	<div class="container-xl" style="background-color: LightGray;">
		<br/>
			
			<!-- Just an image -->
		<nav class="navbar navbar-light bg-light">
		    <img src="logo.png" width="140" height="50" alt="VIT LOGO"> 
		    
		</nav>
		<hr/>

<form action="create1.php" method="post">
<table>
	<tr>
		<td width="200px"></td>
		<td width="990px">
<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Enrollment No</label> 
    <div class="col-sm-10">
    <input type="text" class="form-control" name="enrolla1" id="formGroupExampleInput" placeholder="Enrollment No">
    </div>
</div></td>
<td width="200px"></td>
</tr>


	<tr>
		<td width="200px"></td>
		<td width="990px">
<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="passa1" id="inputPassword" placeholder="Password">
    </div>
  </div></td>
<td width="200px"></td>
</tr>


	<tr>
		<td width="200px"></td>
		<td width="990px">
<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Name</label> 
    <div class="col-sm-10">
    <input type="text" class="form-control" id="formGroupExampleInput" name="namea1" placeholder="Name">
    </div>
</div></td>
<td width="200px"></td>
</tr>

	<tr>
		<td width="200px"></td>
		<td width="990px">
 <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
	<input type="email" class="form-control" id="exampleFormControlInput1"  name="maila1" placeholder="   @vit.edu.in">
      </div>
  </div></td>
<td width="200px"></td>
</tr>

	<tr>
		<td width="200px"></td>
		<td width="990px">
<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Role</label> 
    <div class="col-sm-10">
		 <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="rolea1" >
				    <option selected>Choose</option>	    
				    <option value="Faculty">Faculty</option>
				    <option value="Leader">Group Leader</option>
				    <option value="Student">Student</option>
				  </select>				      
    </div>
</div></td>
<td width="200px"></td>
</tr>

	<tr>
		<td width="200px"></td>
		<td width="990px">
<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Department</label> 
    <div class="col-sm-10">
		 <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="depta1" >
				    <option selected>Choose</option>	    
				    <option value="Computer Engineering">Computer Engineering</option>
				    <option value="Information Technology">Information Technology</option>
				    <option value="Electronics Engineering">Electronics Engineering</option>
				    <option value="Electronics & Telecommunication Engineering">Electronics & Telecommunication Engineering</option>
				    <option value="Biomedical Engineering">Biomedical Engineering</option>
				  	<option value="VIT School of Management (MMS)">VIT School of Management (MMS)</option> </select>			      
    </div>
</div></td>
<td width="200px"></td>
</tr>

	<tr>
		<td width="200px"></td>
		<td width="990px">
 <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
	<center>			
				<button type="submit" name="create" class="btn btn-primary">Submit</button>	
						<a href="login.php">
			
		<button type="button" class="btn btn-primary">Close</button></a>

				</center>

      </div>
  </div></td>
<td width="200px"></td>
</tr>

</table>

</form>
		
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
    

