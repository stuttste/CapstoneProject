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
				
				if ($sql = $mysqli->query("SELECT `Email`, `Salt`, `Active` FROM `MEMBERS` WHERE `Email`='".$email."' AND `Salt`='".$hash."' AND `Active`='0'")) {
					//$sql->execute();
					$row_cnt=$sql->num_rows;
					//while($sql->fetch()){
						printf("Result set has %d rows. \n", $row_cnt);
					//}
				$sql->close();
				
			}else{
				printf("Problem with the SQL");
			}
			}
		?>
    </body>
</html>




