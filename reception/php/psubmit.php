<?php
include 'connection.php';
$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$emaxt = $_POST["emaxt"];
$emaxp = $_POST["emaxp"];
for($i = 1;$i<=$emaxt;$i++)
{
	echo '<br>Team '.$i.':';
	for($j = 1;$j<=$emaxp;$j++)
	{
	echo '<br>Name:'.$name[$i][$j];
	echo 'Phone:'.$contact[$i][$j];
	echo 'Email:'.$email[$i][$j];
	}
	
}

//print_r($name);
//print_r($contact);
//print_r($email);

?>