<?php
echo "Creating Database......."."<br>";
$servername = "localhost";
$username = "root";     
$password = "";
try {
	 $conn = new PDO("mysql:host=$servername",$username,$password);
	 $conn->exec("CREATE DATABASE fms");    
	 echo "Database Created Sucessfully...."."<br>";
	} catch (PDOException $e)
	{
		die("Error in creating DATABASE".$e->getMessage());
	}
	$conn = null;
?>
<?php
$servername = "localhost";
$username = "root";        
$password = "";   
$dbname = "fms";  
	try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	$conn->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected Sucessfully to Database :". $dbname;
    echo "<br>"."Creating tables...."."<br>";
    $sql =   "CREATE TABLE event_head (
             h_id bigint(10) NOT NULL,
             h_name varchar(200) NOT NULL,
             h_contact bigint(10) NOT NULL,
             h_email varchar(100) NOT NULL,
             e_id varchar(10) DEFAULT NULL,
             h_pass varchar(200) NOT NULL,
             PRIMARY KEY (h_id)
             ) ENGINE=MyISAM DEFAULT CHARSET=latin1";

    $conn->exec($sql);

    $sql = "CREATE TABLE list_events (
            id int(10) NOT NULL,
            e_id varchar(10) NOT NULL,
            e_name varchar(100) NOT NULL,
            e_desc text NOT NULL,
            e_rules text NOT NULL,
            e_startt time(6) DEFAULT NULL,
            e_endt time(6) DEFAULT NULL,
            h_id varchar(10) DEFAULT NULL,
            e_maxt int(10) NOT NULL,
            e_maxp int(10) NOT NULL,
            e_type tinyint(1) NOT NULL,
            e_pass varchar(100) DEFAULT NULL,
            image_path varchar(200) NOT NULL,
            PRIMARY KEY (id)
           ) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1";

    $conn->exec($sql);

	$sql = "CREATE TABLE p_list (
           p_id int(50) NOT NULL AUTO_INCREMENT,
           p_name varchar(5000) NOT NULL,
           p_contact bigint(12) NOT NULL,
           p_email varchar(5000) NOT NULL,
           c_id varchar(50) NOT NULL,
           e_id varchar(50) NOT NULL,
           team_id varchar(50) NOT NULL,
          PRIMARY KEY (p_id)
         ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1";


	$conn->exec($sql);
	 echo "Tables Created";

	}
    catch(Exception $e)
	{
		echo "Error occured".$e;
	}
	
?>