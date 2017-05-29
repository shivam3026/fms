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
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/login.js"></script>
<script src="js/typeahead.min.js"></script>

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
   <div class="events">
    <center><h2>REGISTRATION</h2></center>
  <div class="container">
    <ul class="nav nav-tabs col-sm-8 col-lg-8">
    <li class="active"><a data-toggle="tab" href="#technical">Technical</a></li>
    <li><a data-toggle="tab" href="#nontechnical">Non Technical</a></li>
    <li><a data-toggle="tab" href="#summary">Summary</a></li>
  </ul>
	<br>
	<br>
	<br>
  <div class="tab-content">
   <!----------------- TECHNICAL EVENTS -------------------->
    <div id="technical" class="tab-pane fade in active">
     <div class="container">
       <div class="row">
         <?php         
         include 'php/connection.php';
         $sql = $conn->prepare("SELECT * FROM list_events WHERE e_type = 1");
         $sql->execute();
		   $pname = "";		 
	 $pcontact = "";	 
     $pemail = "";
     $cid = "CI2";
		$_SESSION["c_id"] =$cid;   
         while($row = $sql->fetch(PDO::FETCH_ASSOC))
         {
		        $eid = $row["e_id"];
				$ename = $row["e_name"];
				$edesc = $row["e_desc"];
				$erules = $row["e_rules"];
				$emaxt = $row["e_maxt"];
				$emaxp = $row["e_maxp"];
				$hid = $row["h_id"];
			    $image_path = $row["image_path"];
          echo '<div class="col-md-3" >
          <div class="thumbnail " >
          <a data-toggle="modal" data-target="#myModalr'.$eid.'" >
          <img src="../fms/modules/event/images/'.$image_path.'" alt="'.$ename.'" style="width:400px; height:200px;">
          <div class="caption">
          <p><strong>'.$ename.'</strong></p>
          </div>
          </a>
          </div>
          </div>';
		
			 
		  echo  '<div class="modal fade" id="myModalr'.$eid.'" role="dialog">
          <div class="modal-dialog modal-lg">
    
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$ename.'</h4>
          </div>
          <div class="modal-body">
                       <h1>Event Description</h1>
<pre id="pre_text">
'.$edesc.'
</pre>

<h1>Event Rules</h1>
<pre id="pre_text">
'.$erules.'
</pre>
        <center><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModals'.$eid.'" data-dismiss="modal">Next</button></center>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
	      </div>
	      </div>';
	   echo  '<div class="modal fade" id="myModals'.$eid.'" role="dialog" script="overflow-y:auto;">
          <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$ename.'</h4>
        </div>
        <div class="modal-body">';
          echo '<center><h3>ENTER PARTICIPANTS DETAILS</h3></center>';
          
          $x = 0;
		  $z = 0;	 
		  	 echo '<form id="submitform"  action="" method="post">
              
			  <input type="hidden" name="eid" value="'.$eid.'" />
			  <input type="hidden" name="cid" value="'.$cid.'" />
		      <input type="hidden" name="emaxt" value="'.$emaxt.'" />
			  <input type="hidden" name="emaxp" value="'.$emaxp.'" />
			  ';
			 
		  
		  while($x<$emaxt)
		  {
			  $x += 1;
			  $z += 1;
			  $y  = 0;
			  echo 	'<div class="container-fluid">
			  <table class="table table-hover" style="margin-left: 130px;margin-top: 0px;">
			  <caption class="heading1"><h4><b>Team '.$x.':</b></h4>
			  </caption>
              <thead>
              <tr>
		        <th>Name</th>
                <th>Contact No</th>
                <th>Email</th>
              </tr>
			  </thead>';
	
			  
  
//echo   "<script>
//    $(document).ready(function(){
//    $('input.typeahead').typeahead({
//        name: 'typeahead',
//        remote:'php/search.php?key=%QUERY',
//        filter: function(data) {
//            d = data;
//        resultList = data.map(function(item) {
//          return item.name;
//        });
//        return resultList;
//		limit : 10
//		
//    }).on('typeahead:select', function(ev, suggestion) {
//    $('#hidden-input').val(d[resultList.indexOf(suggestion)].id);
//});
//    </script>";		
			   echo   "<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typehead',
        remote:'php/search.php?key=%QUERY',
        limit : 10
    });
});
    </script>";
			  while($y<$emaxp)
			  {
				  $y +=1;
    	echo ' <tbody>
			   <td> 
			   
			   <input type="text" class="typeahead tt-query" autocomplete="off" pattern="[a-zA-Z\s]+" spellcheck="false" name="name['.$x.']['.$y.']" id="name['.$x.']"  value="'.$pname.'" title="Only Alphabets are allowed"> </td>
		       <td> <input type="text"  class="typeahead tt-query" name="contact['.$x.']['.$y.']" id="contact['.$x.']" value="'.$pcontact.'" maxlength="10" pattern="\d{10}" title="Please enter correct Mobile no."> </td>
               <td> <input type="email" class="typeahead tt-query" name="email['.$x.']['.$y.']" id="email['.$x.']" value="'.$pemail.'" > </td>
			   </tbody>';
				  
			  }
			  echo '</table>
			  
			  </div>';
//			  echo '</backquote>';
			  
		  }
   echo '<center><input type="submit" class="btn btn-primary" value="Submit"></center>
			  </form>';
			 
			 
			 
     echo   ' </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
				
      </div>
	   </div>
	    </div>
		
	  
	  ';
      
		 }
echo 	'	   <div class="modal fade" id="error" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          helllllllllloooooooooooooooo
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>';
 
			  ?>
			  
    </div>
  </div>

      </div>
     
      <!-------------- TECHNICAL EVENTS ENDS ------------->
            
      <!-------------------- NON TECHNICAL EVENTS --------------------->
     <div id="nontechnical" class="tab-pane fade " >
	   <div class="container-fluid">
        <div class="row">
         <div class="col-md-3">
          <div class="thumbnail">
            <a href="/w3images/lights.jpg" target="_blank">
          <img src="/w3images/lights.jpg" class="img-thumbnail" alt="Lights" style="width:100%">
          <div class="caption">
            <p>hello world.</p>
          </div>
            </a>
          </div>
           </div>
 
      </div>
      </div>
      </div>
	
      
      <!-------------- NON TECHNICAL EVENTS ENDS ------------->
     <!------------------ SUMMARY --------------------->
    <div id="summary" class="tab-pane fade">
     <div class="container-fluid">
     
		</div>
	  </div>
     
     
     </div> 
     	<div class="modal fade" id="error" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-he	ader">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </div>
    
    </div>
	</div>
	</div>
	
	

	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
       $name = $_POST["name"];
       $contact = $_POST["contact"];
       $email = $_POST["email"];
       $emaxt = $_POST["emaxt"];
       $emaxp = $_POST["emaxp"];
	   $eid = $_POST["eid"];
	   $cid = $_POST["cid"];
	   
		
		
//		echo '<script>
//$("#myModals'.$eid.'").modal({"backdrop": "static"});
//      $(document).ready(function(){
//$("#error").modal("show");
//});</script>';
		try{
			
		
       $sql = $conn->prepare("INSERT INTO p_list (p_name,p_contact,p_email,c_id,e_id,team_id) VALUES (:pname,:pcontact,:pemail,:cid,:eid,:tid)");
       for($i = 1;$i<=$emaxt;$i++)
       {
//       	echo '<br>Team '.$i.':';
		   $k = 0;
	    for($j = 1;$j<=$emaxp;$j++)
	    { 	
//	       if(($name[$i][$j] =="" || $name[$i][$j]==" ") && ($contact[$i][$j] == "" || $contact[$i][$j] ==" ") && ($email[$i][$j] == "" || $email[$i][$j] ==" "))
//		   {
//			  $err = "";  
//		   }
//		   elseif(!($name[$i][$j])|| ($contact[$i][$j] == "" && $contact[$i][$j] ==" ")  || ($email[$i][$j] == "" && $email[$i][$j] ==" "))
//		   {
//				
//		   }
//	    echo 'Phone:';
//	    echo 'Email:'.$email[$i][$j];
		   	
			$sql->Bindparam(":pname",$name[$i][$j]);
			$sql->Bindparam(":pcontact",$contact[$i][$j]);
			$sql->Bindparam(":pemail",$email[$i][$j]);
			$sql->Bindparam(":cid",$cid);
			$sql->Bindparam(":eid",$eid);
			$sql->Bindparam(":tid",$i);
			$sql->execute();
			
	    }
	
      }
		}
		catch(PDOException $e)
		{
			echo $e;
		}

//print_r($name);
//print_r($contact);
//print_r($email);

	}
	
	?>

</body>
</html>
