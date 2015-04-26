<?php
include 'includes/db_connect.php';
include 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
	header('Location: login.php');
	die();
}

	$email = $_POST['smartguypurple@yahoo.com'];
	//$email = "schutzvl@warhawks.ulm.edu";
	//deleteRow($email);
	//function deleteRow($email){
		if ($sql = $mysqli->prepare("DELETE FROM `MEMBERS` WHERE `Email` = '$email'" )) {
			//$sql->bind_param("s",$email);
			$sql->execute();
		}
			$sql->close();
	//}
	

?> 

