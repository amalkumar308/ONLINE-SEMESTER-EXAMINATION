<?php
session_start();
require('function.php');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

      // username and password sent from form 
  
      $con = con();
    //   $pre=mysqli_real_escape_string($con,$_POST['pre']);
     $pre=$_POST['pre'];

    
     if($pre==2)
     {
        $myusernamef = mysqli_real_escape_string($con,$_POST['user_idf']);
      $mypasswordf = mysqli_real_escape_string($con,$_POST['passf']);

      $sql = "SELECT * FROM faculty WHERE user_id = '$myusernamef' and password = '$mypasswordf'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) 
      {
         //session_register("myusername");
         $_SESSION['user_id'] = $row['user_id'];
        
         header("location: faculty.php");
      }
      else 
      {
        // $error = "Your Login Name or Password is invalid and control goes to candidate login page";
         echo "<script>alert('invalid user fffid and password');window.location='index.php';</script>";
         die();
      }   
  }
  elseif($pre==1)
  {
       $myusernames = mysqli_real_escape_string($con,$_POST['user_ids']);
      $mypasswords = mysqli_real_escape_string($con,$_POST['passs']);echo "<script>alert('$myusernames $mypasswords');</script>";
      
       $sql = "SELECT * FROM student WHERE reg_no = '$myusernames' and password = '$mypasswords'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      echo "<script>alert('$myusernames $mypasswords $count');</script>";
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) 
      {
         //session_register("myusername");
         $_SESSION['user_id'] = $row['reg_no'];
        echo "<script>alert('invalid use');</script>";
         header("location: student.php");
      }
      else 
      {
        // $error = "Your Login Name or Password is invalid and control goes to candidate login page";
         echo "<script>alert('invalid user id and password');window.location='index.php';</script>";
         die();
      }   


  }
     
}
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico">
	<!-- style for document-->
<style type="text/css">
           
            * {
                margin: 0;
                padding: 0;
            }
            body {
                font-family: Calibri;
            }
            h3
            {
            	font-weight: 300;
                font-size: 4em;
                color: #fff;
                background-color: khaki;
                padding: 10px 0 20px 10px;
                margin-bottom: 50px;
                 border-radius: 30px
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
	<title>Online Portal</title>
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
<script>
	function  show()
	{
		
				document.getElementById("c").style="display:block;";
				document.getElementById("d").style="display:none;";
	}
	function  show1()
	{
				document.getElementById("d").style="display:block;";
				document.getElementById("c").style="display:none;";
				
	}
	function  hide()
	{
				document.getElementById("d").style="display:none";
				document.getElementById("c").style="display:none;";
				
	}

</script>

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
<br>
	<div class="modal-body">
        
          <div class="form-group" align="center">
            <h3 style="opacity:0.5;"><label for="blog title" align="center" style="color:black;"><img src='background/12.webp' alt='Smiley face' height='100' width='100'> 
            	<br><br>MNNIT ALLAHABAD ONLINE EXAMINATION PORTAL. <br><br>
</label>
            <div style="display:none;"><marquee><?php echo $notice; ?> </marquee></div></h3>
          </div>    
      </div>


	<!-- End-->
	<h2 style="opacity:0.9;"><marquee><label align="center" style="color:#FFFFFF;">MNNIT Examination Portal</label></marquee></h2>
				<hr>
	<div class="col-sm-12" >
               <div style="color:#FFFFFF ;border-radius: 20px;background-color:#071d36; ">
               	<br>               				
               	<div class="container-fluid" style="margin-top: 0px">
		<!--Slider--> 
							
               					 <div id="sliderFrame" class="col-sm-1 container-fluid"> 
               					 		<div align="center"> Photo Gallery</div>
                   						<div id="slider" style="opacity: 1; border-radius: 10px;width:500px;">
										<img src="background/741/01.jpg" alt="" />
										<img src="background/741/02.jpg" alt="" />
                    					<img src="background/741/03.jpg" alt="" />
                      					<img src="background/741/04.jpg" alt="" />
                      					<img src="background/741/05.jpg" alt="" />
                         				</div>
                         				<br><br>
    							 </div>
               		   			<div align="center" width="700px" bg-color="red"class="col-sm-2 container-fluid">
               					Notice               				
               					<marquee direction="up" scrollamount="3">
               						<?php $con = con();$sql="SELECT notice FROM `notice`";$result = mysqli_query($con,$sql);
               						echo "<br><br><br><br><br><br><br><br><br>";
               					 while($row3=$result->fetch_array())
                             		echo "* $row3[0] <br><br>";
                          
               					     ?>
								</marquee>
               		   			</div>

               					 		
                   					
               					   
        							<div id="signupbox" class="mainbox col-sm-3 container-fluid">
        								 <div  class="form-group">
									         <div class="col-sm-12 controls">
									                <input type="button" id="btn-login" value="student login"class="btn btn-success" onclick="show()"></a>
									                <input type="button" id="btn-login"  value="faculty login" class="btn btn-success" onclick="show1()"></a>
									           		<input type="button" id="btn-login" value="hide login" class="btn btn-success" onclick="hide()"></a>
									         
									          </div>
									          <br>
									     </div>
<br>
        								<div id="c" style="display:none; ">
                						<div class="panel panel-info" style="border-radius: 70px;">
                 							

                   							<div style="padding-top:20px" class="panel-body" align="center">
                   								<font color="hotpink" size="4"> <b>Student login</b></font>
          										<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          										<form id="loginform" class="form-horizontal" role="form" action="#" method="post">
          											     <hr>
            									<div style="margin-bottom: 25px" class="input-group">
             									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input type="text" value="1" style="display:none;" id="pre" name="pre">
              									<input id="user_id" type="text" class="form-control" name="user_ids" value="" placeholder="Registraion No.">                                        
            									</div>

									            <div style="margin-bottom: 25px" class="input-group">
									              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									              <input id="login-password" type="password" class="form-control" name="passs" placeholder="Password">
									            </div>
									            <div style="margin-top:10px" class="form-group">
									              <!-- Submit Button -->
									                <div class="col-sm-12  controls">
									                <input type="submit" id="btn-login" action="login_backend.php" class="btn btn-success"></a>
									                </div>
									            </div>
									            <hr>
         										</form>
       										 </div>                     
      									</div>	
    								 </div>
    								 <div id="d" style="display:none;">
                						<div class="panel panel-info" style="border-radius: 70px;" >
                							
                   							<div style="padding-top:20px" class="panel-body" align="center">
                   								<font color="hotpink" size="4"> <b>Faculty login</b></font>
          										<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          										<form id="loginform" class="form-horizontal" role="form" action="#" method="post">
          											<hr>
            									<div style="margin-bottom: 25px" class="input-group">
             									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input type="text" value="2" style="display:none;" id="pre" name="pre">
              									<input id="user_idf" type="text" class="form-control" name="user_idf" value="" placeholder="User Hnddle">                                        
            									</div>

									            <div style="margin-bottom: 25px" class="input-group">
									              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									              <input id="login-passwordf" type="password" class="form-control" name="passf" placeholder="Password">
									            </div>            

									            <div style="margin-top:10px" class="form-group">
									              <!-- Submit Button -->

									              <div class="col-sm-12 controls">
									                <input type="submit" id="btn-login" action="login_backend.php" class="btn btn-success"></a>
									              </div>
									            </div>
									          <hr>

         										</form>
       										 </div>                     
      									</div>	
    								 </div>
    								</div>
               				
               				   
     </div>
     </div>
     </div>

<hr>
                <div class="div2">
   
		<div class="container"  >
			<div class="col-sm-12" >
				
				<h4 style="opacity: 0.8;" align="center"><label align="center" style="color:#D7DA0F">ABOUT</label></h4>
				
				<div style="color:#FFFFFF ;border-radius: 20px;background-color:#071d36;;opacity: 0.7; "><br>
				
					<br>
					<p > This Plateform provide Online examnetion system in MNNIT</p> 

					<p > Like</p> 

					<p >End sem examination internal Queses</p> 

 

					<p > Also prvide facility to add question papare</p> 

					<p > </p> 
<br><br>
				
				</div>
			<!--detail about hostels-->

				</div>
	</div>
</div>

<br><br>


<footer class="container-fluid">
	<div style="text-align:center;padding:1%;font-weight:bold;color:indigo">
		devloped By Choubeyji &copy; 2018
	</div>
</footer>


</body>
</html>