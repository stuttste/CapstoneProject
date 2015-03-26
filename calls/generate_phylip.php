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
	$generalPath = "/var/www/staging/calls/";	//Needed for config files.
	$phylipPath = "/var/www/staging/phylip-3.696/";	//Needed to find Phylip files.
	$currDate = date("ymdHis");		//Do this now so all files will have the same date header.
	
	//Let's go ahead and define all the file names we will be using.
	$fileInName = "infile_".$currDate.$userId;
	$treeInName = "intree_".$currDate.$userId;
	$parsInName = "parsIn_".$currDate.$userId;
	$consenseInName = "consenseIn_".$currDate.$userId;
	$drawGramInName = "drawgramIn_".$currDate.$userId;
	
	
	$fileOutName = "outfile_".$currDate.$userId;
	$treeOutName = "outtree_".$currDate.$userId;
	$treeOutName2 = "outtree_Second_".$currDate.$userId;
	$fontPath = $phylipPath."exe/font1";
	$plotFileName = "plotFileDrawgram_".$currDate.$userId;
	$plotFilePDFName = "plotFileDrawgramPDF_".$currDate.$userId;
	
	
	//Make all the folders we will be needing.
	if(!file_exists('inputFiles')){
			mkdir('inputFiles');
	}
	if(!file_exists('confFiles')){
			mkdir('confFiles');
	}
	if(!file_exists('outFiles')){
			mkdir('outFiles');
	}
	
	//The number of cut count entries must be equal to the number of phages.
	//Please note I am not referring to the number of enzymes, I am referring to the number
	//		of enzyme LISTS sent into the page.
	
	if($phageCount == $cutCount){
		
		//Create our parsIn file. Specifies the phages and cuts for the tree.
		
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
		//	We will store that file in confFiles folder.
		
		$parsIn = fopen($parsInName, "w") or die("Unable to open pars config file!");
		
		while( (($randSeed = rand()) % 2) == 0){}
		
		$printStr = $generalPath.$fileInName."\nF\n".$generalPath.$fileOutName."\nV\n100\nJ\n".$randSeed."\n10\nY\nF\n".$generalPath.$treeOutName;
		fwrite($parsIn, $printStr);
		
		fclose($parsIn);
		
		//Our pars config file is now finished. On to the consense config file.
		//	We will store that file in confFiles folder.
		
		$consenseIn = fopen($consenseInName, "w") or die("Unable to open consense config file!");
		
		$printStr = $generalPath.$treeInName."\nF\n".$generalPath.$fileOutName."\nC\nY\nF\n".$generalPath.$treeOutName;
		fwrite($consenseIn, $printStr);
		
		fclose($consenseIn);
		
		//Our consense config file is now finished. On to the drawgram/drawtree config file.
		// We will store that file in confFiles folder.
		
		$drawGramIn = fopen($drawGramInName, "w") or die("Unable to open drawgram file!");
		
		$printStr = $generalPath.$treeInName."\n".$fontPath."\nP\nL\nV\nN\nY\nF\n".$generalPath.$plotFileName;
		fwrite($drawGramIn, $printStr);
		
		fclose($drawGramIn);
		
		//That's it for the config files. Now to run Phylip.
		
		//$commandStr = "cd ".$generalPath."outFiles";
		//echo exec($commandStr);
		
		$commandStr = $phylipPath."exe/pars < ".$generalPath.$parsInName." > /dev/null 2>&1";
		echo exec($commandStr);
		
		$commandStr = "/bin/cp " . $generalPath.$treeOutName . " " . $generalPath.$treeInName . " > /dev/null 2>&1";
		echo exec($commandStr);
		
		$commandStr = $phylipPath."exe/consense < ".$generalPath.$consenseInName." > /dev/null 2>&1";
		echo exec($commandStr);
		
		$commandStr = "/bin/cp " . $generalPath.$treeOutName . " " . $generalPath.$treeInName . " > /dev/null 2>&1";
		echo exec($commandStr);
		
		$commandStr = $phylipPath."exe/drawgram < ".$generalPath.$drawGramInName." > /dev/null 2>&1";
		echo exec($commandStr);
		
		$commandStr = "/usr/bin/ps2pdf ".$generalPath.$plotFileName." ".$generalPath.$plotFilePDFName." > /dev/null 2>&1";
		echo exec($commandStr);
		
	}else{
		die("Unequal number of cut entries and phages!");
	}



?>