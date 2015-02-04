<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
	header('Location: g3cap.tk/staging/login.php');
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
	<link rel="stylesheet" type="text/css" href="global.css">
	<script rel = "Code" type="javascript" href="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
	<script rel = "Code" type="javascript" href="jQuery/jquery-1.11.2.min.js"></script>
</head>
	<body>
		
		
			<div class="docs-header" id="content">
				<div class="container">
					<h1>Capstone Project <small>Group 3</small></h1>
					<p>Just a little show of what bootstrap can do!!!</p>
				</div>
			</div>
			
			<div class="container">
				<nav class = "navbar navbar-default">
						<ul class="nav navbar-nav">
							<li><a href="index.html">Homepage</a></li>
							<li><a href="index.html">Page2</a></li>
							<li><a href="index.html">Page3</a></li>
							<li><a href="index.html">Page4</a></li>
							<li><a href="index.html">Page5</a></li>
						</ul>
				</nav>
			</div>
			
		<div class="container">
			<div class="page-header"><h1>This should be the staging area!!!!</h1></div>
			<div class="vic"><h1>Attempt at using GitHub.</h1></div>
			<div class="row">
				<div class="col-md-8">Extremely awesome coloring website <a href="http://www.lavishbootstrap.com/">here</a>!</div>
			</div>
		</div>
	</body>
</html>