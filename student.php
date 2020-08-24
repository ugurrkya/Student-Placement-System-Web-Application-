<html>
<head>
  <meta charset="utf-8">
  
  <title> STUDENT PLACEMENT SYSTEM</title>



 
  <script src="jquery.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" type="text/css" href="studentbackground.css" />
   
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'countryAjaxData.php',
                success:function(html){
                    $('#city').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#city').on('change',function(){
        var cityID = $(this).val();
        if(cityID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'city_ID='+cityID,
                success:function(html){
                    $('#county').html(html);
                    $('#school').html('<option value="">Select county first</option>'); 
                                      }
                   }); 
                      }else{
                           $('#county').html('<option value="">Select city first</option>');
                           $('#school').html('<option value="">Select county first</option>'); 
                           }
    });
    
    $('#county').on('change',function(){
        var countyID = $(this).val();
        if(countyID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'county_ID='+countyID,
                success:function(html){
                    $('#school').html(html);
                                      }
                   }); 
                    }else{
                          $('#school').html('<option value="">Select county first</option>'); 
                         }
    });
	
	});
	 
				   </script>

</head><body>
	   <p id="profile1" style="color:red;margin-left:0px;margin-top:0px"><b>WELCOME! YOU CAN CHOOSE YOUR SCHOOL WHICH YOU WANT TO GO. </b></p><br>
               <form id="form" name="form" method="post" action="">
                         	<center> <div class="row">
					 
					<br><br><br><br><br>
					
					
					</center>
					
                    <center>
					<div class="col-md-1 col-sm-12" id="lable1" style="color:red"><id="label1">CITY</div>
                    <div class="col-md-2">
                     
					<select name="city" id="city" style='width:200px' class="chosen selectpicker form-control" required>
					<option value="">Select City</option>
					
                    </select></center><br><br>

                    </div>

		  
					   
					
					
                    <center><td><div class="col-md-1 col-sm-12" id="lable1"  style="color:red"><id="label1">COUNTY</div>
                    <div class="col-md-2">
                    <select class="selectpicker form-control" style='width:200px' name="county" id="county"  autofocus="autofocus" required>
                        <option value="">First Select City</option>                            
                    </select></center><br><br>
					
                    </div>

                 <center><div class="col-md-1 col-sm-12" id="label1" style="color:red"><id="label1">SCHOOL</div>
                    <div class="col-md-2">
                    <select class="selectpicker form-control" style='width:200px' name="school" id="school" standard title="Select an Option" autofocus="autofocus" required>
                    <option value="">First Select City</option>
                    </select></div></center>
					
                  </div>
                    </br>
					</div>
					</div>
					<center><input name="send" type="submit" value="Send Report"/>
					
					
					</form><br><br><br>
					<form id="form2" name="form2" method="post" action="">
					 <button name="show">VİEW CONFIRM SITUATION</button>
					 
</form></center>
					<form id="form3" name="form3" method="post" action="logout.php">
					<br><br><br><br><br><br>
					
					
					<p style='color:white; margin-left:1230px; margin-top:15px'><button  name="logout">LOGOUT</button></p>
					 
</form>
           
<?php				
			 include("include/db_connect.php");
			
			 ob_start();
@session_start();

if(!isset($_SESSION["studentlogin"])){
    header("Location:index.php");
	}
else {
				$studentid=$_SESSION["studentid"];
			
			   if (isset($_POST['show'])){
				   $query = $mysqli->query("SELECT * FROM sending_report WHERE ID ='$studentid'");
					while($fff = $query->fetch_assoc()){
					
					$name=$fff["full_name"];
					$city=$fff["city"];
					$county=$fff["county"];
					$school=$fff["school"];
					$confirmsituation=$fff["confirm"];
					
					
				
					
					
					
					}
					
				   echo "<html><table border=”2″ bgcolor=#FFCC00 style='color:black; margin-left:1150px; margin-top:-440px'><tr><td colspan=2 width=400><div align=”center”><center><b><u>YOUR REPORT</u></b></center></div></td></tr><tr><td width=200>Student ID:</td><td width=200>$studentid</td></tr><td width=200>Full Name:</td><td width=200>$name</td></tr><td width=200>Chosen City:</td><td width=200>$city</td></tr><td width=200>Chosen County:</td><td width=200>$county</td></tr><td width=200>Chosen School:</td><td width=200>$school</td></tr><td width=200>Confirm Situation:</td><td width=200>$confirmsituation</td></tr></table></html>";
				   
				   
				   
			   }
			   
			   
				   
	
			   if (isset($_POST['send'])){
    
				   
				$studentid=$_SESSION["studentid"];
				
				
    $query = $mysqli->query("SELECT * FROM city WHERE city_ID = ".$_POST['city']);
	while($cek = $query->fetch_assoc())
		{
		$city=$cek["city_name"];}
	$query = $mysqli->query("SELECT * FROM county WHERE county_ID = ".$_POST['county']);
	while($ak = $query->fetch_assoc())
		{
		$county=$ak["county_name"];}
	$query = $mysqli->query("SELECT * FROM school WHERE school_ID = ".$_POST['school']);
	while($bek = $query->fetch_assoc())
		{
		$school=$bek["school_name"];}
	$confirmsituation="Pending Approval";
	$query = $mysqli->query("SELECT * FROM student_info WHERE ID ='$studentid'");
	while($akd = $query->fetch_assoc())
		{
		$name=$akd["full_name"];}
	$query = $mysqli->query("SELECT * FROM student_info WHERE ID ='$studentid'");
	while($fff = $query->fetch_assoc())
		{
		$age=$fff["age"];}
	
	
		
		



$sql = "INSERT INTO sending_report (ID, full_name, age, city, county, school, confirm) VALUES ('$studentid', '$name' , '$age', '$city','$county','$school', '$confirmsituation')";


if($mysqli->query($sql) === TRUE){
	
	echo "<html><p id='profile1' style='color:white; font-size:20px; margin-left:1150px; margin-top:-400px'><b><u>Report Sent Successfuly!</u></b></p></html>";
	
}
else
{
	 echo "<html><p id='profile1' style='color:red; font-size:20px; margin-left:1150px; margin-top:-400px'><b><u>WARNING!</u></b></p></html>";
	 echo "<html><p id='profile1' style='color:white; margin-left:1140px; margin-top:-15px'><b>You already sent a report.</b></p></html>";
	  echo "<html><p id='profile1' style='color:white; margin-left:1140px; margin-top:-15px'><b>Control your confirm situation by clicking another button.</b></p></html>";
	
}
$mysqli->close();
			   }


}
	
ob_end_flush();	
?>
</body>
</html>