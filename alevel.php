﻿<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['pin'])&&$_COOKIE['serial']){
	
$pin=$_COOKIE['pin'];
$serial=$_COOKIE['serial'];

}
else{
	 header('location:onlineform.php');
      exit;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>FLEXINTEL DESIGNS</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta charset="utf-8" />
	<meta name="keywords" content="FLEXINTEL DESIGNS :: ALEVEL. Attainment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script> 
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<script src="js/jquery.js"></script>

	<link href="css/style1.css" rel="stylesheet" type="text/css" media="screen">

	 <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
		<!-- gallery -->
	<link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">



</head>

<body>
	
	<script type="text/javascript"> 
            $(document).on("click", ".open-Delete", function () {
                                  var myValue = $(this).data('id');

                                        swal({
                                         title: "Are you sure?",
                                         text: "You will not be able to recover this entry!",
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
                                                      data: { Deletecourse:myValue },
                                                      success: function( result ) {
                                                      if(result=="ok"){
                                                                    swal({title: "Deleted!", text: "Your saved entry has been deleted.", type: "success"},
                                                          function(){
                                                                          var pin='<?php echo$pin ?>';
 		                                                                  var serial='<?php echo$serial ?>';
 		                                                                 var optionValue='xuls';
 		                                                                 $.ajax({
 		 	                                                                      type :'POST',
                                                                                    url: "process.php",
                                                                                   data: {loadcourse:optionValue,userpin:pin,userserial:serial},
                                                                                success: function(result) { 
                                                                                	                        if (result=='No') {
                                                                                	                        	                $("#errors1").html(""); 
                                                                                	                        	                $("#errors2").html(""); 
                                                                                	                        	           } 
                                                                                                             else {
                                                                                                                      $("#errors1").html(result);
                                                                                                                       $("#errors2").html("<a  class='btn btn-default' href='employment.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");

                                                                                                                   }
                                                                                                           }
                                                                                  }); 
                                                                     }
                                                                      );                               	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "Your submission is safe :)", "error");
                                             }
                                         });
                                       
                                       });
                </script>          

	<script type="text/javascript">
 $(document).on("click", ".Alevel", function () {
      var name = document.getElementById('name').value;
       var froms = document.getElementById('froms').value;
      var tos = document.getElementById('tos').value;
      var institution = document.getElementById('institution').value;
      var pin = document.getElementById('pin').value;
     var serial = document.getElementById('serial').value;
      var education = document.getElementById('education').value;
   ;

			$.ajax ({
            type : 'POST',
               url: "process.php",
             data: {course:name,fromdates:froms,todates:tos,myinstitution:institution,userpin:pin,userserial:serial,myeducation:education},              
          success: function(result) {
                         
          	                         $("#errors1").html(result);
          	                         $("#errors2").html("<a  class='btn btn-default' href='employment.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");
                                     swal({title: "Successful!", text: "Course Information Saved!!.", type: "success"});
  
                                        }
                });
				
	}); 
	
	$(document).ready(function(){
 		
 		var pin='<?php echo$pin ?>';
 		var serial='<?php echo$serial ?>';
 		var optionValue='xuls';
 		 $.ajax({
 		 	    type :'POST',
                  url: "process.php",
                 data: {loadcourse:optionValue,userpin:pin,userserial:serial},
               success: function(result) {               
                                           
                                             if (result=='No') {                                      	
                                                         
                                                     } 
                                           else {
                                                       $("#errors1").html(result);
                                                       $("#errors2").html("<a  class='btn btn-default' href='employment.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");

                                                 }
                                          }
                });  
         });

 </script>
 
 <script type="text/javascript">
 $(document).on("click", ".Del", function () {
             	                        
          	                         $("#name").val("");
          	                         $("#froms").val("");
          	                         $("#tos").val("");
          	                         $("#institution").val("");            
				
	}); 
	
	

 </script>

 
		<!-- header -->
	<section class="w3layouts-header py-2">
		<div class="container">
			  <!-- header -->
        <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                    <h>
                        <a class="navbar-brand" href="index.php">
                FLEXINTEL DESIGNS   
                        </a>
                    </h>
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item active  mr-3">
                                <a class="nav-link" href="index.php">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown mr-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Application
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="biodata.php">Online Form</a>
									 <a class="dropdown-item" href="#">Application Status</a>
									 <a class="dropdown-item" href="#">Application List</a>
									 <a class="dropdown-item" href="onlineform.php">Print Form</a>
									 <a class="dropdown-item" href="login.php"><i class="fa fa-lock"></i>&nbsp;Login</a>                             
                                </div>
                            </li>
                            <li class="nav-item  mr-3">
                                <a class="nav-link" href="#">Registration</a>
                            </li>
							 <li class="nav-item  mr-3">
                                <a class="nav-link" href="#">Results</a>
                            </li>
                            
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="login.php" style="font-weight: bold; font-family: 'Comic Sans MS'; color: #5261D1;">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
        </header>
        <!-- //header -->
		</div>
	</section>
	<!-- //header -->
	<!-- banner -->
	<section class="banner-1">
		
	</section>
		<!-- //banner -->
<!-- gallery -->
	<div class="agileits-services text-center py-5">
		<div class="container py-md-4 mt-md-3">
			<h3 class="heading-agileinfo">Stage 6 (A'Level Results)<span>Complete the form below </span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
			<div class="container">
	<h2></h2>		
	
	<div class="form-login"  style="width:1000px">
		<hr />
		<div class="alert alert-warning">
          <i class="fa fa-info-circle"></i>&nbsp;This stage you Enter your A'Level results in the space provided             
          <ol>
             	<li>Enter your A'Level results in space provide below</li>
             	<li>Add ,Delete  and Save A'Level results using buttons below</li>
             	<li>Your adviced not to submit more than 5 A'Level results</li>
            </ol>
                  </div>
			<hr />
	     <span id="errors1"></span>
	     <hr />
	  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Course Studied</span>
   <input type="text" class="form-control" name="applicantphone" id="name" placeholder="Course Studied">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Institution</span>
   <input type="text" class="form-control" name="email" id="institution" placeholder="Place of Study">
  </div> 
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">From</span>
   <input type="text" class="form-control" name="email" id="froms" placeholder="Started">
  </div>
    <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">To</span>
   <input type="text" class="form-control" name="applicantphone" id="tos" placeholder="Finished">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Degree Class</span>
<select style='height:37px;width:100%;border:1px solid black;' name="education"  id='education' > 
            				        <option >Select Option</option>            				           
            				                          
            	      <option>Distiction</option>
                      <option>Merit</option>
                       <option>Credit</option>
                      <option>Pass</option>
                     <option>Fail</option>
                      
            				                           </select>  </div>

   
           <p>
        	<input name='serial' id='serial' type='hidden' value='<?php if(isset($serial)){echo$serial;} ?>' >
        	<input name='pin' id='pin' type='hidden' value='<?php if(isset($pin)){echo$pin;} ?>'>
           </p> 
		
		
		<hr />
		<div class="form-group">
			<button type="submit" class="Alevel btn btn-default" name="Change" value="changes">
			<span class="glyphicon glyphicon-check"></span> &nbsp;Save School
			</button> 
			<button type="submit" class="Del btn btn-default" >
			<span class="glyphicon glyphicon-trash"></span> &nbsp;Clear
			</button>			
		</div> 
		<?php if(isset($_GET['ids'])){
	
                   $direction="declaration.php";                 

           }
       else{$direction="employment.php";  }
?>	
	<div class="form-group">			
			<a type="button" class="Del btn btn-default" href="previousschool.php">
			<i class="fa fa-arrow-left"></i> &nbsp; Previous
			</a> 
				
			<a type="button" class="Del btn btn-default" href="<?php echo$direction  ?>">
			<i class="fa fa-arrow-right"></i> &nbsp; Next
			</a> 
		</div> 
	</div>	
	              				                                   				                                         				                          				        		
</div>	
				
					
			</div>
		</div>
	</div>
	<!-- //gallery -->

<!-- Footer -->
	<footer class="footer-section py-5">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 footer-grids">
					<h3>Get in touch</h3>
					<p>Flexintel Designs, Flexintel Digital Website Designs Solutions.</p>
					<p class="my-2">Nairobi,Kenya</p>
					<p class="phone">phone: +254 768 822 114</p>
					<p class="phone my-2">Fax: +254 724 580 949</p>
					<p class="phone">Mail:
						<a href="mailto:flemunto@gmail.com">flemunto@gmail.com</a>
					</p>
				</div>
				<div class="col-lg-4 footer-grids">
					<h2>Latest News</h2>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/logo70.png" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/logo71.png" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/logo72.png" class="img-fluid" alt="Responsive image">
						</a>
					</div>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/logo73.png" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/logo74.png" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/logo75.png" class="img-fluid" alt="Responsive image">
						</a>
					</div>
				</div>
				<div class="col-lg-4 footer-grids">
					<h3>Twitter feed</h3>
					<ul class="w3agile_footer_grid_list">
						<li>Am failing to use the login system. I need an intergrated Login Portal
							<a href="#">www.flexintel.co.ke</a> @James.
							<span>
								<i class="fab fa-twitter"></i> 02 days ago</span>
						</li>
						<li>This is nice and i like this portal
							<a href="#">www.flexintel.co.ke</a> @felix_mutai.
							<span>
								<i class="fab fa-twitter"></i> 03 days ago</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- //Footer -->
<!-- copyright -->
	<section class="copyright-w3layouts py-xl-4 py-3">
		<div class="container">
			<p>© 2021 Flexintel Designs . All Rights Reserved
			</p>
			<ul class="social-nav footer-social social two text-center mt-2">
					<li>
						<a href="#">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-twitter" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-instagram" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-pinterest" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
		</div>
	</section>	<!-- //copyright -->
	<!-- Modal -->
	
	<!-- js -->
	<!-- <script src="js/jquery-2.2.3.min.js"></script> -->	<!-- //js-->
		<script src="js/smoothbox.jquery2.js"></script>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	 <script src="js/bootstrap.js"></script>
</body>

</html>