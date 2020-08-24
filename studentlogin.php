<?php 

include("include/db_connect.php");
@session_start();
ob_start();



$studentid = $_POST['studentid'];
$studentpass = $_POST['studentpass'];
							
if($sql_check = mysqli_query($mysqli,"SELECT * FROM student_info WHERE ID='$studentid' and password='$studentpass' "));

 
    $row_cnt = mysqli_num_rows($sql_check);
 
    if ($row_cnt > 0){
    $_SESSION["studentlogin"] = "true";
    $_SESSION["studentid"] = $studentid;
    $_SESSION["studentpass"] = $studentpass;
    header("Location:student.php");
}
else {
	if($studentid=="" or $studentpass=="") {
		echo "<center>Please, do not leave the ID or password blank..! <a href=javascript:history.back(-1)>Turn Back</a></center>";
	}
	else {
		echo "<center>ID or password is incorrect, please try again.<br><a href=javascript:history.back(-1)>Turn Back</a></center>";
	}
}

ob_end_flush();
?>