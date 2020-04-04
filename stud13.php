
<?php
session_start();


if(isset($_POST['submit10']))
{

$ptitle=$_POST['custId0'];


$filename = $ptitle;   
header("Content-type: application/pdf");  
header("Content-Length: " . filesize($filename)); 
  
readfile($filename); 

}
 


 if(isset($_POST['submit11']))
{

$ptitle=$_POST['custId1'];


$filename = $ptitle;   
header("Content-type: application/pdf");  
header("Content-Length: " . filesize($filename)); 
  
readfile($filename); 

}



 if(isset($_POST['submit12']))
{

$ptitle=$_POST['custId2'];


$filename = $ptitle;   
header("Content-type: application/pdf");  
header("Content-Length: " . filesize($filename)); 
  
readfile($filename); 

}


 if(isset($_POST['submit13']))
{

$ptitle=$_POST['custId3'];


$filename = $ptitle;   
header("Content-type: application/pdf");  
header("Content-Length: " . filesize($filename)); 
  
readfile($filename); 

}

 if(isset($_POST['submit14']))
{

$ptitle=$_POST['custId4'];


$filename = $ptitle;   
header("Content-type: application/pdf");  
header("Content-Length: " . filesize($filename)); 
  
readfile($filename); 

}

 if(isset($_POST['submit15']))
{

$ptitle=$_POST['custId5'];


$filename = $ptitle;   
header("Content-type: application/pdf");  
header("Content-Length: " . filesize($filename)); 
  
readfile($filename); 

}

 if(isset($_POST['submit19']))
{

$ptitle=$_POST['custId40'];


$filename = $ptitle;   
header("Content-type: application/pdf");  
header("Content-Length: " . filesize($filename)); 
  
readfile($filename); 

}


  ?>