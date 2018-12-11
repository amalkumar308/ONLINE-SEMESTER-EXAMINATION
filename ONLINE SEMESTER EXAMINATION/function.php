<?php


//function to validate value which are fetched from form like html entities and trim
function validate($val)
{
	$val=htmlentities($val);
	$val=trim($val);
	return $val;
}




//function to connect database
function con()
{
$dbhost="localhost";
$dbuname="root";
$dbpassword="";
$dbname="online_test";

// Set connection to the database

$con=new MySQLi($dbhost,$dbuname,$dbpassword,$dbname);
if($con->connect_errno)
{

	//if conncetion is not establised with database, then give error message
	die("Not able to connect to database".$con->connect_error);
}
 else
 {
 	return $con;
 }
}
?>