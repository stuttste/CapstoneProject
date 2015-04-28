<?php
include 'includes/db_connect.php';
include 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
	header('Location: login.php');
	die();
}

		$enzyme = $_POST['enzselection'];
		
		if ($sql = $mysqli->prepare("DELETE FROM `Admin_Phage` WHERE `Enzyme` = '$enzyme'" )) {
			header('Location: http://g3cap.tk/staging/AdminToolsPage.php');
			$sql->execute();
		}
			$sql->close();

	

?> 