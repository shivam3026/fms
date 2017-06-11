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
<link href="../../jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="../../jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="../../jQueryAssets/jquery.ui.dialog.min.css" rel="stylesheet" type="text/css">
<link href="../../jQueryAssets/jquery.ui.resizable.min.css" rel="stylesheet" type="text/css">
<script src="../../js/jquery-1.11.3.min.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
 <?php 
 $rname = $rcollege = $rphone =$remail = $errmsg= " ";
 include "../../php/connection.php" ;
 include "php/coll_search_r.php" ; 
 ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="../../jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="../../jQueryAssets/jquery.ui-1.10.4.dialog.min.js"></script>
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
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Colleges<span style="font-size:16px;" span class="caret"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="coll_search.php">Search by Name</a></li>
            <li><a href="coll_all.php">All Colleges</a></li>
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

<br>
<span class="headingSearch">Search College</span>
<form class="form1" action="" method="post"><br><br><br><br><label>College Name :&emsp;</label><input type="text" name="cname">&emsp;<input id="show" type="submit" value="Submit"></form>
<div id="search">
  <form class="form2"><label>NAME:&emsp;</label><?php echo $rname;?> <br><br>
	<label>COLLEGE NAME:&emsp;</label><?php echo $rcollege;?><br><br>
	<label>PHONE:&emsp;</label><?php echo $rphone;?><br><br>
	<label>EMAIL:&emsp;</label><?php echo $remail;?><br><br>
  <?php echo $errmsg; ?>
  </form>
</div>
</body>
<script>
	
		
$(document).ready(function(){
    $("#show").click(function(){
        $("#search").show();
    });
});</script>
</html>
