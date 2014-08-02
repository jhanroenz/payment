<?php
error_reporting(E_ALL);
session_start();
require("db/config.php");
$_SESSION['logged'] = 0;


if (isset($_POST['submit']))
{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$_SESSION['username'] = $_POST['username'];

		$result = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die ($db ->error);
		if($count = $result->num_rows){
		$rows = $result->fetch_assoc();
			
			if($rows['username'] == $username && $rows['password'] == $password){
			$_SESSION['username'] = $username;
			$_SESSION['usertype'] = $rows['type'];
			$_SESSION['firstname'] = $rows['firstname'];
			$_SESSION['lastname'] = $rows['lastname'];
			$_SESSION['midname'] = $rows['midname'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (60*60*60);
			$_SESSION['logged'] = 1;
			$_SESSION['user_id'] = $rows['user_id'];
			
				if($rows['type'] == "admin"){
				header("Location:admin.php");
				}else if($rows['type'] == "student"){
				header("Location:user.php");
			}}
		}else if($count == 0){
			$_SESSION['logged'] = 2;
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Payments System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!-- Add custom CSS here -->
    <link href="css/landing-page.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Online Payment System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#about">About</a>
                    </li>
                    <li><a href="#services">Services</a>
                    </li>
                    <li><a href="#contact">Support</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>

    <div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Online Payment System</h1>
                        <h3>Saint Vincent College of Cabuyao</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li><a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#adminModal"><i class="fa fa-edit fa-fw"></i> <span class="mybutton"> Login</span></a>
                            </li>
                        </ul>
<?php 
	if ($_SESSION['logged'] == 2){
		?>

			  <div class="col-lg-6 alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p>Invalid Username or Password, Please try again.</p>
              </div>

		<?php
	}
 ?>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li><a href="#home">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Saint Vincent College of Cabuyao 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    				
                    <!-- Modal -->
					<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h4 class="modal-title" id="myModalLabel">Login</h4>
					      </div>
					      <div class="modal-body">
					      	<form method="POST">
							<div class="input-group">
						
							  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i><input type="text" name="username" class="form-control" placeholder="Username" required></span>
							
							
							  <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i><input type="password" name="password" class="form-control" placeholder="Password" required></span>
							  
						


					      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <input type="submit" name="submit" value="Submit" class="btn btn-info"/>
						      </div>
							</div>
						  </div>
						</div>
						</form>


						</form>
</body>
</html>
<?php 
			
		}
		
		
			


}else{
 ?>

<!-- HOMEPAGE CONTENTS -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Payments System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!-- Add custom CSS here -->
    <link href="css/landing-page.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Online Payment System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#about">About</a>
                    </li>
                    <li><a href="#services">Services</a>
                    </li>
                    <li><a href="#contact">Support</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>

    <div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Online Payment System</h1>
                        <h3>Saint Vincent College of Cabuyao</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li><a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#loginModal"><i class="fa fa-edit fa-fw"></i> <span class="mybutton"> Login</span></a>
                            </li>
                        </ul>
<?php 
	if ($_SESSION['logged'] == 2){
		?>

			  <div class="col-lg-6 alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p>Invalid Username or Password, Please try again.</p>
              </div>

		<?php
	}
 ?>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li><a href="#home">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li><a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Saint Vincent College of Cabuyao 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    				
                    <!-- Modal -->
					<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h4 class="modal-title" id="myModalLabel">Login</h4>
					      </div>
					      <div class="modal-body">
					      <div class="login">
					      	<form method="POST">
							<div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span><input type="text" name="username" class="form-control" placeholder="Username" required>
							</div>
						  <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span><input type="password" name="password" class="form-control" placeholder="Password" required>
					      </div>
					      </div>
					      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <input type="submit" name="submit" value="Log-in" class="btn btn-info"/>
						      </div>
							</div>
						  </div>
						</div>
						</form>
</body>

<?php
 }
 ?>
</html>
