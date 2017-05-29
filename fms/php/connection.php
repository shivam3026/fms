<?php
$servername = "localhost";
$username = "root";        
$password = "bcamca100";   
$dbname = "fms";  
	try 
	{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	$conn->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}
    catch(Exception $e)
	{
		echo "Cannot connect to database";
	}

?>