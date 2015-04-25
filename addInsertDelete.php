<?php
	$email = $_POST['email'];
	function deleteRow(){
		if ($sql = $mysqli->prepare("DELETE FROM `MEMBERS` WHERE 'MEMBERS`.`Email` = '$email'")) {
			$sql->execute();
		}
			$sql->close();
	}
	

?>

