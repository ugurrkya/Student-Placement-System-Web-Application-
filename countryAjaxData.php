<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  </head>
<?php
//fetch all cities data from database
//Include database configuration file
include('include/db_connect.php');

    $query = $mysqli->query("SELECT * FROM city");// select all city from database 

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display cities list
    if($rowCount > 0)
		
		{
	echo '<option value="">Select City</option>';// initial message display{  
	//echo '<input type="text" >';// initial message display
   
        while($row = $query->fetch_assoc())
		{
			 
            echo '<option value="'.$row['city_ID'].'">'.$row['city_name'].'</option>';// select city id & name from city table
        }
    }
	else
	{
        echo '<option value="">City Not Available</option>'; //display when no data!
	}



?>
</html>