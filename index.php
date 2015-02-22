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
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.2-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<script rel = "Code" type="javascript" href="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
	<script rel = "Code" type="javascript" href="jQuery/jquery-1.11.2.min.js"></script>
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
		
		<div class="maintabs">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#description">Description</a></li>
				<li><a data-toggle="tab" href="#petTool">PET Tool</a></li>
				<li><a data-toggle="tab" href="#results">Results</a></li>
			</ul>
			
			<div class="tab-content">
				<div id="description" class="tab-pane fade in active">
					<h3>Description</h3>
					
				</div>
				
				<div id="petTool" class="tab-pane fade">
					<h3>Pet Tool</h3>
				</div>
				
				<div id="results" class="tab-pane fade">
					<h3>Results</h3>
				</div>
				
           </div>
		</div>
		
			<div class="docs-header" id="content">
				 			
				<div class="container">
					<h1>Capstone Project <small>Group 3</small></h1>
					<p>Just a little show of what bootstrap can do!!!</p>
				</div>
			</div>
			
			<div class="container">
				<div class="page-header"><h1>This should be the staging area!!!!</h1></div>
				<div class="vic"><h1>Attempt at using GitHub.</h1></div>
				<div class="row">
				<div class="col-md-8">Extremely awesome coloring website! Nice job <a href="http://www.lavishbootstrap.com/">here</a>!</div>
				</div>
			</div>
			
			
	</body>
</html>