<?php
		// Include config file
		require_once "dbconfig.php";
		
		// Define variables and initialize with empty values
		$username = $password = $confirm_password = "";
		$username_err = $password_err = $confirm_password_err = "";
		
		// Processing form data when form is submitted
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
			// Validate username
			if(empty(trim($_POST["username"]))){
				$username_err = "Please enter a username.";
			} else{
				// Prepare a select statement
				$sql = "SELECT id FROM users WHERE username = ?";
				
				if($stmt = mysqli_prepare($db, $sql)){
					// Bind variables to the prepared statement as parameters
					mysqli_stmt_bind_param($stmt, "s", $param_username);
					
					// Set parameters
					$param_username = trim($_POST["username"]);
					
					// Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmt)){
						/* store result */
						mysqli_stmt_store_result($stmt);
						
						if(mysqli_stmt_num_rows($stmt) == 1){
							$username_err = "This username is already taken.";
						} else{
							$username = trim($_POST["username"]);
						}
					} else{
						echo "Oops! Something went wrong. Please try again later.";
					}
				}
				
				// Close statement
				mysqli_stmt_close($stmt);
			}
			
			// Validate password
			if(empty(trim($_POST["password"]))){
				$password_err = "Please enter a password.";     
			} elseif(strlen(trim($_POST["password"])) < 6){
				$password_err = "Password must have atleast 6 characters.";
			} else{
				$password = trim($_POST["password"]);
			}
			
			// Validate confirm password
			if(empty(trim($_POST["confirm_password"]))){
				$confirm_password_err = "Please confirm password.";     
			} else{
				$confirm_password = trim($_POST["confirm_password"]);
				if(empty($password_err) && ($password != $confirm_password)){
					$confirm_password_err = "Password did not match.";
				}
			}
			
			// Check input errors before inserting in database
			if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
				
				// Prepare an insert statement
				$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
				
				if($stmt = mysqli_prepare($db, $sql)){
					// Bind variables to the prepared statement as parameters
					mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
					
					// Set parameters
					$param_username = $username;
					$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
					
					// Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmt)){
						// Redirect to login page
						header("location: index.php");
					} else{
						echo "Something went wrong. Please try again later.";
					}
				}
				
				// Close statement
				mysqli_stmt_close($stmt);
			}
			
			// Close connection
			mysqli_close($db);
		}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CITYPLAN CONSULTANTS</title>
	

	<link rel="shortcut icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/stats.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
				 
	                 <h1><a href="indexi.php">Cityplan Consultants admin panel</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                         
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
						<div class="row">
						<div class="col-md-3">
							<div class="sidebar content-box" style="display: block;">
								<ul class="nav">
		  	
                    <!-- Main menu -->
					<li><a href="current"><a href="adminpanel.php"><i class="glyphicon glyphicon-home"></i> Register user</a></li>

<li><a href="editors.php"><i class="glyphicon glyphicon-list"></i> Edit information</a></li>
<li class="submenu"><a href="#"><i class="glyphicon glyphicon-record"></i> Add parcels details </a>
<span class="caret pull-right"></span>
	</a>
	<!-- Sub menu -->
	<ul>
		<li><a href="import.php">upload files </a></li>
		<li><a href="forms.php">Add individual data</a></li>
</ul>

</li>


<li class="submenu">
	<a href="#">
		<i class="glyphicon glyphicon-list"></i> Pages
		<span class="caret pull-right"></span>
	</a>
	<!-- Sub menu -->
	<ul>
		<li><a href="indexi.php">home </a></li>
		<li><a href="site.php">Shape file viewer</a></li>
		<li><a href="registry.php">Registry</a></li>
		<li><a href='http://www.cityplan.co.tz'>Company site</a></li>
	</ul>
</li>
</ul>
             </div>
		  </div>
		  <div class="col-md-9">
							<div class="row">
								
									<div class="content-box-large">
									<div class="content-box-header">
					<div class="panel-title">Admin Profile</div>
					
					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
  				<div class="panel-body">
				  <p>Please fill this form to create an account.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_err; ?></span>
				</div>    
				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
					<span class="help-block"><?php echo $password_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
					<span class="help-block"><?php echo $confirm_password_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
					<input type="reset" class="btn btn-default" value="Reset">
				</div>
								</div>
  					
  				</div>
  			</div>




			  <?php
		// Include config file
		require_once "dbconfig.php";
		
		// Define variables and initialize with empty values
		$username = $password = $confirm_password = "";
		$Fname = $EMname = $ELname = $Ephone = $position = "";
		$username_errs = $password_errs = $confirm_password_errs = "";
		
		// Processing form data when form is submitted
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			//validate other information
			if(empty(trim($_POST["EFname"]))){
				$username_err = "Please enter first name.";
			} else{
				$Fname = trim($_POST["EFname"]);
			}
			if(empty(trim($_POST["EMname"]))){
				$username_err = "Please enter  Middle name.";
			} else{
				$EMname = trim($_POST["EMname"]);
			}
			if(empty(trim($_POST["ELname"]))){
				$username_err = "Please enter Last name.";
			} else{
				$ELname = trim($_POST["ELname"]);
			}
			if(empty(trim($_POST["Ephone"]))){
				$username_err = "Please enter phone number.";
			} else{
				$Ephone = trim($_POST["Ephone"]);
			}
			if(empty(trim($_POST["position"]))){
				$username_err = "Please enter Role or position";
			}else{
				$position = trim($_POST["position"]);
			} 
		
			// Validate username
			if(empty(trim($_POST["usernames"]))){
				$username_err = "Please enter a username.";
			} else{
				// Prepare a select statement
				$sql = "SELECT id FROM employee WHERE username = ?";
				
				if($stmti = mysqli_prepare($db, $sql)){
					// Bind variables to the prepared statement as parameters
					mysqli_stmt_bind_param($stmti, "s", $param_username);
					
					// Set parameters
					$param_username = trim($_POST["usernames"]);
					
					// Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmti)){
						/* store result */
						mysqli_stmt_store_result($stmti);
						
						if(mysqli_stmt_num_rows($stmti) == 1){
							$username_err = "This username is already taken.";
						} else{
							$username = trim($_POST["usernames"]);
						}
					} else{
						echo "Oops! Something went wrong. Please try again later.";
					}
				}
				
				// Close statement
				mysqli_stmt_close($stmt);
			}
			
			// Validate password
			if(empty(trim($_POST["passwords"]))){
				$password_err = "Please enter a password.";     
			} elseif(strlen(trim($_POST["password"])) < 6){
				$password_err = "Password must have atleast 6 characters.";
			} else{
				$password = trim($_POST["passwords"]);
			}
			
			// Validate confirm password
			if(empty(trim($_POST["confirm_passwords"]))){
				$confirm_password_err = "Please confirm password.";     
			} else{
				$confirm_password = trim($_POST["confirm_passwords"]);
				if(empty($password_err) && ($password != $confirm_password)){
					$confirm_password_err = "Password did not match.";
				}
			}
			
			// Check input errors before inserting in database
			if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
				
				// Prepare an insert statement
				$sql = "INSERT INTO employee (EFname,EMname,ELname,Ephone,position,username, password) VALUES (?, ?)";
				
				if($stmti = mysqli_prepare($db, $sql)){
					// Bind variables to the prepared statement as parameters
					mysqli_stmt_bind_param($stmti, "ss",$param_EFname,$param_EMname,$param_ELname,$param_Ephone,$param_position,$param_username,$param_password);
					
					// Set parameters
					
					$param_EFname = $EFname;
					
					$param_EMname = $EMname;
					
					$param_ELname = $ELname;
					
					$param_Ephone = $Ephone;

					$param_position = $position;
					$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
					
					// Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmti)){
						// Redirect to login page
						header("location: index.php");
					} else{
						echo "Something went wrong. Please try again later.";
					}
				}
				
				// Close statement
				mysqli_stmt_close($stmti);
			}
			
			// Close connection
			mysqli_close($db);
		}
?>




  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Normal user profile</div>
					
					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
  				<div class="panel-body">
				  <p>Please fill this form to create an account.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div>
				<label>First name</label>
					<input type="text" name="EFname" class="form-control">
				</div>
				<div>
				<label>Middle name</label>
					<input type="text" name="EMname" class="form-control">
				</div>
				<div>
				<label>Last name</label>
					<input type="text" name="ELname" class="form-control">
				</div>
				<div>
				<label>Phone number</label>
					<input type="text" name="Ephone" class="form-control">
				</div>
				<div>
				<label>Role/Position in company</label>
					<input type="text" name="position" class="form-control">
				</div>
				<div>
				
				<div class="form-group <?php echo (!empty($username_errs)) ? 'has-error' : ''; ?>">
					<label>Username</label>
					<input type="text" name="usernames" class="form-control" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_errs; ?></span>
				</div>    
				<div class="form-group <?php echo (!empty($password_errs)) ? 'has-error' : ''; ?>">
					<label>Password</label>
					<input type="password" name="passwords" class="form-control" value="<?php echo $password; ?>">
					<span class="help-block"><?php echo $password_errs; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_password_errs)) ? 'has-error' : ''; ?>">
					<label>Confirm Password</label>
					<input type="password" name="confirm_passwords" class="form-control" value="<?php echo $confirm_password; ?>">
					<span class="help-block"><?php echo $confirm_password_errs; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
					<input type="reset" class="btn btn-default" value="Reset">
				</div>
								
  			
  				</div>
  			</div>

  			
    <footer>
         <div class="container">
         
            <div class="copy text-center">
                <a href = 'http://www.cityplan.co.tz'>Cityplan consultants</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="vendors/morris/morris.css">


    <script src="vendors/jquery.knob.js"></script>
    <script src="vendors/raphael-min.js"></script>
    <script src="vendors/morris/morris.min.js"></script>

    <script src="vendors/flot/jquery.flot.js"></script>
    <script src="vendors/flot/jquery.flot.categories.js"></script>
    <script src="vendors/flot/jquery.flot.pie.js"></script>
    <script src="vendors/flot/jquery.flot.time.js"></script>
    <script src="vendors/flot/jquery.flot.stack.js"></script>
    <script src="vendors/flot/jquery.flot.resize.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/stats.js"></script>
  </body>
</html>