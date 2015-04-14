<?php
	include '../includes/db_connect.php';
	include '../includes/functions.php'; 
	
	$phages = $_GET['phages'];
	$clusters = $_GET['clusters'];
	$sub = $_GET['subclusters'];
	$enzymes = $_GET['enzymes'];
	$enzymeArr = explode(",", $enzymes);
	$cutsArr;
	$i = 0;
	$resultStr = "";
	
	$sql = $mysqli->query("SELECT `Name`, `Cluster`, `Subcluster`, GROUP_CONCAT(`Count`) AS Cuts"
								. " FROM `PHAGE` Left Join `CUTS2` on `Name` = `Phage`"
								. " WHERE (`Name` IN($phages) OR `Cluster` IN($clusters) OR `Subcluster` IN($sub)) AND `Enzyme` IN($enzymes)"
								. " GROUP BY `Name`");
								
	$resultStr = "<thead><th>Phage</th><th>Cluster</th><th>Subcluster</th>";
	
	for($i=0; $i < count($enzymeArr); i++){
		$resultStr .= "<th>$enzymeArr[$i]</th>";
	}
	
	$resultStr .= "</thead><tbody>";
								
	while($row = $sql->fetch_assoc()){
		$resultStr .= "<tr><td>$row['Name']</td><td>$row['Cluster']</td><td>$row['Subcluster']</td>";
		$cutsArr = explode(",", $row['Cuts']);
		for($i = 0; $i < count($cutsArr); i++){
			$resultStr .= "<td>$cutsArr[$i]</td>";
		}
		$resultStr .= "</tr>" ;
	}
	
	$resultStr .= "</tbody>";
	
	echo $resultStr;
	
?>