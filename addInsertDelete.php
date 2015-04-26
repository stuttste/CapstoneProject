<?php


	$email = $_POST['email'];
	//deleteRow($email);
	//function deleteRow($email){
		
		if ($sql = $mysqli->prepare("DELETE FROM `MEMBERS` WHERE 'MEMBERS`.`Email` = '$email'")) {
			$sql->execute();
		}
			$sql->close();
	//}
	

?> 

