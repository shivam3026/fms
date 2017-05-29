<?php
include '../../../php/connection.php';
try
{
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$eid = $_POST["eid"];
//	echo '<script>alert('.$eid.');</script>';
	$ename = $_POST["eventn"];
	$edesc = $_POST["eventd"];
	$erules = $_POST["eventr"];
	$emaxt = $_POST["eventmaxt"];
	$emaxp = $_POST["eventmaxp"];
//	echo "<h1>".$eid." ".$ename." ".$edesc." ".$erules." ".$emaxp." ".$emaxt."</h1>";
	$query1 = "UPDATE list_events SET e_name=:ename ,e_desc=:edesc ,e_rules=:erules ,e_maxt=:emaxt , e_maxp=:emaxp WHERE e_id =:eid";
	$sql = $conn->prepare($query1);
	$sql->bindParam(':eid',$eid);
	$sql->bindParam(':ename',$ename);
	$sql->bindParam(':edesc',$edesc);
	$sql->bindParam(':erules',$erules);
	$sql->bindParam(':emaxt',$emaxt);
	$sql->bindParam(':emaxp',$emaxp);
	$sql->execute();
//	echo '<script>alert("Done");</script>';
	header('Location:../event_l.php');
}
}
catch(Exception $e)
{
	echo "Error".$e;
}

?>