<html>
<head> <link rel="stylesheet" type="text/css" href="indexbackground.css" />

<form action="adminlogin.php" method="POST">

<table align="right">
<tr>
<td>ID</td>
<td>:</td>
<td><input type="text" name="adminid"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="adminpass"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Login as Admin"></td>
</tr>
</table>
</form>

<form action="studentlogin.php" method="POST">
<table align="left">
<tr>
<td>ID</td>
<td>:</td>
<td><input type="text" id="studentid" name="studentid"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" id="studentpass" name="studentpass"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Login as Student"></td>
</tr>
</table>
</form>


</html>

