<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>   
      <a class="navbar-brand" href="#">ADMIN PANEL</a>  
    </div>
      <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="../../index.php">Home<span style="font-size:16px;"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span><span style="font-size:16px;" ></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="../event/event_c.php">Create Event</a></li>
            <li ><a href="../event/event_l.php">List Events</a></li>
          </ul>
        </li>          
        <li class="active" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Colleges<span style="font-size:16px;" span class="caret"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="coll_search.php">Search by Name</a></li>
            <li class="active"><a href="coll_all.php">All Colleges</a></li>
          </ul></li>        
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Event Heads<span style="font-size:16px;" span class="caret"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="../event_head/head_add.php">Add Event Head</a></li>
            <li><a href="../event_head/head_edit.php">Edit Event Head</a></li>
          </ul></li>
        <li ><a href="#">Manage Other Accounts<span style="font-size:16px;"></span></a></li>
        <li ><a href="#">Setting<span style="font-size:16px;"></span></a></li>
        <li ><a href="../../logout.php">Logout<span style="font-size:16px;"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<table class="table table-hover" class="table1">
    <caption class="heading1"><h3>Colleges Registered</h3></caption>
     <thead>
      <tr>
        <th>Student Name</th>
        <th>College Name</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    <?php
      include '../../php/connection.php';
      $rname = $rcollege = $remail = $rphone = "";
      try
    {
    $query = $conn->prepare("SELECT * FROM coll_reg");
    $query->execute();
    while($results = $query->fetch())
    {
      $rname = $results["rname"];
      $rcollege = $results["rcollege"];
      $rphone = $results["rphone"];
      $remail = $results["remail"];
      echo '<tr>';
      echo '<td>'.$rname.'</td>';
      echo '<td>'.$rcollege.'</td>';
      echo '<td>'.$rphone.'</td>';
      echo '<td>'.$remail.'</td>';
      echo '</tr>';
    }
    }
    catch(Exception $e)
    {
      echo $e;
    }
     ?>
    </tbody>
  </table>
	</div>
<script src="../../js/jquery-1.11.3.min.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
</body>
</html>