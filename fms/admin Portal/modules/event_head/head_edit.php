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
      <a class="navbar-brand" href="../../index.php">ADMIN PANEL</a>  
    </div>
      <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="#">Home<span style="font-size:16px;"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span><span style="font-size:16px;" ></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="../event/event_c.php">Create Event</a></li>
            <li ><a href="../event/event_l.php">List Events</a></li>
          </ul>
        </li>          
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Colleges<span style="font-size:16px;" span class="caret"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="../college/coll_search.php">Search by Name</a></li>
            <li><a href="../college/coll_all.php">All Colleges</a></li>
          </ul></li>        
        <li class="active" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Event Heads<span style="font-size:16px;" span class="caret"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="../event_head/head_add.php">Add Event Head</a></li>
            <li class="active" ><a href="../event_head/head_edit.php">Edit Event Head</a></li>
          </ul></li>
        <li ><a href="#">Manage Other Accounts<span style="font-size:16px;"></span></a></li>
        <li ><a href="#">Setting<span style="font-size:16px;"></span></a></li>
        <li ><a href="../../logout.php">Logout<span style="font-size:16px;"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">          
<table class="table table-hover " class="table1" style="margin-left: 300px; width:1000px;">
    <caption class="heading1"><h3>List of Event Heads</h3></caption>
     <thead>
      <tr>
		<th>Sno</th>
        <th>ID</th>
        <th>Name</th>
        <th>Contact No</th>
        <th>Email</th>
        <th>Event</th>
        <th>Password</th>
		<th></th>
		<th></th>
      </tr>
    </thead>
    <?php
	include '../../php/connection.php';
	$sql = $conn->prepare("SELECT * from event_head");
    $sql->execute();

    echo '<tbody align="left">';
        $sno = 0;
		while($row = $sql->fetch(PDO::FETCH_ASSOC))
			{
				$sno +=1;
				$eid = $row["e_id"];
				$hname = $row["h_name"];
				$hemail = $row["h_email"];
				$hcontact = $row["h_contact"];
				$hpass = $row["h_pass"];
				$hid = $row["h_id"];
			    if($eid == NULL)
				{
					$ename = "Not Assigned ";
				}
				else
				{
					$sql2 = $conn->prepare("SELECT e_name FROM list_events WHERE e_id = '$eid'");
					$sql2->execute();
					$row2 = $sql2->fetch(PDO::FETCH_ASSOC);
					$ename = $row2['e_name'];
					
				}
  echo '<tr>';		
  echo '<td>'.$sno.'</td>
        <td>'.$hid.'</td>
        <td>'.$hname.'</td>
        <td>'.$hcontact.'</td>
        <td>'.$hemail.'</td>
		<td>'.$ename.'</td>
        <td>'.$hpass.'</td>';
  echo    '<td>  
        	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal'.'e'.$sno.'">Edit</button>
        	<div class="modal fade" id="myModal'.'e'.$sno.'" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h3 class="modal-title">'.$hname.'</h3>
                  </div>
                  <div class="modal-body">
                     <div class="container">
                <form class="form-horizontal" action="php/edit.php" method="POST">
                 <input type="hidden" value="'.$hid.'" name="id"/>
				 <div class="row">
    <div class="col-sm-12 col-lg-9">
     <div class="form-group">
      <label class="control-label col-md-4" for="name">Name:</label>
      <div class="col-md-8">
        <input type="text" name="name" value="'.$hname.'"class="form-control" id="name" placeholder="Enter Event Head name" required>
      </div>
     </div>
    </div>
    
   <div class="col-sm-12 col-lg-9">                                        
    <div  class="form-group">                                               
     <label class="control-label col-md-4" for="email">Email:</label>     
      <div class="col-md-8">          
        <input type="email" name="email" value="'.$hemail.'"class="form-control" id="email" placeholder="Enter Event Head email id" required>
      </div>
    </div>
   </div>
   <div class="col-sm-12 col-lg-9">
    <div  class="form-group"> 
     <label class="control-label col-md-4" for="contact">Contact No:</label>
      <div class="col-md-8">          
        <input type="number" name="contact" value="'.$hcontact.'"class="form-control" id="contact" placeholder="Enter Event Head contact" required>
      </div>
    </div>
   </div>
		<div class="col-sm-12 col-lg-9">
    <div  class="form-group">
      <label class="control-label col-md-4" for="pass">Password:</label>
      <div class="col-md-8">          
        <input type="password" name="pass" value="'.$hpass.'"class="form-control" id="pass" placeholder="Enter Password" required>
      </div>
    </div>
		</div>
   
<div class="col-sm-12 col-lg-9">
    <div class="form-group">        
      <div class="col-md-offset-4 col-md-8">
        <button type="submit" class="btn btn-default" >Submit</button>
      </div>
	</div>
	</div>
   </div>	  	  
  </form>
						  </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

        	
        </td>';
	echo '<td>
	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal'.'d'.$sno.'">Delete</button>
        <div class="modal fade" id="myModal'.'d'.$sno.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$hname.'</h4>
        </div>
        
        <div class="modal-body">
            
            <h3 class="modal-title"></h3>
            <div class="container">
            <form class="form-horizontal" action="php/delete.php" method="POST">
            <div class="row">
            <div class="col-sm-10 col-lg-7">
             <div class="form-group"><br>
			 <h4 class="col-md-2"></h4>
			 <h4 class="col-md-10">ARE YOU SURE YOU WANT TO REMOVE THIS HEAD ?</h4>
			 <input type="hidden" name="id" value="'.$hid.'" />';	
        echo ' <div class="col-sm-10 col-lg-7">
    <div class="form-group">        
      <div class="col-md-offset-7 col-md-11">
        <button type="submit" class="btn btn-default">Yes</button>
      </div>
    </div>
	   </div>
			</div>
			</form>
		  </div>
			</div>
		  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>				
  </tr>';
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
