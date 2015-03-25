<?php

	//Declare our variables

	$phageStr = $_GET['phages'];	//In the form phages=PhageA,PhageB,PhageC,...
	$cutStr = $_GET['cuts'];				//In the form cuts=FML,LFM,MLF,...
	$userId = $_GET['id'];				//We need this to avoid file naming conflicts. Just id=1 (or whatever unique number)
	$phages = explode(",", $phageStr);
	$cuts = explode(",", $cutStr);
	$phageCount = count($phages);
	$cutCount = count($cuts);
	$enzCount = strlen($cuts[0]);
	
	//The number of cut count entries must be equal to the number of phages.
	//Please note I am not referring to the number of enzymes, I am referring to the number
	//		of enzyme LISTS sent into the page.
	
	if($phageCount == $cutCount){
		
		//Create our parsIn file (and inputFiles dir if it doesn't exist). Specifies the phages and cuts for the tree.
		if(!file_exists('inputFiles')){
			mkdir('inputFiles');
		}
		$fileInName = "inputFiles/inFile".date("ymdHis").$userId.".txt";
		$fileIn = fopen($fileInName, "w") or die("Unable to open input file!");
		
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
		
		//Our input file is now created. On to the config file for pars. (parsIn.txt)
		//	We will store that file in confFiles folder. (If it doesn't exist, we create it.)
		
		if(!file_exists('confFiles')){
			mkdir('confFiles');
		}
		$parsInName = "confFiles/parseIn".date("ymdHis").$userId.".txt";
		$parsIn = fopen($parsInName, "w") or die("Unable to open pars config file!");
		$fileOutName = "outFiles/outFile".date("ymdHis").$userId."txt";
		$treeOutName = "outFiles/treeOut".date("ymdHis").$userId."txt";
		while( (($randSeed = rand()) % 2) == 0){}
		
		$printStr = $fileInName."\nF\n".$fileOutName."\nV\n100\nJ\n".$randSeed."\n10\nY\nF\n".$treeOutName; //Seems iffy
		fwrite($parsIn, $printStr);
		
		fclose($parsIn);
		
	}else{
		die("Unequal number of cut entries and phages!");
	}



?>