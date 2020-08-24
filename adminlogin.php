<?php 

include('include/db_connect.php');
ob_start();
session_start();

$adminid = $_POST['adminid'];
$adminpass = $_POST['adminpass'];
if($sql_check = mysqli_query($mysqli,"SELECT * FROM authority_info WHERE username='$adminid' and password='$adminpass' "));
 $row_cnt = mysqli_num_rows($sql_check);
 
    if ($row_cnt > 0){
    $_SESSION["adminlogin"] = "true";
    $_SESSION["adminid"] = $adminid;
    $_SESSION["adminpass"] = $adminpass;
    header("Location:admin.php");
}
else {
	if($adminid=="" or $adminpass=="") {
		echo "<center>Please, do not leave the ID or password blank..! <a href=javascript:history.back(-1)>Turn Back</a></center>";
	}
	else {
		echo "<center>ID or password is incorrect, please try again.<br><a href=javascript:history.back(-1)>Turn Back</a></center>";
	}
}

ob_end_flush();
?>
