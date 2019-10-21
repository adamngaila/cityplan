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
						<title>CityPlan Consultant </title>
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<!-- Bootstrap -->
						<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
						<!-- styles -->
						
						<link href="css/styles.css" rel="stylesheet">

						<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
						<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
						<!--[if lt IE 9]>
						<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
						<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
						<![endif]-->
					</head>
					
					<body class="login-bg" style ="background-image:url('images/background.jpg');  background-size: cover;">
						<div class="header">
							<div class="container">
								<div class="row">
								<div class="col-md-12">
									<!-- Logo -->
									<div class="logo">
										<h1>
											<span>
											
											<img width="120" height="25" src="images/logo.PNG"alt="">
										
										</span>
											<a href="index.php">CityPlan Consultants</a></h1>
									</div>
								</div>
								</div>
							</div>
						</div>

			<div class="page-content container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="login-wrapper">
							<div class="box">
								<div class="content-wrap">
									<h6>Sign Up</h6>
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

							<div class="already">
								<p>Have an account already?</p>
								<a href="login.html">Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>



			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://code.jquery.com/jquery.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script src="js/custom.js"></script>
		</body>
		</html>