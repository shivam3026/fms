<?php
include '../../../php/connection.php';
try
{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST["selectHead"];
$eid = $_POST["eId"];
$query1 = 'SELECT h_id FROM list_events WHERE e_id = :eid';
$sql = $conn->prepare($query1);	
//$sql->bindParam(':id', 'NULL');
$sql->bindParam(':eid', $eid);
$sql->execute();
$result = $sql->fetch(PDO::FETCH_ASSOC);
$hid = $result["h_id"];
if($id == "non")
{
$query1 = 'UPDATE list_events SET h_id= NULL WHERE e_id = :eid';
$sql = $conn->prepare($query1);	
//$sql->bindParam(':id', 'NULL');
$sql->bindParam(':eid', $eid);
$sql->execute();
$query2 = 'UPDATE event_head SET e_id= NULL WHERE h_id = :id';
$sql = $conn->prepare($query2);	
//$sql->bindParam(':id', $id);
$sql->bindParam(':id', $hid);
$sql->execute();	
header('Location:../event_l.php');	
}
else
{
$query2 = 'UPDATE event_head SET e_id= NULL WHERE h_id = :id';
$sql = $conn->prepare($query2);	
//$sql->bindParam(':id', $id);
$sql->bindParam(':id', $hid);
$sql->execute();
$query1 = 'UPDATE list_events SET h_id=:id WHERE e_id = :eid';
$sql = $conn->prepare($query1);	
$sql->bindParam(':id', $id);
$sql->bindParam(':eid', $eid);
$sql->execute();
$query3 = 'UPDATE event_head SET e_id= :eid WHERE h_id = :id';
$sql = $conn->prepare($query3);	
$sql->bindParam(':id', $id);
$sql->bindParam(':eid', $eid);
$sql->execute();

header('Location:../event_l.php');

}
}
}
catch(Exception $e)
{
	echo "error".$e;
}

?>