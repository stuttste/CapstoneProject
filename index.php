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
		
		/*$('#enzymeTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
		
		$('#bestResultTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
		
		$('#resultsTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );*/
		
	 
		/*$('#phageButton1').click(function (){
			var selectedPhage = $('#phage option:selected').val();
			var selectedCluster = $('#cluster option:selected').val();
			var selectedSubCluster = $('#subcluster option:selected').val();
			$.each($('#phageTableBody tr'), function () {
				if($(this).find('td:first').text() == "Test"){
					$(this).find('td:first').text(selectedPhage);
					$(this).find('td:nth-child(2)').text(selectedCluster);
					$(this).find('td:nth-child(3)').text(selectedSubCluster);
					return false;
				}
				
			})
		});*/
		
		$('#phageButton').click(function (){
				
				
				var selectedId = "." + $('#phage option:selected').val();
				alert(selectedId);
				
				table.rows( selectedId ).every( function (){
					this.child().hide();
				});
				
				/*
				var type;
				var id;
				var selectedId;
				var xmlhttp;
				var len;
				
				selectedId = $('#phage option:selected').val();
				
				if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}else{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				//for(var i = 0, len=document.getElementById("phage").options.length; i < len; i++){
					
					
					//id = document.getElementById("phage").options[i];
					
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							//if(id.selected){
								var compStr = xmlhttp.responseText;
								var partStr = compStr.split(", ");
								$(".odd").remove();
								$("#phageTable").DataTable().row.add(partStr).draw();
							//}
						}
					}
					xmlhttp.open("GET","calls/phageEnzymeCall.php?type=Phage&id="+selectedId,true);
					xmlhttp.send();
				*/
				
				
		});
		
		$('#enzymeButton').click(function (){
				
				
				var selectedId = "." + $('#enzselection option:selected').val();
				alert(selectedId);
				
				table
					.columns( selectedId )
					.visible( false );
				
		});
		
		$('#clusterButton').click(function (){
				var type;
				var id;
				var selectedId;
				var xmlhttp;
				var len;
				
				selectedId = $('#cluster option:selected').val();
				
				if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}else{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				//for(var i = 0, len=document.getElementById("phage").options.length; i < len; i++){
					
					
					//id = document.getElementById("phage").options[i];
					
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							//if(id.selected){
								var compStr = xmlhttp.responseText;
								var partStr = compStr.split(", ");
								$(".odd").remove();
								$("#phageTable").DataTable().row.add(partStr).draw();
							//}
						}
					}
					xmlhttp.open("GET","calls/phageEnzymeCall.php?type=Cluster&id="+selectedId,true);
					xmlhttp.send();
				
				
				
		});
		
		
		/*$('#enzymeButton').click(function (){
			var selectedEnzyme = $('#enzselection option:selected').val();
			$.each($('#enzymeTableBody tr'), function () {
				if($(this).find('td:first').text() == "Test" || $(this).find('td:first').text() == "Data" || $(this).find('td:first').text() == "Here"){
					$(this).find('td:first').text(selectedEnzyme);
					return false;
				}
				
			})
		});*/

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


		//$('#button').click( function () {
			//alert( table.rows('.selected').data().length +' row(s) selected' );
		//} );
		});
	</script>
	</head>


	<body>
		
		<nav class="navbar navbar-inverse sidebar" role="navigation">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Homepage<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
						<li ><a href="UserSubmit.html">User Submission<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="AdminToolsPage.html">Administration Tools<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="CutPage.html">Cut Results<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="EditAccount.html">Edit Acount<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
						<li ><a href="LicensePage.html">License Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			
			<div id="petTool">
						<h3>Pet Tool</h3>
						
			                
						<div class="row">
							<div class="col-md-3">
							<form class="inline-block">
								<div class="form-group">
									<label for="phage">Phage:</label>
									<input type="text" class="form-control" placeholder = "Select Phage" id="phageSelect">
									<select multiple class="form-control" id="phage" rows="10">
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
									<button type="button" id ="phageButton">Add Phage</button>									
								</div>
							</div>
							<div class="col-md-3">
							
								<div class="form-group">
									<label for="cluster">Cluster:</label>
									<input type="text" class="form-control" placeholder = "Select Cluster" id="clusterSelect">
									<select multiple class="form-control" id="cluster" rows="10">
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
									<button type="button" id = "clusterButton">Add Cluster</button>									
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="subcluster">Subcluster:</label>
									<input type="text" class="form-control" placeholder = "Select Subcluster" id="subSelect">
									<select multiple class="form-control" id="subcluster" rows="10">
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
									<button type="button">Add Subcluster</button>									
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
										<label for="enzselection">Enzyme</label>
										<input type="text" class="form-control" placeholder = "Select Enzyme" id="enzSelect">
										<select multiple class="form-control" id="enzselection" rows="10">
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
										<button type="button" id="enzymeButton">Add Enzyme</button>	 									
								</div>
							</div>
							</form>
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
							<table class="table-responsive">
								<table class="table table-bordered" id="phageTable">
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>Subcluster</th>
										<?php
													if ($sql = $mysqli->prepare("SELECT `Name` FROM `ENZYME`")) {
														$sql->execute();
														$sql->bind_result($name);
														while($sql->fetch()){
																echo '<th class= "'.$name.'">'.$name.'</th>';
														}
														$sql->close();
													}
										?>
									</thead>
									<tbody>
										<?php
												if ($sql = $mysqli->prepare("SELECT `Name`, `Cluster`, `Subcluster` FROM `PHAGE`")) {
													$sql->execute();
													$sql->bind_result($name, $cluster, $sub);
													while($sql->fetch()){
															echo '<tr class= "'.$name.'"><td>'.$name.'</td><td>'.$cluster.'</td><td>'.$sub.'</td></tr>';
													}
													$sql->close();
												}
										?>
									<!--
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>Subcluster</th>
										<th>Enzyme</th>
									</thead>
									<tbody id="phageTableBody">
										<!-- Data gets plugged in here-->
									</tbody>
								</table>
							</table>
									    <button type="button">Clear</button>
										<button type="button">Reset</button>
										<br />
							</div>
			
							<!--<div class="col-md-6">
							<table class="table-responsive">
								<table class="table table-bordered" id="enzymeTable">
									<thead>
										<th>Enzyme</th>
									</thead>
									<tbody id="enzymeTableBody">
										Data gets plugged in here
									</tbody>
									
								</table>
							</table>
							</div>-->
						</div>
			                
					</div>
				
					
	</body>
	
	
	
</html>