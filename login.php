<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.2-dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/signin.css">
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
		<div class="container">
			<div class="jumbotron">
				<form class="form-signin" action="includes/process_login.php" method="post" name="login_form"> 
					<h2 class="form-signin-heading">Please sign in</h2>
					<label for="inputEmail" class="sr-only">Email Address</label>
					<input type="email" name="email" class="form-control" placeholder="Email address" />
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
					<input type="button" 
						   value="Login" 
						   onclick="formhash(this.form, this.form.password);"
						   class="btn btn-lg btn-primary btn-block" /> 
				</form>
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<h6>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</h6>';
 
            echo '<h6>Do you want to change user? <a href="includes/logout.php">Log out</a>.</h6>';
        } else {
                        echo '<h6>Currently logged ' . $logged . '.</h6>';
                        echo "<h6>If you don't have a login, please <a href='register.php'>register</a></h6>";
                }
?>      
			</div>
		</div>
    </body>
</html>