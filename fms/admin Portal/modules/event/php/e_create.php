<?php
$errmsg = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{  
    $ename = $_POST["eventn"];
	$edesc = $_POST["eventd"];
	$erules = $_POST["eventr"];
	$emaxt = $_POST["eventmaxt"];
	$emaxp = $_POST["eventmaxp"];
	$etype = $_POST["type"];
    try
	{
		$sql1 = $conn->prepare("SELECT id FROM list_events ORDER BY id DESC LIMIT 1");
		$sql1->execute();
		$results = $sql1->fetch(PDO::FETCH_ASSOC);
		$count =$sql1->rowCount();
		if($count == 0)
		{
			$id = 1;		
		}
		else
		{
			$id = $results["id"];
		    $id = $id + 1;
        
		}
		
		$eid = "INT".$id;
		
		$temp = explode(".", $_FILES["image"]["name"]);
        $target_file = $eid . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $target_file);
		
		if(strcmp($etype,"technical")==0)
		{
			$etype = 1;
		}
		else
		{
			$etype = 0;
		}
		
		
		
	$sql3 = "INSERT INTO list_events (id,e_id,e_name,e_desc,e_rules,e_maxt,e_maxp,e_type,image_path) VALUES ('$id','$eid','$ename','$edesc','$erules','$emaxt','$emaxp','$etype','$target_file')";
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