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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
		
    </head>
    <body>
		<?php
			if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
				// Verify data
				$email = mysql_escape_string($_GET['email']); // Set email variable
				$hash = mysql_escape_string($_GET['hash']); // Set hash variable
				$flag = false;
				
				//$search = mysql_query("SELECT email, hash, active FROM MEMBERS WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
				//$match  = mysql_num_rows($search);
				
				if ($sql = $mysqli->query("SELECT `Email`, `Salt`, `Active` FROM `MEMBERS` WHERE `Email`='".$email."' AND `Salt`='".$hash."' AND `Active`='0'")) {
					//$sql->execute();
					$row_cnt=$sql->num_rows;
					
					if($row_cnt>0){
						$sql = $mysqli->query("UPDATE `MEMBERS` SET `Active` = 1 WHERE `Email`= '".$email."' AND `Salt` = '".$hash."' AND `Active`= 0");
						echo '<div class="state">Your account has been activated, you can now login</div><br /> <a href="login.php">Return to login page</a>';
						//print '<div id="myValue" style="visibility: hidden;">'.$flag.'</div>';
						$flag = true;
					} else{
						echo '<div class="state">The url is either invalid or you already have activated your account.</div><br /> <a href="login.php">Return to login page</a>';
					}
					
					$sql->close();
					
					
				
			}else{
				echo '<div class="state">Invalid approach, please use the link that has been sent to your email.</div><br /> <a href="login.php">Return to login page</a>';
			}
			
			//<div id="myValue" style="visibility: hidden;">'.$flag.'</div>
		?>
		<script type= "text/JavaScript">
			$(document).ready(function(){
				var flag = document.getElementById("myValue");
				alert(flag);
				if(flag){
					setInterval(function(){window.location.href = "http://g3cap.tk/staging/login.php"}, 5000);
				}
			});
		</script>
    </body>
</html>




