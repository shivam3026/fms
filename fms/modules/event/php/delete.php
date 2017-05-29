<?php
include '../../../php/connection.php';
try
{
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	$eid = $_POST["eId"];
	$query1 = 'SELECT h_id FROM list_events WHERE e_id = :eid';
    $sql = $conn->prepare($query1);	
//$sql->bindParam(':id', 'NULL');
    $sql->bindParam(':eid', $eid);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $hid = $result["h_id"];
	$query2 = 'UPDATE event_head SET e_id= NULL WHERE h_id = :id';
$sql = $conn->prepare($query2);	
//$sql->bindParam(':id', $id);
$sql->bindParam(':id', $hid);
$sql->execute();

	$query = "DELETE FROM list_events WHERE e_id = '$eid'";
	$conn->exec($query);
	header('Location:../event_l.php');
	}
	
}
catch(Exception $e)
{
	
}
?>