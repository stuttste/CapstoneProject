<?php
include 'includes/db_connect.php';
include 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
	header('Location: login.php');
	die();
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>G3Capstone Staging</title>
	<!--<link rel="stylesheet" type="text/css" href="bootstrap-3.3.2-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<script rel = "Code" type="javascript" href="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
	<script rel = "Code" type="javascript" href="jQuery/jquery-1.11.2.min.js"></script>
	-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript" class="init">
	$(document).ready(function() {
		var table = $('#phageTable').DataTable({
				"scrollX": true
			});
		//var etable = $('#enzymeTable').DataTable();
		var btable = $('#bestResultTable').DataTable();
		var rtable = $('#resultsTable').DataTable();
		var hiddenTable = $('#hiddenSearchTable').DataTable();
		
		$('#phageTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
		
		$('#hiddenSearchTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
		
		$('#phageButton').click(function (){
				
				searchPhages();
				
				
		});

		var textFilter = function (selectionEl, str, isCaseSensitive) {
			if (isCaseSensitive)
				str = str.toLowerCase();
			var $el = $(selectionEl);
		if (!$el.data("options")) {
			$el.data("options", $el.find("option").clone());
		}
		var newOptions = $el.data("options").filter(function () {
			var text = $(this).text();
			if (isCaseSensitive)
				text = text.toLowerCase();
			return text.match(str);
		});
		$el.empty().append(newOptions);
		};
		$("#phageSelect").on("keyup", function () {
			var userInput = $("#phageSelect").val();
			textFilter($("#phage"), userInput);
		});
		
		$("#clusterSelect").on("keyup", function () {
			var userInput = $("#clusterSelect").val();
			textFilter($("#cluster"), userInput);
		});
		
		$("#subSelect").on("keyup", function () {
			var userInput = $("#subSelect").val();
			textFilter($("#subcluster"), userInput);
		});
		
		$("#enzSelect").on("keyup", function () {
			var userInput = $("#enzSelect").val();
			textFilter($("#enzselection"), userInput);
		});

	});
	
	function searchPhages(){
		var PhageForm = document.forms.PhageForm;
				var phageStr = "";
				var clusterStr = "";
				var subclusterStr = "";
				var enzStr = "";
				
				
				for(x=0; x<PhageForm.phageSelectBox.length; x++){
					if(PhageForm.phageSelectBox[x].selected){
						if(phageStr === "")
							phageStr += PhageForm.phageSelectBox[x].value;
						else
							phageStr += "," + PhageForm.phageSelectBox[x].value;
					}
				}
				
				for(x=0; x<PhageForm.clusterSelectBox.length; x++){
					if(PhageForm.clusterSelectBox[x].selected){
						if(clusterStr === "")
							clusterStr += PhageForm.clusterSelectBox[x].value;
						else
							clusterStr += "," + PhageForm.clusterSelectBox[x].value;
					}
				}
				
				for(x=0; x<PhageForm.subclusterSelectBox.length; x++){
					if(PhageForm.subclusterSelectBox[x].selected){
						if(subclusterStr === "")
							subclusterStr += PhageForm.subclusterSelectBox[x].value;
						else
							subclusterStr += "," + PhageForm.subclusterSelectBox[x].value;
					}
				}
				
				for(x=0; x<PhageForm.enzSelectBox.length; x++){
					if(PhageForm.enzSelectBox[x].selected){
						if(enzStr === "")
							enzStr += PhageForm.enzSelectBox[x].value;
						else
							enzStr += "," +  PhageForm.enzSelectBox[x].value;
					}
				}
				
				if(phageStr === "")
					phageStr = "No_phage";
				if(clusterStr === "")
					clusterStr = "No_cluster";
				if(subclusterStr === "")
					subclusterStr = "No_subcluster";
				if(enzStr === "")
					enzStr = "No_enzymes";
				
				$.ajax({
					url: "calls/phageLookup.php?phages=" + phageStr + "&clusters=" + clusterStr + "&subclusters=" + subclusterStr + "&enzymes=" + enzStr,
					success: function(data){
							var table = $('#phageTable').DataTable();
							
							table.destroy();
							$('#phageTable').empty();
							var t = document.getElementById("phageTable");
							t.innerHTML = data;
							
							var table = $('#phageTable').DataTable({
								"scrollX": true
							});
							table.draw();
					}
				});
	}
	</script>
	</head>


	<body>
		
		<nav class="navbar navbar-inverse sidebar" role="navigation">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Homepage<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
						<li ><a href="UserSubmit.html">User Submission<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="AdminToolsPage.php">Administration Tools<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="CutPage.html">Cut Results<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="EditAccount.html">Edit Account<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
						<li ><a href="LicensePage.html">License Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="demographics.html">Demographics<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			
			<div id="petTool">
						<h3>Pet Tool</h3>
						
			                
						<div class="row">
							<div class="col-md-3">
							<form name="PhageForm" class="inline-block">
								<div class="form-group">
									<label for="phage">Phage:</label>
									<input type="text" class="form-control" placeholder = "Select Phage" id="phageSelect">
									<select name= "phageSelectBox" multiple class="form-control" id="phage" rows="10">
									<?php
										if ($sql = $mysqli->prepare("SELECT `Name` FROM `PHAGE`")) {
											$sql->execute();
											$sql->bind_result($name);
											while($sql->fetch()){
													echo "<option>".$name."</option>";
											}
											$sql->close();
										}
										?>
									</select>									
								</div>
							</div>
							<div class="col-md-3">
							
								<div class="form-group">
									<label for="cluster">Cluster:</label>
									<input type="text" class="form-control" placeholder = "Select Cluster" id="clusterSelect">
									<select name="clusterSelectBox" multiple class="form-control" id="cluster" rows="10">
									<?php
										if ($sql = $mysqli->prepare("SELECT DISTINCT `Cluster` FROM `PHAGE` ORDER BY `Cluster`")) {
											$sql->execute();
											$sql->bind_result($name);
											while($sql->fetch()){
													echo "<option>".$name."</option>";
											}
											$sql->close();
										}
										?>
									</select>								
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="subcluster">Subcluster:</label>
									<input type="text" class="form-control" placeholder = "Select Subcluster" id="subSelect">
									<select name="subclusterSelectBox" multiple class="form-control" id="subcluster" rows="10">
									<?php
										if ($sql = $mysqli->prepare("SELECT DISTINCT `Subcluster` FROM `PHAGE` ORDER BY `Subcluster`")) {
											$sql->execute();
											$sql->bind_result($name);
											while($sql->fetch()){
													echo "<option>".$name."</option>";
											}
											$sql->close();
										}
										?>
									</select>								
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
										<label for="enzselection">Enzyme</label>
										<input type="text" class="form-control" placeholder = "Select Enzyme" id="enzSelect">
										<select name="enzSelectBox" multiple class="form-control" id="enzselection" rows="10">
											<?php
												if ($sql = $mysqli->prepare("SELECT `Name` FROM `ENZYME`")) {
													$sql->execute();
													$sql->bind_result($name);
													while($sql->fetch()){
															echo "<option>".$name."</option>";
													}
													$sql->close();
												}
											?>
										</select>
										<input type="checkbox">Add Unknown Phage?</input><button type="button" id="phageButton">Search</button>	 									
								</div>
							</div>
							</form>
							</div>
							
							<div class="row" id="unknownPhage">
								
							
							
							</div>
							
							
							<div class="row" id ="hiddenDiv" style="display: none;">
							<div class="col-md-6">
							<table class="table-responsive">
								<table class="table table-bordered" id="hiddenSearchTable">
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>Subcluster</th>
										<th>Enzyme</th>
									</thead>
									<tbody id="hiddenSearchTableBody">
										
									</tbody>
								</table>
							</table>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered table-responsive" id="phageTable">
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>Subcluster</th>
										</thead>
										<tbody>
									</tbody>
								</table>
										<br />
							</div>
						</div>
			                
					</div>
				
					
	</body>
	
	
	
</html>