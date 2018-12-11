<?php
require('function.php');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

      // username and password sent from form 
  
      $con = con();
      
       $myusername = mysqli_real_escape_string($con,$_POST['user_id']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
     
      $sql = "SELECT * FROM admin WHERE user_id = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) 
      {
         //session_register("myusername");
        session_start();
         $_SESSION['user_id'] = $row['user_id'];
        
         header("location: admin.php");
      }
      else 
      {
        // $error = "Your Login Name or Password is invalid and control goes to candidate login page";
         echo "<script>alert('invalid user id and password');window.location='admin_login.php';</script>";
         die();
      }   
     
}
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico">
<style type="text/css">
            
            * {
                margin: 0;
                padding: 0;
            }
            body {
                font-family: Calibri;
            }
            h3
            { font-weight: 300;
                font-size: 4em;
                color: #fff;
                background-color: #071d36;
                padding: 10px 0 0px 10px;
                margin-bottom: 1px;
                border: 1px solid goldenrod;
                 border-radius: 15px;
            }
            h2 {

                font-weight: 300;
                font-size: 4em;
                color: #fff;
                background-color: #071d36;
                padding: 10px 0 0px 10px;
                margin-bottom: 1px;
                border: 6px solid red;
                 border-radius: 30px;
            }

            h4 {

                font-weight: 300;
                font-size: 4em;
                color: #fff;
                background-color: #071d36;
                padding: 10px 0 0px 10px;
                margin-bottom: 1px;
                border: 1px solid goldenrod;
                 border-radius: 20px;
            }
            p {

                
               
                color: #fff;
               
                padding: 10px 30px 0px 30px;
                margin-bottom: 1px;
                
                
            }
             
             .mySlides {display:none;}        
            
        </style>
	<title>Mnnit Hostel</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	
	<link href="./assets/css/font-awesome.css" rel="stylesheet">
	<link href="./assets/css/blog_page.css" rel="stylesheet">
	<link href="./assets/fonts/font.css" rel="stylesheet">
	<link href="./assets/css/index.css" rel="stylesheet">
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
	<script src="themes/1/js-image-slider.js" type="text/javascript"></script>

    <link href="generic.css" rel="stylesheet" type="text/css" />
	<script src="./assets/js/jquery.min.js"></script>
	
	<script src="./assets/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url(background/a3.jpg) ;background-repeat:no-repeat;background-attachment: fixed;">

	<div style="background-color:none;">
	<!-- Static navbar -->
	<br>
<nav class="navbar-fixed-top navbar navbar-dark bg-primary " style="background-color: green;" role="navigation">
     <div class="container" hight="100">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color: grey;">
        <span class="icon-bar" style="background-color: red;"></span>
        <span class="icon-bar" style="background-color: red;"></span>
        <span class="icon-bar" style="background-color: red;"></span> 
      </button>

        <a class="navbar-brand" href="#"><?php echo "<img src='background/12.webp' alt='Smiley face' height='30' width='30'>";?></a>
      </div>
      
     <div class="collapse navbar-collapse active" id="myNavbar">
      <ul class="nav navbar-nav mr-auto" style="background-color: green; color:peachpuff;">
        <li class="nav-item active"><a class="nav-link" href="index.php" ><font size="2" color="hotpink"><b>Home</b></font></a></li>
        
        <li></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right " style="background-color: green;">
         
         <li class="active" style="background-color:inverse"><a href="admin_login.php"><font size="2" color="red">
          <span class="glyphicon glyphicon-log-in" style="font-size:15px;"></span>
         </font> <font size="2" color="hotpink"><b> &nbsp;&nbsp;&nbsp;Admin Login</b></font></a></li>
         </ul>
    </div>
      </div>
  </nav> 

	<br><br>

	<!-- End-->
	
	
               

                <div class="div2">
   
		<div class="container"  >
			<div class="col-sm-12" >
				
				

			

<h4 style="opacity: 1; border-radius: 10px;width:400px;" align="center"><label align="center" style="color:#D7DA0F">Official Login</label></h4>
 				<div style="color:#FFFFFF ;border-radius: 20px; padding: 20px 30px 0px 30px;background-color:#071d36;opacity: 0.8; ">
				

            <div class="container">    
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">
                <div class="panel panel-info">
                 <div class="panel-heading">
                  <div class="panel-title">Fill Appropriate Details</div>
                     
                   </div>  


                   <div style="padding-top:30px" class="panel-body" >


          <form id="loginform" class="form-horizontal" role="form" action="admin_login.php" method="post">

            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="user_id" type="text" class="form-control" name="user_id" value="" placeholder="User Id">                                        
            </div>

            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="login-password" type="password" class="form-control" name="pass" placeholder="Password">
            </div>             

            <div style="margin-top:10px" class="form-group">
              <!-- Submit Button -->

              <div class="col-sm-12 col-sm-offset-4 controls">
                <input type="submit" id="btn-login" action="#" class="btn btn-success"></a>
              </div>
            </div>
            <hr>
          <!--Candidate SignUp Page Link -->
          </form>     



        </div>                     
      </div>
<br>

                     </form>

                   </div>
                    </div>

  <br><br>
<br>

 
                    </div> 
                   </div>
                    </div>



<br><br>
				</div>




<br>

<hr>

<footer class="container-fluid">
	<div style="text-align:center;padding:1%;font-weight:bold;color:#D7DA0F">
		devloped By Choubeyji &copy; 2018
	</div>
</footer>


</body>
</html>