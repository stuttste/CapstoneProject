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
		
		
			<div class="docs-header" id="content">
				<nav class = "navbar navbar-inverse">
						<ul class="nav navbar-nav">
							<li><a href="index.html">Homepage</a></li>
							<li><a href="UserSubmit.html">User Submission</a></li>
							<li><a href="AdminToolsPage.html">Administration Tools</a></li>
							<li><a href="CutPage.html">Cut Results</a></li>
							<li><a href="EditAccount.html">Edit Acount</a></li>
							<li><a href="LicensePage.html">License Page</a></li>
						</ul>
				</nav>
				<div class="container">
					<h1>Capstone Project <small>Group 3</small></h1>
					<p>Just a little show of what bootstrap can do!!!</p>
				</div>
			</div>
			
			<div class="container">
				
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