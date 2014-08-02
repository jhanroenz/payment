<?php 
error_reporting(E_ALL);
session_start();
require("db/config.php");
?>

<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/adminstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
 
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="transaction.php"><i class="fa fa-bar-chart-o"></i> Transaction</a></li>
            <li><a href="reports.php"><i class="fa fa-table"></i> Reports</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <!---
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">7 New Messages</li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li><a href="#">View Inbox <span class="badge">7</span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                <li class="divider"></li>
                <li><a href="#">View All</a></li>
              </ul>
            </li>
            -->
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
          </div>
        </div><!-- /.row -->


        <!-- This is my comment -->
        <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-info">
              <div class="panel-heading">

              			<div class="row">
              				<div class="col-xs-12">

         
              					<table class="table tbl table-bordered table-hover"> 
             						<thead>
             				 <form method="POST">
            	  				
							                				<h3>Search User</h3>
            	  			<div class="form-group input-group">
            		    		<input type="text" class="form-control" placeholder="Student Name / Student Number / Search by Course" name="query">
            	    			<span class="input-group-btn">            	   
                 		 	<button class="btn btn-default" type="submit" name="search"><i class="fa fa-search"></i></button>
            	    			</span>
                				</div>

                			</form>
	              					
	             <?php 
	             if(isset($_POST['search']))
	             {
		             $query = $_POST['query'];
		             $firstname = $_SESSION['firstname'];
	    	         $result = $db->query("SELECT * FROM `users` WHERE type = 'student' AND firstname = '$query' OR lastname = '$query' OR student_number = '$query' OR course = '$query' ") or die($db->error);

	        	     	$count = $result->num_rows;
	            	 	if($count!= 0)
	            	 	{
	           	 		?>
	  	 		  		<thead>
	              			<td><strong>Name</strong></td>
	              			<td><strong>Course</strong></td>
	              			<td><strong>Year</strong></td>
	              			<td></td>
	              		</thead>
	            	 <?php  

	             			while($object = $result->fetch_object())
	             			{

	             				echo "<tr><td>" . $object->lastname . " " . $object->firstname . " " . $object->midname . "</td>";
	             				echo "<td>" . $object->course . "</td>";
	             				echo "<td>" . $object->year . "</td>";

	             				 ?> <td><center><button class="btn btn-primary"><i class="fa fa-table" data-toggle="modal" data-target="#view"></i></button></center></td>
	            	           		<!-- Modal 
					<div style="color:#333333" class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h4 class="modal-title" id="myModalLabel"><?php echo $object->firstname . " " . $object->lastname; ?></h4> 
					      </div>
					      <div class="modal-body">
	
							
								<div class="col-md-5">
									<h5><center>Debit</center></h5>
								</div>
									<div class="col-md-5">
										<h5><center>Credit</center></h5>
									</div>
								<div class="row">
									<div class="col-md-5">
										
									</div>
								</div>
					     </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						      </div>
							</div>
						  </div>
						</div>
	            -->
	             				
	             <?php  
	             				echo "</tr>";
	           				}
           	 			}
           	 			else
	           	 		{?>

	<div class="alert alert-dismissable alert-danger">
     	<button type="button" class="close" data-dismiss="alert">&times;</button>
     	<strong>Oh snap!</strong> No Results Found. Please try again.
   	</div>				<?php 
	           	 		}
	              }?>
	              			
              					</table>
                			 <hr>
                			</div>
                		</div>
              </div>
            </div>
          </div>

      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- Le JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
 <!--   <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script> -->
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
