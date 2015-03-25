<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.2-dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/register.css">
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <div class="container">
			<div class="jumbotron">
				<h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul class="list-group">
					<li>Usernames may contain only digits, upper and lower case letters and underscores</li>
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
					
<label for="inputInst" class="sr-only">User</label>
						<input type='text' 
							name='Institution' 
							id='username' class="form-control" placeholder="Place your institution that you attend or work for here"/>
<label for="inputUsername" class="sr-only"></label>
						<input type='text' 
							name='username' 
							id='username' class="form-control" placeholder="Username"/>
<label for="inputUsername" class="sr-only">Username</label>
						<input type='text' 
							name='username' 
							id='username' class="form-control" placeholder="Username"/>

<input type="button" 
						   value="Register" 
						   onclick="return regformhash(this.form,
										   this.form.username,
										   this.form.email,
										   this.form.password,
										   this.form.confirmpwd);" 
							class="btn btn-lg btn-primary btn-block" /> 
				</form>
				<h6>Return to the <a href="index.php">login page</a>.</h6>
				
			</div>
		</div>
    </body>
</html>