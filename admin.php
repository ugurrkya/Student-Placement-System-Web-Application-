<html>
    <head>
        <title>Authority Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="adminbackground.css" />
    </head>
    <body>
	
		 <div id="profile1" style="color:red;margin-left:0px;margin-top:0px"><b>WELCOME!</b></div><br>
		 


<form id="form7" name="form7" method="post" action="">
					
					
					
					<div style='color:white; margin-left:20px; margin-top:-10px'><button  name="viewnewreport">VIEW NEW REPORTS</button></div>
					 
</form>

<form id="form7" name="form7" method="post" action="">
					
					
					
					<div style='color:white; margin-left:220px; margin-top:-38px'><button  name="viewallreport">VIEW ALL REPORTS</button></div>
					 
</form>
<form id="form3" name="form3" method="post" action="logout.php">
					<br><br><br><br><br><br>
					
					
					<p style='color:white; margin-left:1500px; margin-top:420px'><button  name="logout">LOGOUT</button></p>
					 
</form>
	  <form action="" name="sil" method="POST">
	<input type='submit' name='sil' style='display:none; width:30' value='DELETE'>
	<input type='submit' name='con' style='display:none; width:30' value='CONFIRM'>
        
<?php
          include("include/db_connect.php");

		  ob_start();
@session_start();

if(!isset($_SESSION["adminlogin"])){
    header("Location:index.php");
}
else {
		
			if (isset($_POST['viewnewreport'])){
			

			

					echo "<center><table border=1 cellspacing=2 cellpadding=2 bgcolor=#FFCC00 style='color:black; margin-left:390px; margin-top:-590px'>
          
            <th colspan=9 align='center'>STUDENT REPORTS</th>
          </tr>
          <tr>
            
            <th><i>STUDENT ID</i></th>
             <th><i>FULL NAME</i></th>
			  <th><i>AGE</i></th>
			   <th><i>CITY</i></th>
            <th><i>COUNTY</i></th>
            <th><i>SCHOOL</i></th>
			 <th><i>CONFIRM SITUATION</i></th>
			 <th><i>DELETE</i></th>
			 <th><i>CONFIRM</i></th>
          </tr>";
					
					
				   $query = $mysqli->query("SELECT * FROM sending_report WHERE confirm='Pending Approval'");
				    $rowCount = $query->num_rows;
				   
				   if($rowCount == 0){
				   
				   echo "<tr>";
				   echo "<th colspan=9 align='center'><b><p style='color:red;'><i>THERE IS NO NEW REPORT WHICH IS CONFIRM ON, TRY AGAIN LATER.</i></p></b></th>";
				   echo "</tr>";

				   }else{
				   
					while($record = $query->fetch_assoc()){
          
              $ID=$record["ID"];
			  $name=$record["full_name"];
			  $age=$record["age"];
			  $city=$record["city"];
			  $county=$record["county"];
			  $school=$record["school"];
			  $confirmsituation=$record["confirm"];
			  
					
					echo "<tr>";
         
              echo "<td>$ID</td>";
              
              echo "<td>$name</td>";
			   echo "<td>$age</td>";
			    echo "<td>$city</td>";
				 echo "<td>$county</td>";
				  echo "<td>$school</td>";
				   echo "<td>$confirmsituation</td>";
				   echo "<td><form id='form7' name='form7' method='post' action=''><input type='text' value='$ID' name='ID' style='display:none; width:30'><input type='submit' name='sil' value='DELETE'></form></td>";
				 echo "<td><form id='form8' name='form8' method='post' action=''><input type='text' value='$ID' name='ID' style='display:none; width:30'><input type='submit' name='con' value='CONFIRM'></form></td>";
				
				   
				
					
					echo "</tr></form>";
			  
				   }}
			}
				if (isset($_POST['sil'])){
					
				$del = $_POST['ID'];


$sonuc=("DELETE from sending_report WHERE ID='$del'");
 
if($mysqli->query($sonuc) === TRUE){
   
   
	echo "<html><div class='col-md-1 col-sm-12' id='lable1' style='color:red; margin-left:700px; margin-top:-610px;'><id='label1'><b>THE REPORT IS DELETED SUCCESSFULLY.</b></div></html>";
	

					echo "<center><table border=1 cellspacing=2 cellpadding=2 bgcolor=#FFCC00 style='color:black; margin-left:390px; margin-top:0px'>
          
            <th colspan=9 align='center'>STUDENT REPORTS</th>
          </tr>
          <tr>
            
            <th><i>STUDENT ID</i></th>
             <th><i>FULL NAME</i></th>
			  <th><i>AGE</i></th>
			   <th><i>CITY</i></th>
            <th><i>COUNTY</i></th>
            <th><i>SCHOOL</i></th>
			 <th><i>CONFIRM SITUATION</i></th>
			 <th><i>DELETE</i></th>
			 <th><i>CONFIRM</i></th>
          </tr>";
					
					
				   $query = $mysqli->query("SELECT * FROM sending_report WHERE confirm='Pending Approval'");
					while($record = $query->fetch_assoc()){
          
              $ID=$record["ID"];
			  $name=$record["full_name"];
			  $age=$record["age"];
			  $city=$record["city"];
			  $county=$record["county"];
			  $school=$record["school"];
			  $confirmsituation=$record["confirm"];
			 
					
					echo "<tr>";
         
              echo "<td>$ID</td>";
              
              echo "<td>$name</td>";
			   echo "<td>$age</td>";
			    echo "<td>$city</td>";
				 echo "<td>$county</td>";
				  echo "<td>$school</td>";
				   echo "<td>$confirmsituation</td>";
				   echo "<td><form id='form7' name='form7' method='post' action=''><input type='text' value='$ID' name='ID' style='display:none; width:30'><input type='submit' name='sil' value='DELETE'></form></td>";
					 echo "<td><form id='form8' name='form8' method='post' action=''><input type='text' value='$ID' name='ID' style='display:none; width:30'><input type='submit' name='con' value='CONFIRM'></form></td>";
				
				   
				
					
					echo "</tr></form>";
			  
					}
					
   
  
   
 }

			
			
			}
			
			if (isset($_POST['viewallreport'])){
					echo "<center><table border=1 cellspacing=2 cellpadding=2 bgcolor=#FFCC00 style='color:black; margin-left:390px; margin-top:-600px'>
          
            <th colspan=9 align='center'>STUDENT REPORTS</th>
          </tr>
          <tr>
            
            <th><i>STUDENT ID</i></th>
             <th><i>FULL NAME</i></th>
			  <th><i>AGE</i></th>
			   <th><i>CITY</i></th>
            <th><i>COUNTY</i></th>
            <th><i>SCHOOL</i></th>
			 <th><i>CONFIRM SITUATION</i></th>
			 
          </tr>";
					
					
				   $query = $mysqli->query("SELECT * FROM sending_report");
				   $rowCount2 = $query->num_rows;
				   if($rowCount2 == 0){
				   
				   echo "<tr>";
				   echo "<th colspan=9 align='center'><b><p style='color:red;'><i>THERE IS NO NEW REPORT CONFIRMED OR NEW.</i></p></b></th>";
				   echo "</tr>";

				   }else{
					while($record = $query->fetch_assoc()){
          
              $ID=$record["ID"];
			  $name=$record["full_name"];
			  $age=$record["age"];
			  $city=$record["city"];
			  $county=$record["county"];
			  $school=$record["school"];
			  $confirmsituation=$record["confirm"];
			 
					
					echo "<tr>";
         
              echo "<td>$ID</td>";
              
              echo "<td>$name</td>";
			   echo "<td>$age</td>";
			    echo "<td>$city</td>";
				 echo "<td>$county</td>";
				  echo "<td>$school</td>";
				   echo "<td>$confirmsituation</td>";
					echo "</tr></form>";
					}
			
				   }
			
			
			}
			
if (isset($_POST['con'])){
				
				$con = $_POST['ID'];


$sonuc=mysqli_query($mysqli,"UPDATE sending_report SET confirm='Approved' where ID='$con'");
 
if($sonuc>0){
   
   
	echo "<html><div class='col-md-1 col-sm-12' id='lable1' style='color:red; margin-left:700px; margin-top:-610px;'><id='label1'><b>THE REPORT IS CONFIRMED.</b></div></html>";
  

					echo "<center><table border=1 cellspacing=2 cellpadding=2 bgcolor=#FFCC00 style='color:black; margin-left:390px; margin-top:0px'>
					
            <th colspan=9 align='center'>STUDENT REPORTS</th>
          </tr>
          <tr>
            
            <th><i>STUDENT ID</i></th>
             <th><i>FULL NAME</i></th>
			  <th><i>AGE</i></th>
			   <th><i>CITY</i></th>
            <th><i>COUNTY</i></th>
            <th><i>SCHOOL</i></th>
			 <th><i>CONFIRM SITUATION</i></th>
			 <th><i>DELETE</i></th>
			 <th><i>CONFIRM</i></th>
          </tr>";
					
					
				   $query = $mysqli->query("SELECT * FROM sending_report WHERE confirm='Pending Approval'");
					while($record = $query->fetch_assoc()){
          
              $ID=$record["ID"];
			  $name=$record["full_name"];
			  $age=$record["age"];
			  $city=$record["city"];
			  $county=$record["county"];
			  $school=$record["school"];
			  $confirmsituation=$record["confirm"];
			 
					
					echo "<tr>";
         
              echo "<td>$ID</td>";
              
              echo "<td>$name</td>";
			   echo "<td>$age</td>";
			    echo "<td>$city</td>";
				 echo "<td>$county</td>";
				  echo "<td>$school</td>";
				   echo "<td>$confirmsituation</td>";
				   echo "<td><form id='form7' name='form7' method='post' action=''><input type='text' value='$ID' name='ID' style='display:none; width:30'><input type='submit' name='sil' value='DELETE'></form></td>";
					 echo "<td><form id='form8' name='form8' method='post' action=''><input type='text' value='$ID' name='ID' style='display:none; width:30'><input type='submit' name='con' value='CONFIRM'></form></td>";
				
				   
				
					
					echo "</tr></form>";
			  
					}
}
				
				
				
}			
			
			
			
			
			}

ob_end_flush();
?>
    
	
 </body>
</html>