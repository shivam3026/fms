<?php
 include 'connection.php';
 $q=$_GET['key'];
 $a = array();
 
 $sql = $conn->prepare("SELECT * FROM p_list"); 
 $sql->execute();
// $result = $sql->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($result);
 while($result = $sql->fetch(PDO::FETCH_ASSOC))
 {
     $a[] = $result["p_contact"];
	 
 }


$hint =array();
// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint[] = $name;
            } else {
                $hint [] = $name;
            }
        }
    }
}
echo json_encode($hint);

?>