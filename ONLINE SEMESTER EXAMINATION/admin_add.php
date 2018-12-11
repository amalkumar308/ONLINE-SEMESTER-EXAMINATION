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
    
      $sql = "SELECT * FROM `admin` WHERE user_id = '$id'";
          $result = mysqli_query($con,$sql);
          $row = $result->fetch_array();


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    //fetching data from form
    $name = validate($_POST["name"]);
    $department = validate($_POST["Department"]);
    $designation = validate($_POST["Designation"]);
    $userid = validate($_POST["user_id"]);
    $password = validate($_POST["password"]);
    $mob = validate($_POST["mo"]);
    $email = validate($_POST["email"]);
    $subject= validate($_POST["Subject"]);
    

    $con = con();
    
    //query for "this user_id is present or not"

    $query = "SELECT * FROM faculty where user_id='$userid'"  ;
    
    $result = $con->query($query);

    
    if($result->num_rows>0)
    {
        echo "<script>alert('Candidate with this user id and email already exists.');window.location='admin_add.php';</script>";
        die();
    }  
    else 
    {


            if($name == "" )
                {
                    echo "<script>alert('Name must be field');window.location='admin_add.php';</script>";
                    die();
                }
               else if (!preg_match("/^[a-zA-Z. ]*$/",$name)) 
                {
                    echo "<script>alert('Only letters and white space allowed in name');window.location='admin_add.php';</script>";
                    die();
                   
                }
                else if($designation == "" )
                {
                    echo "<script>alert('Designation must be field');window.location='admin_add.php';</script>";
                    die();
                }
                 else if($department == "Select Department" )
                {
                    echo "<script>alert('Departmen must be field');window.location='admin_add.php';</script>";
                    die();
                }
                 else if($subject == "" )
                {
                    echo "<script>alert('Subject must be field');window.location='admin_add.php';</script>";
                    die();
                }
                else if(strlen($userid)<8)
                {
                    echo "<script>alert('userid must be more than or equalto 8 charecter');window.location='admin_add.php';</script>";
                    die();
                }
                else if(strlen($password )<8)
                {
                    echo "<script>alert('password must be morethan or equalto 8 charecter');window.location='admin_add.php';</script>";
                    die();
                }
                else if (!preg_match("/^[0-9]+$/",$mob) && strlen($mob)!=10)
                {
                    echo "<script>alert(' Invalid mobile number format');window.location='admin_add.php';</script>";
                    die();
                }
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    echo "<script>alert(' Invalid email format');window.location='admin_add.php';</script>";
                    die();
                }
                
    






        //if user_id is not present then insert all data in table in database

        $ins_query = "INSERT INTO faculty (user_id,password,department,name,mob,email,subject,designation)
        VALUES ('$userid','$password ','$department','$name','$mob','$email','$subject','$designation')";
        $ins_res = $con->query($ins_query);

         //control goes to candiadte home page and session start at the time of signup

        echo "<script>alert('successfully Data add.');window.location='admin_add.php';</script>";
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
  <script>

  function  show()
  {
        var a=document.getElementById("dipartment").value;

        document.getElementById("c").style="display:block;";
       
  }
          
  
function ncheck()
{
var na,nc,n;
nc=/^[a-zA-Z ]+$/;
n=document.getElementById("na");
na=document.getElementById("na").value;
if(na.charAt(0)==' ')
{
document.getElementById("spn").innerHTML="Invalid Name";
}
else
{
document.getElementById("spn").innerHTML="";
}
}

function uscheck()
{
var na,nc,n;
n=document.getElementById("na");
na=document.getElementById("na").value;
if(!n.value.match(nc) || na.charAt(0)==' ')
{
document.getElementById("spn").innerHTML="Not blank";
}
else
{
document.getElementById("spn").innerHTML="";
}
}



function mncheck()
{
var mna,mnc,mn;
mnc="Select Department";
mn=document.getElementById("mna");
mna=document.getElementById("mna").value;
if(mn.value.match(mnc) || mna.charAt(0)==' ')
{
document.getElementById("mspn").innerHTML="plese fill the detail";;
}
else
{
document.getElementById("mspn").innerHTML="";
}
}


function dencheck()
{
var mna,mnc,mn;
mnc=/^[a-zA-Z ]+$/;
mn=document.getElementById("demna");
mna=document.getElementById("demna").value;
if(!mn.value.match(mnc) || mna.charAt(0)==' ')
{
document.getElementById("despn").innerHTML="plese fill the detail";;
}
else
{
document.getElementById("despn").innerHTML="";
}
}


function suncheck()
{
var mna,mnc,mn;
mnc=/^[a-zA-Z ]+$/;
mn=document.getElementById("sumna");
mna=document.getElementById("sumna").value;
if(!mn.value.match(mnc) || mna.charAt(0)==' ')
{
document.getElementById("suspn").innerHTML="plese fill the detail";;
}
else
{
document.getElementById("suspn").innerHTML="";
}
}


function ucheck()
{
var una;
una=document.getElementById("una").value;
if(una.length<8)
{
document.getElementById("uspn").innerHTML="lenth should be more than 8 charecter";
}
else
{
document.getElementById("uspn").innerHTML="";
}
}

function pascheck()
{
var pasna;
pasna=document.getElementById("pasna").value;
if(pasna.length<8)
{
document.getElementById("passpn").innerHTML="lenth should be more than 8 charecter";
}
else
{
document.getElementById("passpn").innerHTML="";
}
}



function echeck()
{
var ea,ec;
ec=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+.[a-zA-Z.]{2,6}$/;
ea=document.getElementById("ea");
if(!ea.value.match(ec))
{
document.getElementById("spe").innerHTML="Invalid Email";
}
else
{
document.getElementById("spe").innerHTML="";
}
}

function pcheck()
{
var co,pc;
pc=/^[0-9]{10,10}$/;
co=document.getElementById("co");
if(!co.value.match(pc))
{
document.getElementById("spp").innerHTML="Invalid Phone";
}
else
{
document.getElementById("spp").innerHTML="";
}
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
                <li class="nav-item active"><a class="nav-link" href="admin.php" ><font size="2" color="hotpink"><b>Home</b></font></a></li>
                <li class="active" data-toggle="modal" style="color:#ccc" data-target="#add_blog_modal"><a href="admin_add.php"><font size="2" color="hotpink"><b>Add Faculty</b></font></a></li>
                <li class="active"><a href="admin_delete.php"><font size="2" color="hotpink"><b>Delete Faculty</b></font></a></li>
                
              </ul>
              <ul class="nav navbar-nav navbar-right " style="background-color: green;">
                 <li class="active" style="background-color:inverse"><a href="#"> <font size="2" color="hotpink"><b>Welcome <?php echo "$row[0]";?></b></font></a></li>
                 
                 <li class="active" style="background-color:inverse"><a href="logout.php"><font size="2" color="red"><span class="glyphicon glyphicon-off" style="font-size:15px;"></span></font><font size="2" color="hotpink"><b> &nbsp;&nbsp;&nbsp;Log Out</b></font></a></li>
                  
              </ul>
             </div>
     </div>
</nav> 

  <br><br>

  
  
  
               

  

   
    <div class="container"  >
      <div class="col-sm-12" >
                                <h2 style="opacity:0.9;">
                                  <marquee>
                                    <label align="center" style="color:#FFFFFF;">Online Examination Portal,Admin section</label>
                                  </marquee>
                                </h2>
                                <hr>
                                

  

                                <div style="color:#FFFFFF ;border-radius: 20px; padding: 20px 30px 0px 30px;background-color:#071d36;opacity: 0.8; ">
                                  <br><h4 style="border-radius: 10px;background-color:#00FF00;border: 5px solid #006400;width:200px;" align="">
                   <label align="center" style="color:#000080"> 
                      <b> Admin <?php echo "$row[0]";?>  </b>                 
                   </label>
              </h4>
                                     <div class="col-sm-6 col-sm-offset-3">
                                        <div class="panel panel-info" style="border-radius: 70px;background-color:khaki;opacity:0.9;" >            
                                            <div style="padding-top:20px" class="panel-body" align="center">
                                                        <font color="hotpink" size="4"> <b>Fill Appropriate detail to add faculty in  Faculty list</b></font>

                                                          <form id="loginform" class="form-horizontal" role="form" action="#" method="post">
                                                          <hr>
                                                          <div class="form-group">
                                                           <label style="color:navy" for="first_name" class="col-md-3 control-label">Name*</label>
                                                            <div class="col-md-9">
                                                             <input type="text" class="form-control" name="name" placeholder="Name" size="30" id="na" onblur="ncheck();"><span id="spn" style="color:red"></span>
                                                            </div>
                                                            </div>

                                                            <div class="form-group">
                                                            <label style="color:navy" for="middle_name" class="col-md-3 control-label">Department*</label>
                                                              <div class="col-md-9">
                                                                <select  class="form-control" name="Department" id="mna" onblur="mncheck();">
                                                                <option>Select Department</option>
                                                                <option>CSED</option>
                                                                <option>ECE</option>
                                                                <option>ME</option>
                                                                <option>EE</option>
                                                                <option>CHE</option>
                                                                <option>BIOT</option>
                                                                <option>PRO</option>                                      
                                                                </select>
                                                              <span id="mspn" style="color:red"></span>
                                                              </div>
                                                            </div>

                                                            <div class="form-group">
                                                            <label  style="color:navy" for="middle_name" class="col-md-3 control-label">Designation*</label>
                                                              <div class="col-md-9">
                                                              <input type="text" class="form-control" name="Designation" placeholder="Designation" size="30" id="demna" onblur="dencheck();"><span id="despn" style="color:red"></span>
                                                              </div>
                                                            </div>
                                                            <div class="form-group">
                                                            <label style="color:navy" for="last_name" class="col-md-3 control-label">Subject*</label>
                                                              <div class="col-md-9">
                                                                <input type="text" class="form-control" name="Subject" placeholder="Subject" size="30" id="sumna" onblur="suncheck();"><span id="suspn" style="color:red"></span>
                                                            </div>
                                                            </div>
                                                            <div class="form-group">
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">User Id*</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="user_id" placeholder="User Id" size="30" id="una" onblur="ucheck();"><span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>
                                                            <div class="form-group">
                                                            <label style="color:navy" for="password" class="col-md-3 control-label">Password*</label>
                                                             <div class="col-md-9">
                                                             <input type="password" class="form-control" name="password" placeholder="Password" size="30" id="pasna" onblur="pascheck();"><span id="passpn" style="color:red"></span>
                                                             </div>
                                                            </div>
                                                                        <div class="form-group">
                                                            <label style="color:navy" for="mo" class="col-md-3 control-label">Mo. Number*</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="mo" placeholder="Mobile number" id="co" onblur="pcheck();" maxlength="10"><span id="spp" style="color:red"></span>
                                                             </div>
                                                            </div>
                                                            <div class="form-group">
                                                            <label style="color:navy"  for="email" class="col-md-3 control-label">Email*</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="email" placeholder="Email Address" id="ea" onblur="echeck();"><span id="spe" style="color:red"></span>
                                                             </div>
                                                            </div>

                                                          

                                                            


                                                            

                                                            <!--Reset Button -->
                                                           <div class="form-group">
                                                                                                      
                                                             <div class=" col-md-offset-4 col-md-2">
                                                               <input type="reset" id="btn-reset" class="btn btn-info"><i class="icon-hand-right" value="Reset" onclick="#"></i>
                                                             </div>
                                                             
                                                      

                                                             
                                                              <!--Submit Button -->                                        
                                                             <div class="col-md-offset-2 col-md-2">
                                                               <input type="submit" id="btn-signup" class="btn btn-info"><i class="icon-hand-right"></i>
                                                             </div>
                                                            </div>                                                           
                                                          <hr>
                                                        </form>
                                            </div>                     
                                        </div>  
                                    </div>
                                      <br><br><br><br><br>
                                    <br><br><br><br>
                                    <br><br><br><br>
                                    <br><br><br> <br><br><br><br><br>
                                    <br><br><br><br>
                                    <br><br><br><br>
                                    <br><br><br>
                                        <br><br><br>
                                       
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