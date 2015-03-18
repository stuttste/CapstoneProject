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
		var table = $('#phageTable').DataTable();
		var etable = $('#enzymeTable').DataTable();
		var btable = $('#bestResultTable').DataTable();
		var rtable = $('#resultsTable').DataTable();
		
		$('#phageTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
		
		$('#enzymeTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
		
		$('#bestResultTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
		
		$('#resultsTable tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('active');
		} );
	 
	 
		//$('#button').click( function () {
			//alert( table.rows('.selected').data().length +' row(s) selected' );
		//} );
	} );
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
			<div id="maintabs">
				<ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
					<li class="active"><a href="#description" data-toggle="tab" >Description</a></li>
					<li><a href="#petTool" data-toggle="tab" >PET Tool</a></li>
					<li><a href="#results" data-toggle="tab" >Results</a></li>
				</ul>
			
				<div id="mytabs" class="tab-content">
					<div id="description" class="tab-pane active">
						<h3>Description</h3>
						<p>This tool has been created for the ULM Biology department in order to assist researchers in identifying and comparing unknown phages to existing phages. This tool has been updated to provide functions that will help assist research in development and its previous version can be found at: http://ec2-54-245-31-145.us-west-2.compute.amazonaws.com/  </p> 

						<p>Instructions</p>
					</div>
					
					
					<div id="petTool" class="tab-pane">
						<h3>Pet Tool</h3>
						<div class="row">
							<div class="col-md-6">
							<table class="table-responsive">
								<table class="table table-bordered" id="phageTable">
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>Subcluster</th>
									</thead>
									<tbody id="phageTableBody">
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
										</tr>
									</tbody>
								</table>
							</table>
									    <button type="button">Clear</button>
										<button type="button">Reset</button>
										<br />
							</div>
			
							<div class="col-md-6">
							<table class="table-responsive">
								<table class="table table-bordered" id="enzymeTable">
									<thead>
										<th>Enzyme</th>
									</thead>
									<tbody id="phageTableBody">
										<tr>
											<td>Test</td>
										</tr>
										<tr>
											<td>Data</td>
										</tr>
										<tr>
											<td>Here</td>
										</tr>
									</tbody>
									
								</table>
							</table>
							</div>
						</div>
			                <button type="button">Clear</button>
							<button type="button">Reset</button>						
							<br />
						<div class="row">
							<div class="col-md-6">
							<form class="inline-block">
								<div class="form-group">
									<label for="phage">Phage:</label>
									<input type="text" class="form-control" placeholder = "Select Phage">
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
									<button type="button">Add Phage</button>									
								</div>
							
								<div class="form-group">
									<label for="cluster">Cluster:</label>
									<input type="text" class="form-control" placeholder = "Select Cluster">
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
									<button type="button">Add Cluster</button>									
								</div>
							
								<div class="form-group">
									<label for="subcluster">Subcluster:</label>
									<input type="text" class="form-control" placeholder = "Select Subcluster">
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
							
								<div class="form-group">
										<label for="enzselection">Enzyme</label>
										<input type="text" class="form-control" placeholder = "Select Enzyme">
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
										<button type="button">Add Enzyme</button>	 									
								</div>
							</form>
							</div>
							</div>
					</div>
				
					<div id="results" class="tab-pane">
						<h3>Results</h3>
							<div class="row">
							<div class="col-md-12">
							<table class="table-responsive">
								<table class="table table-bordered" id="bestResultTable">
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>Subcluster</th>
										<th>Percentage</th>
									</thead>
									<tbody id="phageTableBody">
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
											<td>!</td>
										</tr>
									</tbody>
							<div>
							<h3>Table results in words</h3>
							</div>
							<div class="row">
							<div class="col-md-12">
							<table class="table-responsive">
								<table class="table table-bordered" id="resultsTable">
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>Subcluster</th>
										<th>Percentage</th>
									</thead>
									<tbody id="phageTableBody">
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
											<td>Percentage</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
											<td>Percentage</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
											<td>Percentage</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
											<td>Percentage</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
											<td>Percentage</td>
										</tr>
										<tr>
											<td>Test</td>
											<td>Data</td>
											<td>Here</td>
											<td>Percentage</td>
										</tr>
									</tbody>
								</table>
							</table>
									   	<button type="button">Return</button>
										<br />
							</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	
	
	
</html>