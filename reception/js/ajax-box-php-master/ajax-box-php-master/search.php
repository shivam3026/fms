<?php
    // $key=$_GET['key'];
    // $array = array();
    // $con=mysql_connect("localhost","root","");
    // $db=mysql_select_db("demos",$con);
    // $query=mysql_query("select * from cfg_demos where title LIKE '%{$key}%'");
    // while($row=mysql_fetch_assoc($query))
    // {
    //   $array[] = $row['title'];
    // }
    // echo json_encode($array);


 include '../../../php/connection.php';
 $q=$_GET['key'];
 // $q = "shiv";
 $a = array();
 // $b = array();
 $sql = $conn->prepare("SELECT * FROM p_list"); 
 $sql->execute();
 
 while($result = $sql->fetch(PDO::FETCH_ASSOC))
 {
     $a[] = $result["p_name"];
 }
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// while($result = $sql->fetch(PDO::FETCH_ASSOC))
// {
// foreach($result as $x => $x_value) {
//     // echo "Key=" . $x . ", Value=" . $x_value;
//     echo $a[$x];
//     $a[$x] = $x_value;
//     echo "<br>";
// }
// }
// echo $a[$x];

//  $result = $sql->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
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
// echo json_encode($b);
?>
