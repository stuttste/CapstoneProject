<?php
include 'includes/db_connect.php';
include 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
	header('Location: login.php');
	die();
}

	//$email = $_POST['email'];
	$email = "schutzvl@warhawks.ulm.edu";
	deleteRow($email);
	function deleteRow(){
		if ($sql = $mysqli->prepare("DELETE FROM `MEMBERS` WHERE 'MEMBERS`.`Email` = 'schutzvl@warhawks.ulm.edu'" )) {
			//$sql->bind_param("s",$email);
			$sql->execute();
		}
			$sql->close();
	}
	

?> 

