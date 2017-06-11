<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{  
    $name = $_POST["name"];
	$regNo = $_POST["regNo"];
	$email = $_POST["email"];
	$contact = $_POST["contact"];
	$pass = $_POST["pass"];
    try
	{
		
     $sql3 = "INSERT INTO event_head (h_id,h_name,h_contact,h_email,h_pass) VALUES ('$regNo','$name','$contact','$email','$pass')";
	 $conn->exec($sql3);
      echo "<script>$(document).ready(function(){
$('#myModal').modal('show');
});</script>";
	}
	catch(Exception $e)
	{
		
		echo "error" . $e;
	}
	
	
}
?>