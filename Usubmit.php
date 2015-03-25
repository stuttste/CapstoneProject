<?php
include 'includes/db_connect.php';
include 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) 
 {
	header('Location: login.php');
	die();
  }
if (isset ($_POST['submit'])
{
	$phage = htmlentities($_POST['phagec']);
	$cluster = htmlentities($_POST['clustc']);
	$subcluster = htmlentities($_POST['subc']);
	$enzyme= htmlentities($_POST['enzymec']);
	$cuts = htmlentities($_POST['cutc']);
    $username= 'test';
    $sql ="INSERT INTO SUBMISSIONS (INSERT INTO `MainDB`.`SUBMISSIONS` (`Name`, `Cluster`, `Subcluster`, `Enzyme`, `Cuts`, `Email`) VALUES ('$phage','$cluster','$subcluster','$enzyme','$cut','$username'));"

mysqli_query($mysqli, $sql);
echo "your request is pending";
}
?> 