<?php
	include '../includes/db_connect.php';
	include '../includes/functions.php'; 
	
	$phages = $_GET['phages'];
	$clusters = $_GET['clusters'];
	$sub = $_GET['subclusters'];
	$enzymes = $_GET['enzymes'];
	
	$sql = $mysqli->query("SELECT `Name`, `Cluster`, `Subcluster`, GROUP_CONCAT(`Count`)"
								. " FROM `PHAGE` Left Join `CUTS2` on `Name` = `Phage`"
								. " WHERE (`Name` IN($phages) OR `Cluster` IN($clusters) OR `Subcluster` IN($sub)) AND `Enzyme` IN($enzymes)"
								. " GROUP BY `Name`"
	
	
	
	////////////////////////////////////////////////////////////////////////////////
	
	
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
			echo $row["Name"] .', '. $row["Cluster"] .', '. $row["Subcluster"] ;
			//echo '<tr><td>'. $row["Name"] .'</td><td>'. $row["Cluster"] .'</td><td>'. $row["Subcluster"] .'</td></tr>';
		}
	}elseif($type='Enzyme'){
		while($row = $sql->fetch_assoc()){
			echo '<tr><td>'. $row["Name"].'</td></tr>';
		}
		
	
	}
?>