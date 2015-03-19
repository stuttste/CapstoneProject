<?php
	include '../includes/db_connect.php';
	include '../includes/functions.php'; 
	
	$type = $_GET['type'];
	$id = $_GET['id'];
	$dom = new DOMDocument('1.0', 'utf-8');
	
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
			$element = $dom->createElement('tr', '<td>'. $row["Name"] .'</td><td>'. $row["Cluster"] .'</td><td>'. $row["Subcluster"] .'</td>');
			$dom->appendChild($element);
			echo $dom->saveXML();
		}
	}elseif($type='Enzyme'){
		while($row = $sql->fetch_assoc()){
			$element = $dom->createElement('tr', '<td>'. $row["Name"] .'</td>');
			$dom->appendChild($element);
			echo $dom->saveXML();
		}
		
	
	}
?>