﻿<?php 
session_start();
include("db_connect.php");
include_once 'functions.php';
include_once 'microprocessor.php';


if(isset($_COOKIE['email'])&&$_COOKIE['password']){
	
$email = $_COOKIE['email'];
$password = $_COOKIE['password'];

 $sqluser ="SELECT * FROM users WHERE email='$email' && password='$password' ";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	      {
              $email = $found['email'];
		      $MSISDN = $found['MSISDN'];
	     }
}else{
	 header('location:login.php');
      exit;
   }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FLEXINTEL DESIGNS Account</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- BOOTSTRAP STYLES-->
    <link href="assets1/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets1/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets1/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

</head>

<body>
<script type="text/javascript"> 
            $(document).on("click", ".open-Delete", function () {
                                  var myValue = $(this).data('id');
                                   
                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to delete this submission!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, delete it!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                      	
                                         
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "process.php",
                                                      data: {deluser:myValue },
                                                      success: function(result) {
                                                      if(result=="ok"){
                                                                    swal({title: "Moved to trush!", text: "You have successfully deleted admin", type: "success"},
                                                          function(){ 
                                                                          location.reload();
                                                                          }
                                                                      );                               	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "This entry is safe:)", "error");
                                             }
                                         });
                                       
                                       });
                </script>
       
          

                </script>          


  
          
          
    <div id="wrapper" >
         <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:aqua;">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index">Home
                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">Logout</a> 
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation" >
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu" >
                 


                    <li class="active-link">
                        <a href="admins.php" ><i class="fa fa-desktop "></i>Back To Main Dashboard</a>
                    </li>                 
                   


                
                    
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row" style="width:40%;margin-left:1%">
                    <div class="col-lg-12 ">
                  <?php
                  if(isset($_SESSION['upload'])) {
                  	       session_destroy();
                  	?>
                  	<div class="alert alert-success">                        	
                             User has been added
                        </div>
                        <?php
				  }elseif(isset($_SESSION['error'])){
				  	          $errors=$_SESSION['error'];session_destroy();
						echo"<div class='alert alert-danger'>$errors</div>";
				  }
				  
				  else{?>
                
                        <div class="alert alert-info">
                        	
                             Enter Admin user details below.
                        </div>
                        <?php  }?>
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top" >
                                   
    <div style="float: left;margin-left:5%">              	
<form class="form-login" style="width: 100%" method="post" action="process.php">
	

  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">First Name</span>
   <input type="text" class="form-control" name="mfname" value=""  placeholder="Enter Firstname">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Surname Name</span>
   <input type="text" class="form-control" name="msname" value=""  placeholder="Enter Surname">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Phone Number</span>
   <input type="text" class="form-control" name="mphone" value=""  placeholder="Enter Phone Number">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Email</span>
   <input type="text" class="form-control" name="memail" value=""  placeholder="Enter Email">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Password</span>
   <input type="password" class="form-control" name="mpassword" value=""  placeholder="Enter Password">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Repeat Password</span>
   <input type="password" class="form-control" name="mpasswords" value=""  placeholder="Repeat Password">
  </div>

   
      	<div class="form-group">
			<button type="submit" class="btn btn-default" name="addmember" value="ghj" >
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save
			</button> 
			<button type="reset" class="btn btn-default" name="logined" id="logined">
			<span class="glyphicon glyphicon-trash"></span> &nbsp; Clear
			</button> 
		</div> 	  
        
  
</form>
    </div>                 
                     
    <div style="float:right;margin-right:5%;margin-top:-9%"> 
    	                <div class="alert alert-info">                        	
                             List of Available users in the system.
                        </div>             	
<?php
             
 $serial = $pin  = "";            
	  	
		  
		
                         $sqluser ="SELECT * FROM Administrator WHERE Email!='$serial' && Password!='$pin' ";
                                               $rget = mysqli_query($db,$sqluser);
										    $num=mysqli_num_rows($rget);
                                                if($num!=0){
                                                	                 echo"<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                         <th>SN</th>
                                                                           <th>Name</th>                                                                                                                                                           <th>Phone Number</th>
                                                                             <th>Email</th>   
                                                                             <th>Password</th>                                                                         
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";      
                                     
												                   while($foundk = mysqli_fetch_array($rget))
	                                                                 {
                                                                        $f= $foundk['Firstname'];	
                                                                        $s= $foundk['Sirname'];
                                                                        $mphone = $foundk['mphone'];
                                                                        $pass= $foundk['Password'];	
                                                                        $email= $foundk['Email'];															  
																	     $ids= $foundk['id'];
																   
																	    echo"<tr>
											
                      						           <td>$ids</td>
                                                                              <td>$f $s</td>                                                                                                                                                           <td>$mphone</td>
                                                                               <td>$email</td> 
                                                                               <td>$pass</td>                                                                            
                                                                             <td><a data-id='$ids' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
		                                                             }
                                                                    echo"</tbody>
                                                                           </table>";
												              }										
						            
                    	
							 
							 							 							                    							 
             
             
             
             ?> 
    </div>      
             </div>
             
            
              </div>
                 <!-- /. ROW  --> 
                <div class="row text-center pad-top">
                 
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                         
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="settings.php" >
 <i class="fa fa-gear fa-5x"></i>
                      <h4>Settings</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="messages.php" >
 <i class="fa fa-envelope-o fa-5x"></i>
                      <h4>Messages</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="grade.php" >
 <i class="fa fa-bell-o fa-5x"></i>
                      <h4>Grades</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="staticprice.php" >
 <i class="fa fa-rocket fa-5x"></i>
                      <h4>Checkout</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="registration.php" >
 <i class="fa fa-user fa-5x"></i>
                      <h4>Register User</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                  
              </div>   
                  <!-- /. ROW  -->    
                        <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                        <div class="alert alert-danger">
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer" style="background-color:white">
      
    
            <div class="row">
                <div class="col-lg-12" style="color:black ">
                    © 2021 Flexintel Designs. All Rights Reserved
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets1/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets1/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets1/js/custom.js"></script>
    
   
</body>
</html>
