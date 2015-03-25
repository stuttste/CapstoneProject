<?php

	//Declare our variables

	$phageStr = $_GET['phages'];	//In the form phages=PhageA,PhageB,PhageC,...
	$cutStr = $_GET['cuts'];				//In the form cuts=FML,LFM,MLF,...
	$phages = explode(",", $phageStr);
	$cuts = explode(",", $cutStr);
	$phageCount = count($phages);
	$cutCount = count($cuts);
	$enzCount = strlen($cuts[0]);
	
	//The number of cut count entries must be equal to the number of phages.
	//Please note I am not referring to the number of enzymes, I am referring to the number
	//		of enzyme LISTS sent into the page.
	
	if($phageCount == $cutCount){
		
		//Create our parsIn file. Specifies the phages and cuts for the tree.
		if(!file_exists('inputFiles')){
			mkdir('inputFiles');
		}
		$fileIn = fopen("inputFiles/inFile".date("ymdHis").".txt", "w") or die("Unable to open input file!");
		
		$printStr = $phageCount." ".$enzCount."\n";
		fwrite($fileIn, $printStr);
		
		$i = 0;
		while($i < $phageCount){
			if(strlen($phages[$i]) <= 10){
				$printStr = str_pad($phages[$i], 10).$cuts[$i]."\n";
				fwrite($fileIn, $printStr);
			}else{
				$printStr = substr($phages[$i], 0, 10).$cuts[$i]."\n";
				fwrite($fileIn, $printStr);
			}
			$i++;
		}
		
		fclose($fileIn);
		
	}else{
		die("Unequal number of cut entries and phages!");
	}



?>