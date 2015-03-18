?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';	
function upload()	
{
$phage = $_POST['phage'];
$cluster= $_POST['cluster'];
$subcluster= $_POST['subclust'];
$cut= $POST['cuts'];	
$enzyme = $POST['enzyme'];
	
$sql =	 "INSERT INTO SUBMISSIONS ($phage,$cluster,$subcluster,$cut,$enzyme,$username)
"
if (mysqli_query($mysqli, $sql)) {
    echo "New record created successfully";		
}

upload()

?