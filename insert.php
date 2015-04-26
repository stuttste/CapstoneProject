<?php
include 'includes/db_connect.php';
include 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
	header('Location: login.php');
	die();
}

		$phage = $_POST['pChoice'];
		$cluster = $_POST['cChoice'];
		$subCluster = $_POST['sChoice'];
		$enzyme = $_POST['eChoice'];
		
		if ($sql = $mysqli->prepare("INSERT INTO `Admin_Phage`(`Phage`, `Cluster`, `SubCluster`, `Enzyme`) VALUES ('$phage','$cluster','$subCluster','$enzyme')" )) {
			$sql->execute();
			echo "Phage Added";
			header('Location: AdminToolsPage.php');
		}
			$sql->close();
	
	

?> 