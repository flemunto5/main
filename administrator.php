<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['pin'])&&$_COOKIE['serial']){
	
$pin=$_COOKIE['pin'];
$serial=$_COOKIE['serial'];

 $sqluser ="SELECT * FROM Administrator WHERE Email='$serial' && Password='$pin' ";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	      {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			  
  
  	     }
}else{
	 header('location:login.php');
      exit;
}
?>