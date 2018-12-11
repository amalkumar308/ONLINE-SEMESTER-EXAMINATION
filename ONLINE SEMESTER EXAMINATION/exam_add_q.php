<?php
session_start();


//include funtion.php file


require('function.php');
$con = con();

$a=0;

 $q="Enter Question";
 $sq="Enter Question";
       $a="";
        $b="";
         $c="";
          $d="";
           $e="";
            $m="";
             $an="";
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


  static $o=1;
static $s=1;  
static $mar,$re=0;  



if($_SERVER["REQUEST_METHOD"] == "POST") 
{
     
  
$f;

$dipartment = mysqli_real_escape_string($con,$_POST['department']);
      $branch = mysqli_real_escape_string($con,$_POST['branch']);
      $sem = mysqli_real_escape_string($con,$_POST['sem']);
      $type= mysqli_real_escape_string($con,$_POST['type']);
      $marks = mysqli_real_escape_string($con,$_POST['marks']);
      $exam_id= mysqli_real_escape_string($con,$_POST['exam_id']);
      $pass = mysqli_real_escape_string($con,$_POST['password']);
      $mar=$marks;
     
     
      if($branch=="Select Branch" || $sem=="Select Semester")
      {
        $a=0;
      
      }
      else
      {
       // echo "<script>alert($exam_id,$pass,$type','$marks','$dipartment','$branch','$sem')</script>"
      $sql = "INSERT INTO exam (exam_id,password,user_id,exam_type,marks,department,branch,sem)
        VALUES ('$exam_id','$pass','$id','$type','$marks','$dipartment','$branch','$sem')";

         $ins_res = $con->query($sql);  
             

  }
}

          if($_SERVER["REQUEST_METHOD"] == "GET") 
        {

                 $pre=mysqli_real_escape_string($con,$_GET['pre']);

                    if($pre==1)
                    {
                      $con = con();

                      $exam_id=mysqli_real_escape_string($con,$_GET['exam_id']);
                      $oqid=mysqli_real_escape_string($con,$_GET['oqid']);
                      $oqid--;
                     

                      $sql1 = "SELECT * FROM `objective` WHERE exam_id = '$exam_id' AND q_id = '$oqid' ";
                      $result1 = mysqli_query($con,$sql1);
                      $row1 = $result1->fetch_array();     
                      echo "<script>alert('r$row1[1]k')</script>";
                        if(isset($row1[0]))
                        {
                             $o=$oqid;
                                $q=$row1[2];
                             $a=$row1[3];
                              $b=$row1[4];
                               $c=$row1[5];
                                $d=$row1[6];
                                 $e=$row1[7];
                                  $m=$row1[9];
                                   $an=$row1[8];
                        }
                        else
                        {
                         
                           echo "<script>alert('No Data Found')</script>";
                        }
                    }
                    else if($pre==2)
                    {

                        $exam_id=mysqli_real_escape_string($con,$_GET['exam_id']);
                        $oqid=mysqli_real_escape_string($con,$_GET['oqid']);
                        $q=trim(mysqli_real_escape_string($con,$_GET['q']));
                        $a=mysqli_real_escape_string($con,$_GET['A']);
                        $b=mysqli_real_escape_string($con,$_GET['B']);
                        $c=mysqli_real_escape_string($con,$_GET['C']);
                        $d=mysqli_real_escape_string($con,$_GET['D']);
                        $e=mysqli_real_escape_string($con,$_GET['E']);
                        $an=mysqli_real_escape_string($con,$_GET['ans']);
                        $m=mysqli_real_escape_string($con,$_GET['M']);
   
                          if($q=="Enter Question"||$a==""||$b==""||$c==""||$an==""||$m=="")
                            {
                              echo "<script>alert('fill data prperly $q')</script>";
                            }
                          else
                            {
                              $o=$oqid;
                              $sql = "SELECT * FROM `objective` WHERE exam_id = '$exam_id' AND q_id='$o'" ;
                              $result2 = mysqli_query($con,$sql);
                              $count2 = mysqli_num_rows($result2);
                              if($count2 == 1) 
                              {
                                 //echo "alert('Quetion Already Added');header.location='exam_add_q.php';";
                              }
                              else
                              {
                                
                                echo "<script>alert('$o $oqid')</script>";
                              $sql = "INSERT INTO objective (exam_id,q_id,q,a,b,c,d,e,ans,m)
                              VALUES ('$exam_id','$o','$q','$a','$b','$c','$d','$e','$an','$m')";
                              $re=$re+$m;
                              $ins_res = $con->query($sql);  
                              }
                            }
                    }
                   else if($pre==3)
                   {
                        $exam_id=mysqli_real_escape_string($con,$_GET['exam_id']);
                        $oqid=mysqli_real_escape_string($con,$_GET['oqid']);
                        $o=$oqid+1;

                          $con = con();


                      $sql1 = "SELECT * FROM `objective` WHERE exam_id = '$exam_id' AND q_id = '$o' ";
                      $result1 = mysqli_query($con,$sql1);
                      $row1 = $result1->fetch_array();     
                     
                        if(isset($row1[0]))
                        {
                                $q=$row1[2];
                             $a=$row1[3];
                              $b=$row1[4];
                               $c=$row1[5];
                                $d=$row1[6];
                                 $e=$row1[7];
                                  $m=$row1[9];
                                   $an=$row1[8];
                        }
                        else
                        {

                        $q="Enter Question";
                        $a="";
                        $b="";
                        $c="";
                        $d="";
                        $e="";
                        $m="";
                        $an="";
                      }

                   }
                    else if($pre==5)
                    {

                        $exam_id=mysqli_real_escape_string($con,$_GET['exam_id']);
                        $oqid=mysqli_real_escape_string($con,$_GET['sqid']);
                        $sq=trim(mysqli_real_escape_string($con,$_GET['q']));
                        $m=mysqli_real_escape_string($con,$_GET['M']);
   
                          if($sq=="Enter Question"||$m=="")
                            {
                              echo "<script>alert('fill data prperly $q')</script>";
                            }
                          else
                            {
                              $s=$oqid;
                              $sql = "SELECT * FROM `subjective` WHERE exam_id = '$exam_id' AND q_id='$s'" ;
                              $result2 = mysqli_query($con,$sql);
                              $count2 = mysqli_num_rows($result2);
                              if($count2 == 1) 
                              {
                                 //echo "alert('Quetion Already Added');header.location='exam_add_q.php';";
                              }
                              else
                              {
                              $sql = "INSERT INTO subjective (exam_id,q_id,q,m)
                              VALUES ('$exam_id','$s','$sq','$m')";

                              $ins_res = $con->query($sql);  
                              }
                            }
                    }
                    else if($pre==6)
                   {
                        $exam_id=mysqli_real_escape_string($con,$_GET['exam_id']);
                        $oqid=mysqli_real_escape_string($con,$_GET['sqid']);
                        $s=$oqid+1;
                        

                          $con = con();

                           echo "<script>alert('$oqid $s')</script>";
                      $sql1 = "SELECT * FROM `subjective` WHERE exam_id = '$exam_id' AND q_id = '$s' ";
                      $result1 = mysqli_query($con,$sql1);
                      $row1 = $result1->fetch_array();     
                     
                        if(isset($row1[0]))
                        {
                                $sq=$row1[2];
                            
                                  $m=$row1[3];
                                 
                        }
                        else
                        {
                          $sq="Enter Question";
                          $m="";
                        }
                  
                   }
                   else if($pre==4)
                   {

                      $con = con();

                      $exam_id=mysqli_real_escape_string($con,$_GET['exam_id']);
                      $oqid=mysqli_real_escape_string($con,$_GET['sqid']);
                      $oqid--;
                     

                      $sql1 = "SELECT * FROM `subjective` WHERE exam_id = '$exam_id' AND q_id = '$oqid' ";
                      $result1 = mysqli_query($con,$sql1);
                      $row1 = $result1->fetch_array();     
                      echo "<script>alert('r$row1[1]k')</script>";
                        if(isset($row1[0]))
                        {
                             $s=$oqid;
                                $sq=$row1[2];
                                  $m=$row1[3];
                                  
                        }
                        else
                        {
                         
                           echo "<script>alert('No Data Found')</script>";
                        }



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

 function  obshow()
  {
  
        document.getElementById("<?php echo $o; ?>").style="display:block;";
       document.getElementById("<?php echo 's'.$s; ?>").style="display:none;";
       
  }
  function  subshow()
  {
       document.getElementById("<?php echo 's'.$s; ?>").style="display:block;";
        document.getElementById("<?php echo $o; ?>").style="display:none;";
        
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
              <h4 style="border-radius: 10px;background-color:#00FF00;border: 5px solid #006400;width:200px;" align="">
                   <label align="center" style="color:#000080"> 
                      <b> Faculty <?php echo "$row[3]";?>  </b>                 
                   </label>
              </h4>
              <div class="col-sm-9 col-sm-offset-2" id="a">
                <div  class="form-group">
                           <div class="col-sm-12 controls" align="center" style="border-radius: 10px;background-color:mediumvioletred;border: 5px solid #006400;">
                            <input type="button" style="margin:10px;" id="btn-login" value="Objective Section"class="btn btn-primary btn-lg" onclick="obshow()">
                                  <input type="button" style="margin:10px;" id="btn-login"  value="Subjective Section" class="btn btn-primary btn-lg" onclick="subshow()">
                                
                           
                            </div>
                          
                            
                      

                            
                       <br><br>
                       <div id="<?php echo $o; ?>" style="display:none">
                       <div class="col-sm-3 col-sm-offset-3 controls" align="center" style="margin:10px;border-radius: 10px;background-color:mediumvioletred;border: 5px solid #006400;">
                            <form id="loginform" class="form-horizontal" role="form" action="exam_add_q.php" method="get">
                                <input type="text" value="1" style="display:none;" id="pre" name="pre">
                                <input type="text" value="<?php echo $exam_id;?>" style="display:none;" id="exam_id" name="exam_id">
                                <input type="text" value="<?php echo $o;?>" style="display:none;" name="oqid" id="oqid">
                                   <input type="submit" style="margin:;" id="btn-login" action="exam_add_q.php" value="Go previous Quetion" class="btn btn-primary">
                               </form>
                           </div>
                            <br><br><br><br><br>
                  <div class="panel panel-info" style="border-radius: 70px;background-color:khaki;opacity:0.9;" >            
                      <div style="padding-top:20px" class="panel-body" align="center">

                                  <font color="hotpink" size="4"> <b>Add Question Number<?php echo " ".$o;?></b></font>
                                     <form id="loginform" class="form-horizontal" role="form" action="exam_add_q.php" method="get">
                                  
                                    <hr>  <input type="text" value="<?php echo $exam_id;?>" style="display:none;" id="exam_id" name="exam_id">
                                          <input type="text" value="<?php echo $o;?>" style="display:none;" name="oqid" id="oqid">
                                          <input type="text" value="2" style="display:none;" id="pre" name="pre">
                                                            <div class="form-group" >
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">Question*</label>
                                                             <div class="col-md-9">
                                                              <textarea rows="4" cols="50" style="color:red;" class="form-control" name="q" id="q" onblur="ucheck();">
                                                                <?php echo $q;?>
                                                              </textarea>
                                                             <span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>

                                                             <div class="form-group">
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">Option A*</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="A" id="A" placeholder="Option A" size="30"  onblur="ucheck();" value="<?php if($a!="")echo $a;?>">
                                                             <span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>

                                                               <div class="form-group">
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">Option B*</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="B" placeholder="Option B" size="30" id="B" onblur="ucheck();" value="<?php if($b!="")echo $b;?>"><span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div> 

                                                            <div class="form-group">
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">Option C*</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="C" placeholder="Option C" size="30" id="C" onblur="ucheck();" value="<?php if($c!="")echo $c;?>"><span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div> 

                                                            <div class="form-group">
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">Option D</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="D" placeholder="Option D" size="30" id="D" onblur="ucheck();"value="<?php if($d!="")echo $d;?>"><span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>
                                                           

                                                            <div class="form-group">
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">Option E&nbsp;&nbsp;</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="E" placeholder="Option E" size="30" id="E" onblur="ucheck();" value="<?php if($e!="")echo $e;?>"><span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>
                                                              
                                                              <div class="form-group">
                                                           <label style="color:navy" for="user_id" class="col-md-3 control-label">Choose Answer&nbsp;&nbsp;</label>
                                                             <div class="col-md-9">
                                                             
                                                              <select  class="form-control" name="ans" id="ans">
                                                              <option><?php echo $an;?></option>
                                                              <option>A</option>
                                                              <option>B</option>
                                                              <option>C</option>
                                                              <option>D</option>      
                                                              <option>E</option>                                
                                                              </select>
                                                         </div>   
                                                       </div>

                                                       <div class="form-group">
                                                            <label style="color:navy" for="marks" class="col-md-3 control-label">Marks&nbsp;&nbsp;</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="M" placeholder="Enter Marks" size="30" id="M" onblur="ucheck();" value="<?php if($m!="")echo $m;?>"><span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>

                                                            <input type="submit" id="btn-login" action="#" class="btn btn-success" onclick="">
                                     </form>
                                    <hr>
                            
                                   </div>  </div>  
                                    <div class="col-sm-3 col-sm-offset-3 controls" align="center" style="margin:10px;border-radius: 10px;background-color:mediumvioletred;border: 5px solid #006400;">
                           <form id="loginform" class="form-horizontal" role="form" action="exam_add_q.php" method="get">
                                <input type="text" value="3" style="display:none;" id="pre" name="pre">
                                <input type="text" value="<?php echo $exam_id;?>" style="display:none;" id="exam_id" name="exam_id">
                                <input type="text" value="<?php echo $o;?>" style="display:none;" name="oqid" id="oqid">
                                   <input type="submit" style="margin:;" id="btn-login" action="exam_add_q.php" value="Go Next Quetion" class="btn btn-primary">
                               </form>
                           </div> 
</div>

                            <div id="<?php echo 's'.$s; ?>" style="display:none">
                       <div class="col-sm-3 col-sm-offset-3 controls" align="center" style="margin:10px;border-radius: 10px;background-color:mediumvioletred;border: 5px solid #006400;">
                            <form id="loginform" class="form-horizontal" role="form" action="exam_add_q.php" method="get">
                                <input type="text" value="4" style="display:none;" id="pre" name="pre">
                                <input type="text" value="<?php echo $exam_id;?>" style="display:none;" id="exam_id" name="exam_id">
                                <input type="text" value="<?php echo $s;?>" style="display:none;" name="sqid" id="sqid">
                                   <input type="submit" style="margin:;" id="btn-login" action="exam_add_q.php" value="Go previous Quetion" class="btn btn-primary">
                               </form>
                           </div>
                            <br><br><br><br><br>
                  <div class="panel panel-info" style="border-radius: 70px;background-color:khaki;opacity:0.9;" >            
                      <div style="padding-top:20px" class="panel-body" align="center">

                                  <font color="hotpink" size="4"> <b>Add Subjective Question Number<?php echo " ".$s;?></b></font>
                                     <form id="loginform" class="form-horizontal" role="form" action="exam_add_q.php" method="get">
                                  
                                    <hr>  <input type="text" value="<?php echo $exam_id;?>" style="display:none;" id="exam_id" name="exam_id">
                                          <input type="text" value="<?php echo $s;?>" style="display:none;" name="sqid" id="sqid">
                                          <input type="text" value="5" style="display:none;" id="pre" name="pre">
                                                            <div class="form-group" >
                                                            <label style="color:navy" for="user_id" class="col-md-3 control-label">Question*</label>
                                                             <div class="col-md-9">
                                                              <textarea rows="4" cols="50" style="color:red;" class="form-control" name="q" id="q" onblur="ucheck();">
                                                                <?php echo $sq;?>
                                                              </textarea>
                                                             <span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>

                                                         <div class="form-group">
                                                            <label style="color:navy" for="marks" class="col-md-3 control-label">Marks&nbsp;&nbsp;</label>
                                                             <div class="col-md-9">
                                                             <input type="text" class="form-control" name="M" placeholder="Enter Marks" size="30" id="M" onblur="ucheck();" value="<?php if($m!="")echo $m;?>"><span id="uspn" style="color:red"></span>
                                                             </div>
                                                            </div>

                                                            <input type="submit" id="btn-login" action="#" class="btn btn-success" onclick="">
                                     </form>
                                    <hr>
                            
                                   </div>  </div>  
                                    <div class="col-sm-3 col-sm-offset-3 controls" align="center" style="margin:10px;border-radius: 10px;background-color:mediumvioletred;border: 5px solid #006400;">
                           <form id="loginform" class="form-horizontal" role="form" action="exam_add_q.php" method="get">
                                <input type="text" value="6" style="display:none;" id="pre" name="pre">
                                <input type="text" value="<?php echo $exam_id;?>" style="display:none;" id="exam_id" name="exam_id">
                                <input type="text" value="<?php echo $s;?>" style="display:none;" name="sqid" id="sqid">
                                   <input type="submit" style="margin:;" id="btn-login" action="exam_add_q.php" value="Go Next Question" class="btn btn-primary">
                               </form>
                           </div>        
                  </div>  
              







                  </div>  
              </div>
              <br>
            <br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
            <br><br><br>
              
          
            <br><br><br>
        </div>


</div>





<footer class="container-fluid">
  <div style="text-align:center;padding:1%;font-weight:bold;color:hotpink">
    devloped By Choubeyji &copy; 2018
  </div>
</footer>


</body>
</html>