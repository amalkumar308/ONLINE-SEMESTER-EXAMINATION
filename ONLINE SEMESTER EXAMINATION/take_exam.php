<?php
session_start();


//include funtion.php file

require('function.php');
$con = con();


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
		
			$sql = "SELECT * FROM `student` WHERE reg_no = '$id'";
      		$result = mysqli_query($con,$sql);
      		$row = $result->fetch_array();

  

     
      $sql = "SELECT * FROM exam WHERE department = '$row[2]' AND branch='$row[3]' AND sem='$row[4]'";
      $result1 = mysqli_query($con,$sql);
    $data = $result1->fetch_array();
      
      $count = mysqli_num_rows($result1);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      


        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {        
                     $t=$_POST["t"];
                    
                     if($t==3)
                     {
                    $exam_id= mysqli_real_escape_string($con,$_POST['exam_id']);
                    $pass = mysqli_real_escape_string($con,$_POST['pass']);
            
                    $sql = "INSERT INTO exam_part (exam_id,user_id)
                            VALUES ('$exam_id','$id')";
                            $ins_res = $con->query($sql); 
                   
                  
                     // echo "<script>alert($exam_id,$pass,$type','$marks','$dipartment','$branch','$sem')</script>"
                    $sql = "SELECT * FROM exam WHERE exam_id = '$exam_id' AND password='$pass'";
                    $result1 = mysqli_query($con,$sql);
                   
                    $count = mysqli_num_rows($result1);
      
                        
                      
                        if($count == 0) 
                        {  
                            echo "<script>alert('invalid password');window.location='student.php';</script>";
                        } 



                     
                    }



           
            //echo "<script>alert('$exam_id$idd$anss$t');</script>";
            
                      
                      if($t==1)
                      {


                          $idd=$_POST['id'];
                          $exam_id=$_POST['eid'];
                          $anss=trim($_POST['an']);

                          

                            $sql1 = "SELECT * FROM `oanswer` WHERE exam_id = '$exam_id' AND q_id='$idd' AND user_id='$id'";
                            $result4 = mysqli_query($con,$sql1);
                            $count1 = mysqli_num_rows($result4);
      
                        
                      
                        if($count1 == 0) 
                        {  
                            $sql = "INSERT INTO oanswer (user_id,exam_id,q_id,a)
                            VALUES ('$id','$exam_id','$idd','$anss')";
                            $ins_res = $con->query($sql); 
                        }
                         else
                        {
                          echo "<script>alert('Already answerd')</script>";
                        }  

                            
                              $ob=$idd;

                      }

                      if($t==2)
                      {
                          $idd=$_POST['id'];
                        $exam_id=$_POST['eid'];
                        $anss=trim($_POST['an']);
                        $sql1 = "SELECT * FROM `sanswer` WHERE exam_id = '$exam_id' AND q_id='$idd' AND user_id='$id'";
                            $result4 = mysqli_query($con,$sql1);
                            $count1 = mysqli_num_rows($result4);
                        
                           if($count1 == 0) 
                        {  
                            $sql = "INSERT INTO sanswer (user_id,exam_id,q_id,a)
                            VALUES ('$id','$exam_id','$idd','$anss')";
                            $ins_res = $con->query($sql); 
                            
                        }
                        else
                        {
                          echo "<script>alert('Already answerd')</script>";
                        }



                      
                            $sb=$idd;
                      }

   $sql1 = "SELECT * FROM `objective` WHERE exam_id = '$exam_id'";
                      $result1 = mysqli_query($con,$sql1);
                      


                       $sql1 = "SELECT * FROM `subjective` WHERE exam_id = '$exam_id'";
                      $result2 = mysqli_query($con,$sql1);

                          
                     
        }





         


   


?>

<!DOCTYPE html>
<html lang="en">
<head>
	
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
                padding: 10px 10px 10px 10px;
                margin-bottom: 1px;
                border: 1px solid goldenrod;
                 border-radius: 15px;
            }
            h2 {

                font-weight: 300;
                font-size: 4em;
                color: #fff;
                background-color: #071d36;
                padding: 10px 10px 10px 10px;
                margin-bottom: 1px;
                border: 6px solid red;
                 border-radius: 30px;
            }

            h4 {

                font-weight: 300;
                font-size: 4em;
                color: #fff;
                background-color: #071d36;
                padding: 10px 10px 10px 10px;
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
	<title>Mnnit</title>
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


var countDownDate = new Date("Nov 22, 2018 21:45:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("time").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("time").innerHTML = "EXPIRED";
    window.location='student.php';
  }
}, 1000);













 var f,f1;

 function set(n)
 {
  f=n;
 }
 function set1(n)
 {
  
  f1=n;
 }

 function  obshow()
  {
  
        document.getElementById("o").style="display:block;";
      document.getElementById("s").style="display:none;";
       
  }
  function  subshow()
  {
      document.getElementById("s").style="display:block;";
        document.getElementById("o").style="display:none;";
        
  }

  function snext(n)
  {
    
    if(n<f1)
    {
    document.getElementById("s"+n).style="display:none;"
    n++;
  //  alert(n);
    document.getElementById("s"+n).style="display:block;";
    }
  }
  function sprev(n)
  {
    
    if(n==1)
    {

    }
    else
    {
       document.getElementById("s"+n).style="display:none;"
    n--;
 
    document.getElementById("s"+n).style="display:block;";
    }
  }



  function next(n)
  {
    
    if(n<f)
    {
    document.getElementById(n).style="display:none;"
    n++;
  //  alert(n);
    document.getElementById(n).style="display:block;";
    }
  }
  function prev(n)
  {
    
    if(n==1)
    {

    }
    else
    {
       document.getElementById(n).style="display:none;"
    n--;
 
    document.getElementById(n).style="display:block;";
    }
  }



function end()
{
  window.location='student.php';
}
  
  </script>
</head>
<body style="background-image:url(background/a3.jpg) ;background-repeat:no-repeat;background-attachment: fixed;">

	<div style="background-color:none;">
	<!-- Static navbar -->
	<br>




	<br><br>

	<!-- End-->
	
	
               
  <div class="div2">
   
    <div class="container"  >
      <div class="col-sm-12" >
        <h2 style="opacity:0.9;" align="center"><label align="center" style="color:#FFFFFF;"><?php echo " Exam Id: $exam_id, Exam Type: $data[2] $row[2] $row[3] $row[4]";?></label></h2>
        <hr>
        

  

        <div style="color:#FFFFFF ;border-radius: 20px; padding: 20px 30px 0px 30px;background-color:#071d36;opacity: 0.8; ">
             <div id="time" class="col-sm-4 controls" style="border-radius: 10px;background-color:mediumvioletred;border: 5px solid #006400;"></div>
             <br><br> <div class="col-sm-10 col-sm-offset-1" id="a">
                <div  class="form-group">
                           <div class="col-sm-12 controls" align="center" style="border-radius: 10px;background-color:mediumvioletred;border: 5px solid #006400;">
                            <input type="button" style="margin:10px;" id="btn-login" value="Objective Section"class="btn btn-primary btn-lg" onclick="obshow()">
                                  <input type="button" style="margin:10px;" id="btn-login"  value="Subjective Section" class="btn btn-primary btn-lg" onclick="subshow()">
                                
                           
                            </div>
                          
                            
                      

                             <br><br>
                       <br><br>
                       <div id="o" style="display:">

                            <?php
                        $co=0;
                            
                            while($row1=$result1->fetch_array())
                           {
                            if(isset($row1[0]))
                        {
                          $co++;
                              echo "<br><div id='$row1[1]' style='display:none;'><form action='#' method='post'>
                               <input type='text' value='1' style='display:none;' id='t' name='t'>
                               <input type='text' value='$row1[1]' style='display:none;' id='id' name='id'>
                               <input type='text' value='$exam_id' style='display:none;' id='eid' name='eid'>
                              <div class='col-sm-12 controls' align='left' style='border-radius: 10px;background-color:blue;border: 5px solid #006400;'>
                                <div style='margin-left:40px'><h3>Q:  $row1[2]</h3></div><br>";
                                  echo "<div style='margin-left:100px'>";
                                      echo "<h4><input type='radio' name='an' id='an' value='A' onclick='chengecolor(this)' style='border: 0px;width: 7%;height: 1.5em;'>A: $row1[3]</h4>
                                            <h4><input type='radio' name='an' id='an' value='B' onclick='chengecolor(this)' style='border: 0px;width: 7%;height: 1.5em;'>B: $row1[4] </h4>
                                            <h4><input type='radio' name='an' id='an' value='C' onclick='chengecolor(this)' style='border: 0px;width: 7%;height: 1.5em;'>C: $row1[5]</h4>
                                            <h4><input type='radio' name='an' id='an' value='D' onclick='chengecolor(this)' style='border: 0px;width: 7%;height: 1.5em;'>D: $row1[6] </h4>";
                                            if($row1[7]!="")
                                              echo "<h4><input type='radio' name='$row1[1]' id='e$row1[1]' value='E' onclick='chengecolor(this)' style='border: 0px;width: 7%;height: 1.5em;'>E: $row1[7]</h4>";
                               echo "</div><br>
                                <input type='button' id='btn-login'  value='Prev' class='btn btn-success col-sm-offset-3' onclick='prev($row1[1])'> 
                               <input type='submit' id='btn-login' value='submit' name='su' class='btn btn-success col-sm-offset-2' onclick=''>
                                <input type='button' id='btn-login' value='Next' class='btn btn-success col-sm-offset-2' onclick='next($row1[1])'><br><br><br>
                                     </div></form></div>";

                                     if($row1[1]==1)
                                     {
                                      echo "<script>document.getElementById($row1[1]).style='display:block';</script>";
                                     }
                                     else
                                     {
                                      echo "<script>document.getElementById($ob).style='display:block';</script>";
                                     }
                              
                           
                        }
                          }
                              echo "<script>set1($co);</script>";  
                      
                      ?>
                         
                       </div>

                            <div id="s" style="display:none">
                                
                              <?php
                       
                            $co1=0;
                            while($row2 = $result2->fetch_array())
                           {
                            if(isset($row2[0]))
                        {
                          $co1++;
                              echo "<br><div id='s$row2[1]' style='display:none;'><form action='#' method='post'>
                                <input type='text' value='2' style='display:none;' id='t' name='t'>
                               <input type='text' value='$row2[1]' style='display:none;' id='id' name='id'>
                               <input type='text' value='$exam_id' style='display:none;' id='eid' name='eid'>
                              <div class='col-sm-12 controls' align='left' style='border-radius: 10px;background-color:blue;border: 5px solid #006400;'>
                                <div style='margin-left:40px'><h3>Q$row2[1]:  $row2[2]</h3></div><br>";
                                  echo "<div style='margin-left:100px'> Wright Answer";
                                      echo "<h4><textarea rows='4' cols='50' style='color:red;' class='form-control' name='an' id='an'>
                                                            
                                                              </textarea></h4>";
                               echo "</div><br>
                                <input type='button' id='btn-login'  value='Prev' class='btn btn-success col-sm-offset-3' onclick='sprev($row2[1])'>
                               <input type='submit' id='btn-login' action='#' name='sub' class='btn btn-success col-sm-offset-2'>
                                <input type='button' id='btn-login' value='Next' class='btn btn-success col-sm-offset-2' onclick='snext($row2[1])'><br><br><br>
                                     </div></form></div>";

                                     if($row2[1]==1)
                                     {
                                      echo "<script>document.getElementById('s$row2[1]').style='display:block';</script>";
                                     }
                                    
                              
                           
                        }
                          }
                        echo "<script>set1($co1);</script>";          
                    
                      ?>
                    </div>  
              
                  </div><br><br>
                  <div>  
                  <br><br><br>
                  <input type="button" id="btn-login" value="final submit" class="btn btn-success col-sm-offset-5" onclick="end();">
              </div></div>
              <br>
            <br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
            <br><br><br>
             
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