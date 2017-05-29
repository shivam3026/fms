<?php
include '../../../php/connection.php';
try
{
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	$hid = $_POST["id"];
	$query1 = 'SELECT e_id FROM event_head WHERE h_id = :hid';
    $sql = $conn->prepare($query1);	
//$sql->bindParam(':id', 'NULL');
    $sql->bindParam(':hid', $hid);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $eid = $result["e_id"];
	$query2 = 'UPDATE list_events SET h_id= NULL WHERE e_id = :id';
$sql = $conn->prepare($query2);	
//$sql->bindParam(':id', $id);
$sql->bindParam(':id', $eid);
$sql->execute();

	$query = "DELETE FROM event_head WHERE h_id = '$hid'";
	$conn->exec($query);
	header('Location:../head_edit.php');
	}
	
}
catch(Exception $e)
{
	
}
?>