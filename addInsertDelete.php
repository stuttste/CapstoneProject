<?php


	$email = $_POST['email'];
	//deleteRow($email);
	//function deleteRow($email){
		
		if ($sql = $mysqli->prepare("DELETE FROM `MEMBERS` WHERE 'MEMBERS`.`Email` = ?")) {
			$sql->bind_param("s",$email);
			$sql->execute();
		}
			$sql->close();
	//}
	

?> 

