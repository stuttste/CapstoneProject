<?php
	$phageStr = $_GET['phages'];
	$cutStr = $_GET['cuts'];
	$phages = explode(",", $phageStr);
	$cuts = explode(",", $cutStr);
	$phageCount = count($phages);
	$cutCount = count($cuts);
	$enzCount = strlen($cuts[0]);
	
	if($phageCount == $cutCount){
		
		$parsIn = fopen("parsIn.txt", "w") or die("Unable to open pars input file!");
		
		$printStr = $phageCount." ".$enzCount."\n";
		fwrite($parsIn, $printStr);
		
		$i = 0;
		while($i < $phageCount){
			if(strlen($phages[$i]) <= 10){
				$printStr = str_pad($phages[$i], 10).$cuts[$i]."\n";
				fwrite($parsIn, $printStr);
			}else{
				$printStr = substr($phages[$i], 0, 10).$cuts[$i]."\n";
				fwrite($parsIn, $printStr);
			}
			$i++;
		}
		
		fclose($parsIn);
		
	}else{
		die("Unequal number of cut entries and phages!");
	}



?>