<?php
session_start();
ob_start();
session_destroy();
echo "<center>You are logged out! You are redirected to the home...</center>";
header("Refresh: 2; url=index.php");
ob_end_flush();
?>