<!DOCTYPE html>
<?php
include_once 'includes/db_connect.php';
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<html>
    <head>
        <title>Verify Account</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/global.css">
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
		
    </head>
    <body>
		<?php
			if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
				// Verify data
				$email = mysql_escape_string($_GET['email']); // Set email variable
				$hash = mysql_escape_string($_GET['hash']); // Set hash variable
				
				//$search = mysql_query("SELECT email, hash, active FROM MEMBERS WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
				//$match  = mysql_num_rows($search);
				
				if ($sql = $mysqli->prepare("SELECT `email`, `hash`, `active` FROM `MEMBERS` WHERE `email`='".$email."' AND `hash`='".$hash."' AND `active`='0'")) {
					$sql->execute();
					$sql->bind_result($email);
					while($sql->fetch()){
						echo $email;
					}
				$sql->close();
				
			}else{
				// Invalid approach
			}
		?>
    </body>
</html>




