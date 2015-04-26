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
		
		if(!$_POST['submit']){
			echo "Fill out form";
			header('Location: http://g3cap.tk/staging/AdminToolsPage.php');
		}
		if ($sql = $mysqli->prepare("INSERT INTO `Admin_Phage`(`Phage`, `Cluster`, `SubCluster`, `Enzyme`) VALUES ('$pChoice','$cChoice','$sChoice','$eChoice')" )) {
			$sql->execute();
			echo "Phage Added";
			header('Location: http://g3cap.tk/staging/AdminToolsPage.php');
		}
			$sql->close();
		
	
	

?> 