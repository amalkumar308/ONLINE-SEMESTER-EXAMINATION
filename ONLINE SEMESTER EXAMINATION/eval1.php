<?php
session_start();


//include funtion.php file

require('function.php');
$con = con();

$a=0;
//here check, where "session with user_id" is set or not

if(isset($_SESSION['user_id'])){
$id=$_SESSION['user_id'];
}
else
{

//if session is not set then control goes to homepage


header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}

      $userid = $_SESSION['user_id'];

      $sql = "SELECT * FROM `faculty` WHERE user_id = '$id'";
          $result = mysqli_query($con,$sql);
          $row = $result->fetch_array();
     

      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 0) 
      {  $a=0;
         
        // $c="No data found";
        // echo "<script>document.getElementById('alert').innerHTML=$c;</script>";
         
      }   
      
      $exam_id=$_POST['exam_id'];

$sql = "SELECT * FROM exam_part WHERE exam_id = '$exam_id'";
      $result1 = mysqli_query($con,$sql);
      $a=1;
   

   


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
  <script>

  function  show()
  {
        var a=document.getElementById("dipartment").value;

        document.getElementById("c").style="display:block;";
       
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
       <li class="nav-item active"><a class="nav-link" href="faculty.php" ><font size="2" color="hotpink"><b>Home</b></font></a></li>
        <li class="active" data-toggle="modal" style="color:#ccc" data-target="#add_blog_modal"><a href="exam_add.php"><font size="2" color="hotpink"><b>Create Examination</b></font></a></li>
        <li class="active"><a href="eval.php"><font size="2" color="hotpink"><b>Evaluate</b></font></a></li>
        
        
        <li></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right " style="background-color: green;">
         <li class="active" style="background-color:inverse"><a href="#"> <font size="2" color="hotpink"><b>Welcome <?php echo "$row[3]";?></b></font></a></li>
         
         <li class="active" style="background-color:inverse"><a href="logout.php"><font size="2" color="red"><span class="glyphicon glyphicon-off" style="font-size:15px;"></span></font><font size="2" color="hotpink"><b> &nbsp;&nbsp;&nbsp;Log Out</b></font></a></li>
          
         </ul>
    </div>
      </div>
  </nav> 

	<br><br>

	<!-- End-->
	
	
               

  <div class="div2">
   
		<div class="container"  >
			<div class="col-sm-12" >
				<h2 style="opacity:0.9;"><marquee><label align="center" style="color:#FFFFFF;">Online Examination Portal,Admin section</label></marquee></h2>
				<hr>
				

	

 				<div style="color:#FFFFFF ;border-radius: 20px; padding: 20px 30px 0px 30px;background-color:#071d36;opacity: 0.8; ">
				      <h4 style="border-radius: 10px;background-color:#00FF00;border: 5px solid #006400;width:300px;" align="">
							     <label align="center" style="color:#000080"> 
								      <b>Faculty <?php echo "$row[3]";?>  </b>									
							     </label>
				      </h4>
             
              <div id="c" style="display:;">
					       <?php
                        if($a==1)
                        {
                        $a=0;
                        echo "<table class='table' border='1' align='center'>";
                        echo "<caption style='color:#D7DA0F '>$row[2] </capiton>";
                          echo "<tr style=' border-left: 6px solid red; color:#D7DA0F ' align='center'><th>Exam Id</th><th>Registration No.</th><th>Evaluate</th></tr>";
                            while($row1=$result1->fetch_array())
                           {
                         
                            echo "<tr style=' border-left: 6px solid red; color:#D7DA0F ' align=''><td>$row1[0]</td><td>$row1[1]</td><td>
                            <form id='loginform' class='form-horizontal' role='form' action='eval2.php' method='post'>
                              <input type='text' value='$row1[0]' style='display:none;' id='exam_id' name='exam_id'>
                              <input type='text' value='$row1[1]' style='display:none;' id='reg' name='reg'>
                              <div class='form-group' >
                              <div class='col-md-4'>
                              
                              </div>
                                <input type='submit' id='btn-login' action='#' class='btn btn-success' onclick=''>
                              </div>
                            
                            </form></td></tr>";
                           }
                              
                       echo "</table>";

                      }
                      ?>
            </div>
					
            <br><br><br>
				</div>
      </div>
    </div>
  </div>








<footer class="container-fluid">
	<div style="text-align:center;padding:1%;font-weight:bold;color:hotpink">
		devloped By Choubeyji &copy; 2018
	</div>
</footer>


</body>
</html>