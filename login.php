<!DOCTYPE html>
<?php
include_once 'includes/db_connect.php';
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/global.css">
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
			<div class = "row-fluid">
				<div class = "col-md-12" style="text-align: center">
					<h1>Welcome to the PET Tool!</h1>
				</div>
				</div>
			<div class="row-fluid vertical-center" >
				<div class="col-md-5">
					<form class="form-signin" action="includes/process_login.php" method="post" name="login_form"> 
						<h2 class="form-signin-heading">Sign In</h2>
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
				
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <div class="col-md-5 col-md-offset-2">
				<h1>Make an Account</h1>
				<?php
					if (!empty($error_msg)) {
						echo $error_msg;
					}
					?>
        <ul class="list-group">
					<li>Personal data will not be distributed to third parties without consent and is only gathered in order to gather usage data about this tool.</li>
					<li>Emails must have a valid email format</li>
					<li>Passwords must be at least 6 characters long</li>
					<li >Passwords must contain
						<ul>
							<li>At least one upper case letter (A..Z)</li>
							<li>At least one lower case letter (a..z)</li>
							<li>At least one number (0..9)</li>
						</ul>
					</li>
					<li>Your password and confirmation must match exactly</li>
				</ul>
				<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
						method="post" 
						name="registration_form"
						class="form-signin">
						<label for="inputUsername" class="sr-only">Username</label>
						<input type='text' 
							name='username' 
							id='username' class="form-control" placeholder="Username"/>
						<label for="inputEmail" class="sr-only">Email</label>
						<input type="text" name="email" id="email" class="form-control" placeholder="Email" />
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password"
									 name="password" 
									 id="password" class="form-control" placeholder="Password" />
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" 
											 name="confirmpwd" 
											 id="confirmpwd" class="form-control" placeholder="Retype Password" />
										
											 <input type='text' 
							name='Fname' 
							id='Fname' class="form-control" placeholder="First name"/>
						<label for="inputFname" class="sr-only">Fname</label>
					
											 <input type='text' 
							name='Lname' 
							id='Lname' class="form-control" placeholder="Last name"/>
						<label for="inputLname" class="sr-only">Lname</label>
					
											 <input type='text' 
							name='State' 
							id='State' class="form-control" placeholder="State"/>
						<label for="State" class="sr-only">State</label>
						
											 <input type='text' 
							name='Univ' 
							id='Univ' class="form-control" placeholder="University"/>
						<label for="Univ" class="sr-only">Univ</label>
						
					<input type="button" 
						   value="Register" 
						   onclick="return regformhash(this.form,
										   this.form.username,
										   this.form.email,
										   this.form.password,
										   this.form.confirmpwd,
										   this.form.Fname,
										   this.form.Lname,
										   this.form.State,
										   this.form.Univ,
										  );" 
							class="btn btn-lg btn-primary btn-block" /> 
				</form>
				
		</div>
    </body>
</html>




