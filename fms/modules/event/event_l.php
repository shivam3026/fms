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
        <li class="active" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span><span style="font-size:16px;" ></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="event_c.php">Create Event</a></li>
            <li class="active"><a href="event_l.php">List Events</a></li>
          </ul>
        </li>          
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Colleges<span style="font-size:16px;" span class="caret"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="../college/coll_search.php">Search by Name</a></li>
            <li><a href="../college/coll_all.php">All Colleges</a></li>
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
<div class="container-fluid">
<div>          
<table class="table table-hover " class="table1" style="margin-left: 300px; width:1000px;">
    <caption class="heading1"><h3>List of Events</h3></caption>
     <thead>
      <tr>
		<th >Sno</th>
        <th >Event ID</th>
        <th >Event Name</th>
        <th >Event Head Name</th>
        <th >Event Head Phone No</th>
        <th >Max Teams Per College</th>
		<th >Max Students Per Team</th>
        <th></th>
        <th></th>
        <th></th>
		<th></th>
      </tr>
    </thead>
    <?php
	include '../../php/connection.php';
	$sql = $conn->prepare("SELECT * from list_events");
    $sql->execute();

	
	    	
		
    echo '<tbody align="left">';
        $sno = 0;
		while($row = $sql->fetch(PDO::FETCH_ASSOC))
			{
				$sno +=1;
				$eid = $row["e_id"];
				$ename = $row["e_name"];
				$edesc = $row["e_desc"];
				$erules = $row["e_rules"];
				$emaxt = $row["e_maxt"];
				$emaxp = $row["e_maxp"];
				$hid = $row["h_id"];
			    if($hid == NULL)
				{
					$hid = "Not Assigned ";
					$hname = "Not Assigned ";
					$hcontact = "Not Assigned";
				}
				else
				{
					$sql2 = $conn->prepare("SELECT * FROM event_head WHERE h_id = '$hid'");
					$sql2->execute();
					$row2 = $sql2->fetch(PDO::FETCH_ASSOC);
					$hname = $row2['h_name'];
					$hcontact = $row2['h_contact'];
				}
  echo '<tr>';		
  echo '<td>'.$sno.'</td>
        <td>'.$eid.'</td>
        <td>'.$ename.'</td>
        <td>'.$hname.'</td>
        <td>'.$hcontact.'</td>
        <td>'.$emaxt.'</td>
        <td>'.$emaxp.'</td>';
	
       echo  '<td>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal'.$sno.'">Assign Head</button>
        <div class="modal fade" id="myModal'.$sno.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$ename.'</h4>
        </div>
        
        <div class="modal-body">
            
            <h3 class="modal-title">Assign Event head</h3>
            <div class="container">
            <form class="form-horizontal" action="php/assignHead.php" method="POST">
            <div class="row">
            <div class="col-sm-10 col-lg-7">
             <div class="form-group"><br><br>
			 <input type="hidden" name="eId" value="'.$eid.'"/>
            <label class="control-label col-md-4">Select Event Head:</label>
             <select class="col-md-7" name="selectHead">
				<option value="non" >Unassign</option>';
		$sql3 = $conn->prepare("SELECT h_id,h_name FROM event_head WHERE e_id IS NULL");
		$sql3->execute();	  	
		while($row3 = $sql3->fetch(PDO::FETCH_ASSOC))
		{
			$headName = $row3["h_name"];
			$headId = $row3["h_id"];
			
            echo  '<option value="'.$headId.'" >'.$headName.'</option>';
		}
		
        echo '</select><br><br>
         <div class="col-sm-10 col-lg-7">
    <div class="form-group">        
      <div class="col-md-offset-9 col-md-11">
        <button type="submit" class="btn btn-default">Submit</button>
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
        </td>';
      echo  '<td>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal'.'v'.$sno.'">View</button>
        <div class="modal fade" id="myModal'.'v'.$sno.'" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$ename.'</h4>
        </div>
        <div class="modal-body">
             <h1>Event Description</h1>
<pre>
'.$edesc.'
</pre>
<h1>Event Rules</h1>
<pre>
'.$erules.'
</pre>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
       </td>';
    echo    '<td>  
        	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal'.'e'.$sno.'">Edit</button>
        	<div class="modal fade" id="myModal'.'e'.$sno.'" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h3 class="modal-title">'.$ename.'</h3>
                  </div>
                  <div class="modal-body">
                     <div class="container">
                <form class="form-horizontal" action="php/edit.php" method="POST">
          <div class="row">
      <div class="col-sm-10 col-lg-7">
     <div class="form-group">
      <label class="control-label col-md-4" for="eventn">Event Name:</label>
      <div class="col-md-8">
	    <input type="hidden" name="eid" value="'.$eid.'"/>
        <input type="text" name="eventn" class="form-control" id="eventn" placeholder="Enter event name"
	     value ="'.$ename.'"required>
      </div>
		  </div>
    </div>
    
		<div class="col-sm-10 col-lg-7">
    <div  class="form-group">
      <label class="control-label col-md-4" for="eventd">Event Description:</label>
      <div class="col-md-8">          
        <textarea name="eventd" class="form-control" id="eventd" placeholder="Enter event description"   required>'.$edesc.'</textarea>
      </div>
    </div>
		</div>
		<div class="col-sm-10 col-lg-7">
    <div  class="form-group">
      <label class="control-label col-md-4" for="eventr">Event Rules:</label>
      <div class="col-md-8">          
        <textarea name="eventr" class="form-control" id="eventr" placeholder="Enter event rules" required>'.$erules.'</textarea>
      </div>
    </div>
		</div>
		<div class="col-sm-10 col-lg-7">
    <div  class="form-group">
      <label class="control-label col-md-4" for="eventmaxt">Max teams:</label>
      <div class="col-md-8">          
        <input type="number" name="eventmaxt" class="form-control" id="eventmaxt" placeholder="Enter Maximum no of teams per college" value="'.$emaxt.'"required>
      </div>
    </div>
		</div>
    <div class="col-sm-10 col-lg-7">
    <div  class="form-group">
      <label class="control-label col-md-4" for="eventmaxp">Max students:</label>
      <div class="col-md-8">          
        <input type="number" class="form-control" name="eventmaxp" id="eventmaxp" placeholder="Enter Max students per team" value="'.$emaxp.'"required>
      </div>
    </div>
		</div>
   <div class="col-sm-10 col-lg-7">
    <div class="form-group">        
      <div class="col-md-offset-4 col-md-8">
        <button class="btn btn-default" type="submit" >Submit</button>
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
          <h4 class="modal-title">'.$ename.'</h4>
        </div>
        
        <div class="modal-body">
            
            <h3 class="modal-title"></h3>
            <div class="container">
            <form class="form-horizontal" action="php/delete.php" method="POST">
            <div class="row">
            <div class="col-sm-10 col-lg-7">
             <div class="form-group"><br>
			 <h4 class="col-md-2"></h4>
			 <h4 class="col-md-10">ARE YOU SURE YOU WANT TO DELETE THIS EVENT ?</h4>
			 <input type="hidden" name="eId" value="'.$eid.'" />';	
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
	
	</td>';			
				
				
			}
?>		 
    </tbody>
    </table>
	</div>
	</div>
<script src="../../js/jquery-1.11.3.min.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
</body>
</html>