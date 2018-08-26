<?php
$DB_HOST = 'localhost';
$DB_NAME = 'itm';
$DB_USER = 'root';
$DB_PASSWORD = 'reshm@';
@mysql_connect('$DB-HOST','$DB-USER','$DB-PASSWORD') or die("Failed to connect:".mysql_error());
@mysql_select_db('$DB-NAME') or die("Failed to connect:".mysql_error());


function newuser()
{
	$f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
	$gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
	$email = $_POST['email'];
	$itm_id =  $_POST['itm_id'];
    $branch = $_POST['branch'];
    $batch = $_POST['batch'];
    $mob_no = $_POST['mob_no'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
	$query = "INSERT INTO student(f_name,l_name,gender,date_of_birth,email,itm_id,branch,batch,mob_no,address,city,pincode) VALUES ('$f_name','$l_name','$gender','$date_of_birth','$email','$itm_id','$branch','$batch','$mob_no','$address','$city','$pincode')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
}

function SignUp()
{
if(!empty($_POST['itm_id']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM student WHERE itm_id = '$_POST[itm_id]' AND email = '$_POST[email]'") or die(mysql_error());
}
	if(!$row = mysql_fetch_array($query)) /*or die(mysql_error()))*/
	{
		newuser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>