<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"></head>
<?php
//Include database configuration file
include('include/db_connect.php');

if(isset($_POST["city_ID"]) && !empty($_POST["city_ID"])){
    //Get all city data
    $query = $mysqli->query("SELECT * FROM county WHERE city_ID = ".$_POST['city_ID']);
 
    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display  cities list
    if($rowCount > 0){
        echo '<option value="">Select county</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['county_ID'].'">'.$row['county_name'].'</option>';
        }
    }else{
        echo '<option value="">County not available</option>';
    }
}

if(isset($_POST["county_ID"]) && !empty($_POST["county_ID"])){
    //Get all city data
	echo "asdasd";
    $query = $mysqli->query("SELECT * FROM school WHERE county_ID = ".$_POST['county_ID']." ");
 
    //Count total number of rows
    $rowCount = $query->num_rows;
  
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select school</option>';
		 
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['school_ID'].'">'.$row['school_name'].'</option>';
			
        }
    }else{
        echo '<option value="">School not available</option>';
    }
}




?>
</html>