<?php
	include '../includes/db_connect.php';
	include '../includes/functions.php'; 
	
	$type = $_GET['type'];
	$id = $_GET['id'];
	
	if($type='Phage'){
		$sql=$mysqli->query("SELECT `Name`, `Cluster`, `Subcluster` FROM `PHAGE` WHERE `Name`= '".$id."'");
	}elseif($type='Cluster'){
		$sql=$mysqli->query("SELECT `Name`, `Cluster`, `Subcluster` FROM `PHAGE` WHERE `Cluster`= '".$id."'");
	}elseif($type='Subcluster'){
		$sql=$mysqli->query("SELECT `Name`, `Cluster`, `Subcluster` FROM `PHAGE` WHERE `Subcluster`= '".$id."'");
	}elseif($type='Enzyme'){
		$sql=$mysqli->query("SELECT `Name` FROM `PHAGE` WHERE `Name`= '".$id."'");
	}
	
	if($type='Phage' || $type='Cluster' || $type='Subcluster'){
		while($row = $sql->fetch_assoc()){
			echo '<tr><td>'. $row["Name"] .'</td><td>'. $row["Cluster"] .'</td><td>'. $row["Subcluster"] .'</td></tr>';
		}
	}elseif($type='Enzyme'){
		while($row = $sql->fetch_assoc()){
			echo '<tr><td>'. $row["Name"].'</td></tr>';
		}
	}
?>