<?php
session_start();
$loginid1= $_SESSION['student1'];

if($_SESSION['student1']==false)
{
	header('location:login.php');
}
else
{
$servername = "localhost";
$username = "root";
$password = "password";
$dbname  = "VIT";
$ac_year=$_POST['ay'];
$dept=$_POST['dept'];
$divi=$_POST['divi'];

$m1no=$_POST['m1no'];
$m1name=$_POST['m1name'];
$m1phone=$_POST['m1phone'];

$m2no=$_POST['m2no'];
$m2name=$_POST['m2name'];
$m2phone=$_POST['m2phone'];

$m3no=$_POST['m3no'];
$m3name=$_POST['m3name'];
$m3phone=$_POST['m3phone'];

$pid11=$loginid1;




// Create connection
$conn = mysqli_connect($servername, $username,"", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "INSERT INTO pdetail (pid, year, dept, division)
VALUES ('$pid11', '$ac_year', '$dept', '$divi')";

if (mysqli_query($conn, $sql1)) {
    echo "New record created successfully1";
} else {
    echo "Error1: " . $sql1 . "<br>" . mysqli_error($conn);
}



$sql2 = "INSERT INTO pmember (pid, mno, mname, mphone)
VALUES ('$pid11', '$m1no', '$m1name', '$m1phone')";

if (mysqli_query($conn, $sql2)) {
    echo "New record created successfully2";
} else {
    echo "Error2: " . $sql2 . "<br>" . mysqli_error($conn);
}




$sql3 = "INSERT INTO pmember (pid, mno, mname, mphone)
VALUES ('$pid11', '$m2no', '$m2name', '$m2phone')";

if (mysqli_query($conn, $sql3)) {
    echo "New record created successfully3";
} else {
    echo "Error3: " . $sql3 . "<br>" . mysqli_error($conn);
}


$sql4 = "INSERT INTO pmember (pid, mno, mname, mphone)
VALUES ('$pid11', '$m3no', '$m3name', '$m3phone')";

if (mysqli_query($conn, $sql4)) {
    echo "New record created successfully4";
} else {
    echo "Error4: " . $sql4 . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
header('Location:stud1.php');

}