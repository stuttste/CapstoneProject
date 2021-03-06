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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
		
			<div class="docs-header" id="content">
			
				<div class="container">
					<p>On this page are tools for changing your password or deleting your account if you no longer wish for it to exist.</p>
				</div>
			</div>
			
			<div class ="passwordChange">
				<h3>Password Change</h3>
				<div class="form-inline">
					<label for="oldpassword">Enter old password:</label>
					<input type="text" class="form-control" placeholder = "Enter Old Password">
				</div>	
				<div class="form-inline">			
					<label for="newpasssword">Enter new password:</label>
					<input type="text" class="form-control" placeholder = "Enter New Password">
				</div>
				<div class="form-inline">
					<label for="reenterpassword">Re-enter new password:</label>
					<input type="text" class="form-control" placeholder = "Re-enter New Password">
				</div>
			</div>
 <button type="button">Change password!</button> 
			<div class ="deleteAccount">
				<h3>Delete Account</h3>
				<div class="form-inline">
					<label for="deleteacc">Enter email for the account to delete:</label>
					<input type="text" class="form-control" placeholder = "Enter email">
				</div>	
			</div>
 <button type="button">Delete account?</button> 	
		<div class="container">
		</div>
	</body>
</html>