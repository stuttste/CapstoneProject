<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
						<p>Description of Biology department</p>
						<p>Instructions on how to use PET Tool here maybe</p>
					</div>
				
					<div id="petTool" class="tab-pane">
						<h3>Pet Tool</h3>
							<form class="inline-block">
								<div class="form-group">
									<label for="phage">Phage:</label>
									<textarea class="form-control" id="phage" rows="10"></textarea>
								</div>
								
								<div class="form-group">
									<label for="cluster">Cluster:</label>
									<textarea class="form-control" id="cluster" rows="10"></textarea>
								</div>
								
								<div class="form-group">
									<label for="subcluster">Subcluster:</label>
									<textarea class="form-control" id="subcluster" rows="10"></textarea>
								</div>
								
								<div class="form-group">
									<label for="enzyme">Enzyme:</label>
									<textarea class="form-control" id="enzyme" rows="10"></textarea>
								</div>
							</form>
							
							<form class="form-horizontal inline-block">
									<div class="form-group pull-left">
										<label ><input type="radio" name="phage">Phage</label>
										<label><input type="radio" name="clusterbut">Cluster</label>
										<label><input type="radio" name="subclusterbut">Subcluster</label>
										<input type="text" class="form-control">
										<textarea class="form-control" id="selectionbox" rows="10"></textarea>
									</div>
									<div class="form-group pull-right">
										<label for="enzselection">Enzyme</label>
										<input type="text" class="form-control" placeholder = "Select Enzyme">
										<textarea class="form-control" id="enzselection" rows="10"></textarea>
									</div>
							</form>
							
							
					</div>
				
					<div id="results" class="tab-pane">
						<h3>Results</h3>
							<div class="resulttoptable">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Phage</th>
											<th>Cluster</th>
											<th>Subcluster</th>
											<th>Percentage</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Top Phage</td>
											<td>Top Phage Cluster</td>
											<td>Top Phage Subcluster</td>
											<td>Top Phage Percent</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div>
							<h3>Table results in words</h3>
							</div>
							<div class="resultstable">
								<table id="myTable">  
									<thead>  
										<tr>  
											<th>ENO</th>  
											<th>EMPName</th>  
											<th>Country</th>  
											<th>Salary</th>  
										</tr>  
									</thead>  
									<tbody>  
										<tr>  
											<td>001</td>  
											<td>Anusha</td>  
											<td>India</td>  
											<td>10000</td>  
										</tr>  
										<tr>  
											<td>002</td>  
											<td>Charles</td>  
											<td>United Kingdom</td>  
											<td>28000</td>  
										</tr>  
										<tr>  
											<td>003</td>  
											<td>Sravani</td>  
											<td>Australia</td>  
											<td>7000</td>  
										</tr>  
										<tr>  
											<td>004</td>  
											<td>Amar</td>  
											<td>India</td>  
											<td>18000</td>  
										</tr>  
										<tr>  
											<td>005</td>  
											<td>Lakshmi</td>  
											<td>India</td>  
											<td>12000</td>  
										</tr>  
										<tr>  
											<td>006</td>  
											<td>James</td>  
											<td>Canada</td>  
											<td>50000</td>  
										</tr>  
          								<tr>  
											<td>007</td>  
											<td>Ronald</td>  
											<td>US</td>  
											<td>75000</td>  
										</tr>  
										<tr>  
											<td>008</td>  
											<td>Mike</td>  
											<td>Belgium</td>  
											<td>100000</td>  
										</tr>  
										<tr>  
											<td>009</td>  
											<td>Andrew</td>  
											<td>Argentina</td>  
											<td>45000</td>  
										</tr>  
										<tr>  
											<td>010</td>  
											<td>Stephen</td>  
											<td>Austria</td>  
											<td>30000</td>  
										</tr>  
										<tr>  
											<td>011</td>  
											<td>Sara</td>  
											<td>China</td>  
											<td>750000</td>  
										</tr>  
										<tr>  
											<td>012</td>  
											<td>JonRoot</td>  
											<td>Argentina</td>  
											<td>65000</td>  
										</tr>  
										</tbody>  
								</table>  
								<script>
									$(document).ready(function(){
									$('#myTable').dataTable();
									});
								</script>
								<table id="myTable" class="table table-striped">
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>