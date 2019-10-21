			<?php
			// Initialize the session
			session_start();
			
			// Check if the user is already logged in, if yes then redirect him to welcome page
			//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
			//	header("location: indexi.php");
			//	exit;
			//}
			
			// Include config file
			require_once "dbconfig.php";
			
			// Define variables and initialize with empty values
			$username = $password = "";
			$username_err = $password_err = "";
			
			// Processing form data when form is submitted
			if($_SERVER["REQUEST_METHOD"] == "POST"){
			
				// Check if username is empty
				if(empty(trim($_POST["username"]))){
					$username_err = "Please enter username.";
				} else{
					$username = trim($_POST["username"]);
				}
				
				// Check if password is empty
				if(empty(trim($_POST["password"]))){
					$password_err = "Please enter your password.";
				} else{
					$password = trim($_POST["password"]);
				}
				
				// Validate credentials
				if(empty($username_err) && empty($password_err)){
					// Prepare a select statement
					$sql = "SELECT id, username, password FROM users WHERE username = ?";
					
					if($stmt = mysqli_prepare($db, $sql)){
						// Bind variables to the prepared statement as parameters
						mysqli_stmt_bind_param($stmt, "s", $param_username);
						
						// Set parameters
						$param_username = $username;
						
						// Attempt to execute the prepared statement
						if(mysqli_stmt_execute($stmt)){
							// Store result
							mysqli_stmt_store_result($stmt);
							
							// Check if username exists, if yes then verify password
							if(mysqli_stmt_num_rows($stmt) == 1){                    
								// Bind result variables
								mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
								if(mysqli_stmt_fetch($stmt)){
									if(password_verify($password, $hashed_password)){
										// Password is correct, so start a new session
										session_start();
										
										// Store data in session variables
										$_SESSION["loggedin"] = true;
										$_SESSION["id"] = $id;
										$_SESSION["username"] = $username;                            
										
										// Redirect user to welcome page
										header("location: indexi.php");
									} else{
										// Display an error message if password is not valid
										$password_err = "The password you entered was not valid.";
									}
								}
							} else{
								// Display an error message if username doesn't exist
								$username_err = "No account found with that username.";
							}
						} else{
							echo "Oops! Something went wrong. Please try again later.";
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
									<a href="index.html">CityPlan Consultants</a></h1>
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
										<h6>Sign In</h6>
										<div class="social">
											<a class="face_login" href="#">
											<span>
									
									<img width="285" height="37" src="images/logo.PNG"alt="">
								
								</span>
												<span class="text"> </span>
											</a>
											<div class="division">
												<hr class="left">
												<span>or</span>
												<hr class="right">
											</div>
										</div>
										<p>Please fill in your credentials to login.</p>
										<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
										<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
										<input class="form-control" type="text" placeholder="user name" name = "username" value="<?php echo $username; ?>" >
										<span class="help-block"><?php echo $username_err; ?></span>
										</div>    
					<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
										<input class="form-control" type="password" placeholder="Password"name = "password" >
										<span class="help-block"><?php echo $password_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Login">
				</div>
										</form>             
									</div>
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
