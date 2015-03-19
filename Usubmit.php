?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';	
sec_session_start();

 if (login_check($mysqli) == false) {
	header('Location: login.php');
	die();

function upload()	
{
$phage = $_POST['phage'];
$cluster= $_POST['cluster'];
$subcluster= $_POST['subclust'];
$cut= $POST['cuts'];	
$enzyme = $POST['enzyme'];
$username= 'test';
$sql =	 "INSERT INTO SUBMISSIONS (INSERT INTO `MainDB`.`SUBMISSIONS` (`Name`, `Cluster`, `Subcluster`, `Enzyme`, `Cuts`, `Email`) VALUES ('$phage','$cluster','$subcluster','$cut','$enzyme','$username'');
"
mysqli_query($mysqli, $sql)
	
}

upload()

?