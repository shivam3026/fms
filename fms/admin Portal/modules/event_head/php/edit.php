<?php
include '../../../php/connection.php';
try
{
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$hname = $_POST["name"];
	$hcontact = $_POST["contact"];
	$hemail = $_POST["email"];
	$hpass = $_POST["pass"];
	$hid = $_POST["id"];
//	echo "<h1>".$eid." ".$ename." ".$edesc." ".$erules." ".$emaxp." ".$emaxt."</h1>";
	$query1 = "UPDATE event_head SET h_name=:hname ,h_contact=:hcontact ,h_email=:hemail ,h_pass=:hpass WHERE h_id =:hid";
	$sql = $conn->prepare($query1);
	$sql->bindParam(':hid',$hid);
	$sql->bindParam(':hname',$hname);
	$sql->bindParam(':hcontact',$hcontact);
	$sql->bindParam(':hemail',$hemail);
	$sql->bindParam(':hpass',$hpass);
	$sql->execute();
//	echo '<script>alert("Done");</script>';
	header('Location:../head_edit.php');
}
}
catch(Exception $e)
{
	echo "Error".$e;
}

?>