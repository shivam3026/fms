<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#">INTERFACE v21</a></div>
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav pull-right">
<!--        <li><a href="#">Profile</a></li>-->
        <li><a href="#">Logout</a></li>
      </ul>
    </div>
  </div>
	</nav>
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>   
      </div>
      <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">PARTICIPANTS DETAILS<span style="font-size:16px;"></span></a></li>
        <li ><a href="#">EVENTS<span style="font-size:16px;"></span></a></li>
        <li ><a href="#">SUMMARY<span style="font-size:16px;"></span></a></li>
        <li ><a href="#">PROFILE<span style="font-size:16px;"></span></a></li>
<!--        <li ><a href="logout.php">LOGOUT<span style="font-size:16px;"></span></a></li>-->
      </ul>
    </div>
  </div>
</nav>

<div class="participants">
<div class="container-fluid">          
<table class="table table-hover " class="table1" style="margin-left: 300px; width:1000px;">
    <caption class="heading1"><h3>ENTER PARTICIPANTS DETAILS</h3></caption>
  <thead>
      <tr>
		<th>Sno</th>
        <th>Name</th>
        <th>Contact no</th>
        <th>Email</th>
      </tr>
  </thead>
  <form action="sendData.php" method="POST">
  <?php
	$sno = 0;
	$name = "";
	  $contact = "";
	  $email = "";
    echo '<tbody align="left">';
    while($sno < 20)
	{
		$sno +=1; 
  echo '<tr>';		
  echo '<td>'.$sno.'</td>
        <td> <input type="text" name="name" id="name" value="'.$name.'" required> </td>
		<td> <input type="number" name="contact" id="contact" value="'.$contact.'" required> </td>
        <td> <input type="email" name="email" id="email" value="'.$email.'" > </td>';
        
  echo '</tr>';
		
	}
			?>
		</tbody>
	<tfoot id="tfoot" align="center">
      <tr>
	     <td colspan="4"><input type="submit" value="NEXT"/></td>
    </tr>
	</tfoot>
		</form>
	</table>	
				
        
          
	
	
</div>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
