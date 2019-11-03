<?php

session_start();
$name= "";
$email= "";
$pass = "";
$cpass = "";
$dob = "";
$gender = "";

if (isset($_REQUEST['reg'])) {
    $name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];
	$cpass = $_REQUEST['cpass'];
	$dob = $_REQUEST['dob'];
	$gender = $_REQUEST['gender'];

	if(empty($name) == true || empty($email) == true || empty($pass) == true || empty($cpass) == true || empty($dob) == true || empty($gender) == true)
	{
		header('location: registration.php');
	}
	else
		{
		if($pass!=$cpass)
		{
			header('location: registration.php');
		}
						 else{
			$_SESSION['sNAME'] = $name;
			$_SESSION['sEMAIL'] = $email;
			$_SESSION['sPass'] = $pass;
			$_SESSION['sCpass'] = $cpass;
			$_SESSION['sDob'] = $dob;
			$_SESSION['sGENDER'] = $gender;

			$myFile = fopen('info.txt', 'a');
			fwrite($myFile, $name."|".$email."|".$pass."|".$cpass."|".$dob."|".$gender."|");
			fclose($myFile);

			header('location: login.php');

		}
		}
	
}
?>