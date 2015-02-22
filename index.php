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
								<div class="centering" style="margin:0;padding:0;">
									<div class="radio">
										<label ><input type="radio" name="phage">Phage</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="clusterbut">Cluster</label>
									</div>
									<div class="radio">
										<label><input type="radio" name="subclusterbut">Subcluster</label>
									</div>
									<div class="form-group">
										<input type="text" class="form-control">
										<textarea class="form-control" id="selectionbox" rows="10"></textarea>
									</div>
								</div>
							</form>
					</div>
				
					<div id="results" class="tab-pane">
						<h3>Results</h3>
						<p>results are here</p>
					</div>
				
				</div>
			</div>
		</div>
	</body>
</html>