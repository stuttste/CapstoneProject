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
		
		$('#enzselection').on('click', 'option', function(){
			var PhageForm = document.forms.PhageForm;
			var enzStr = "";
			var enzArr = "";
			var htmlOut = "";
			
			document.getElementById("enzymeCutCounts").innerHTML = "";
			
			for(x=0; x<PhageForm.enzSelectBox.length; x++){
					if(PhageForm.enzSelectBox[x].selected){
						if(enzStr === "")
							enzStr += PhageForm.enzSelectBox[x].value;
						else
							enzStr += "," +  PhageForm.enzSelectBox[x].value;
					}
			}
			
			enzArr = enzStr.split(",");
			
			for(var i = 0; i < enzArr.length; i++){
				htmlOut += '<div class="input-group col-md-3"><span class="input-group-addon">' + enzArr[i] + '</span><select class="form-control" id="' + enzArr[i] + 'up">';
				htmlOut += '<option>None</option><option>Few (1 to 5)</option><option>Some (6 to 15)</option>';
				htmlOut += '<option>Many (16 to 40)</option><option>Alot (41+)</option></select></div><br />';
			}
			
			document.getElementById("enzymeCutCounts").innerHTML = htmlOut;
			
		});
		
		$('#unknownPhageCheck').on('click', function(){
			if(document.getElementById("unknownPhageCheck").checked){
				document.getElementById("unknownPhage").style.display = "inline";
				document.getElementById("upTableRow").style.display = "inline";
			}else{
				document.getElementById("unknownPhage").style.display = "none";
				document.getElementById("upTableRow").style.display = "none";
			}
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
				
				var upHtmlOut = "<thead><th>Phage Name</th><th>Cluster</th><th>Subcluster</th>";
				var upEnzStr = "";
				
				
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
						
						upHtmlOut += "<th>"+ PhageForm.enzSelectBox[x].value + "</th>";
						upEnzStr += "<td>" + document.getElementById(PhageForm.enzSelectBox[x].value + "up").value + "</td>";
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
				
				upHtmlOut += "</thead><tbody><tr>";
				upHtmlOut += "<td>" + document.getElementById('UnknownPhageName').value + "</td><td>N/A</td><td>N/A</td>" + upEnzStr + "</tr></tbody>";
				
				document.getElementById('upTable').innerHTML = upHtmlOut;
				
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
						<!--<li ><a href="UserSubmit.html">User Submission<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>-->
						<?php
							 if (admin_check($mysqli) == true) {
								echo '<li ><a href="AdminToolsPage.php">Administration Tools<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>';
							}
						?>
						
						<li ><a href="EditAccount.php">Edit Account<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
						<li ><a href="LicensePage.php">License Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="demographics.php">Demographics<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li ><a href="includes/logout.php">Log Out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
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
										<input type="checkbox" id="unknownPhageCheck">Add Unknown Phage?</input><button type="button" id="phageButton" class="pull-right">Search</button>	 									
								</div>
							</div>
							</form>
							</div>
							
							
							<div class="row" id="unknownPhage" style="display: none">
								<form class="form-inline" name="unknownPhage">
									<div class="input-group col-md-3">
										<span class="input-group-addon">Phage Name</span><input type="text" class="form-control" id="UnknownPhageName" placeholder="Enter phage name"><br />
									</div>
									<div id="enzymeCutCounts">
									
									</div>
								</form>
							</div>
							
							<div class="row"  id="upTableRow" style="display:none">
								<div class = "col-md-12">
									<table id="upTable" border="1" style="width:100%">
									
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
					
			</div>
				
					
	</body>
	
	
	
</html>