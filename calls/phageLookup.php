<?php
	include '../includes/db_connect.php';
	include '../includes/functions.php'; 
	
	$phages = $_GET['phages'];
	$clusters = $_GET['clusters'];
	$sub = $_GET['subclusters'];
	$enzymes = $_GET['enzymes'];
	
	$phageStr = "";
	$clusterStr = "";
	$subStr = "";
	$enzymeStr = "";
	
	$phageArr = explode(",", $phages);
	$clusterArr = explode(",", $clusters);
	$subArr = explode(",", $sub);	
	$enzymeArr = explode(",", $enzymes);
	
	$cutsArr;
	$i = 0;
	$resultStr = "";
	
	for($i=0; $i < count($phageArr); $i++){
		if($phageStr == "")
			$phageStr .= "'" . $phageArr[$i] . "'";
		else
			$phageStr.= ", '" . $phageArr[$i] . "'";
	}
	
	for($i=0; $i < count($clusterArr); $i++){
		if($clusterStr == "")
			$clusterStr .= "'" . $clusterArr[$i] . "'";
		else
			$clusterStr.= ", '" . $clusterArr[$i] . "'";
	}
	
	for($i=0; $i < count($subArr); $i++){
		if($subStr == "")
			$subStr .= "'" . $subArr[$i] . "'";
		else
			$subStr.= ", '" . $subArr[$i] . "'";
	}
	
	for($i=0; $i < count($enzymeArr); $i++){
		if($enzymeStr == "")
			$enzymeStr .= "'" . $enzymeArr[$i] . "'";
		else
			$enzymeStr.= ", '" . $enzymeArr[$i] . "'";
	}
	
	
	$sql = $mysqli->query("SELECT `Name`, `Cluster`, `Subcluster`, GROUP_CONCAT(`Count`) AS Cuts"
								. " FROM `PHAGE` Left Join `CUTS2` on `Name` = `Phage`"
								. " WHERE (`Name` IN($phageStr) OR `Cluster` IN($clusterStr) OR `Subcluster` IN($subStr)) AND `Enzyme` IN($enzymeStr)"
								. " GROUP BY `Name`");
								
	$resultStr = "<thead><th>Phage</th><th>Cluster</th><th>Subcluster</th>";
	
	for($i=0; $i < count($enzymeArr); $i++){
		$resultStr .= "<th>$enzymeArr[$i]</th>";
	}
	
	$resultStr .= "</thead><tbody>";
								
	while($row = $sql->fetch_assoc()){
		$resultStr .= "<tr><td>$row['Name']</td><td>$row['Cluster']</td><td>$row['Subcluster']</td>";
		$cutsArr = explode(",", $row['Cuts']);
		for($i = 0; $i < count($cutsArr); $i++){
			$resultStr .= "<td>$cutsArr[$i]</td>";
		}
		$resultStr .= "</tr>" ;
	}
	
	$resultStr .= "</tbody>";
	
	echo $resultStr;
	
?>