<?php

 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
    $cname = $_POST["cname"];
 	try
    {
    $query = $conn->prepare("SELECT * FROM coll_reg WHERE rcollege = :college");
 	$query->bindParam(':college',$cname);
    $query->execute();
    $results = $query->fetch(PDO::FETCH_ASSOC);
    if(count($results) > 0)
    {
    	$rname = $results["rname"];
    	$rcollege = $results["rcollege"];
    	$rphone = $results["rphone"];
    	$remail = $results["remail"];
    }
    else
    {
    	$errmsg = "<h1>College Not Registered</h1>";
    }
 $conn = null;
 }
 catch(Exception $e)
 {
    echo $e;
 }           
 }
 
 ?>



