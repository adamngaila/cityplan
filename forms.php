<?php
$conect = mysqli_connect("localhost","root","","cityplan");


$message = '';
$query = "SELECT * FROM customer";
$results = mysqli_query($conect,$query);
if(isset($_POST['upld']))
								{
									$pich = addslashes(file_get_contents($_FILES["image"]["temp_name"]));
									$imgno = $_POST['id'];
									$qry = "INSERT INTO picha VALUES  ('$imgno ','$pich')";
									$query_run=mysqli_query($conect ,$qry);

									if($query_run)
									{
										echo 'image uploaded';

									}
									else
									{
										echo 'not uplosded';



									}



								}
								
								


?>


<!DOCTYPE html>
<html>
  <head>
    <title>CityPlan Consultants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">

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
	                 <h1>
	                 	<span>
	                 	
		  				<img width="120" height="25" src="images/logo.PNG"alt="">
		  			
	                 </span>

	                 	<a href="indexi.php">CityPlan Consultants</a>

	                 </h1>
	                 
	  
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="indexi.php">Logout</a></li>
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
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                      <li class="current"><a href="indexi.php"><i class="glyphicon glyphicon-home"></i> home</a></li>
                    <li><a href="site.php"><i class="glyphicon glyphicon-calendar"></i> sites</a></li>
                   <!-- <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>-->
                       <li><a href="forms.php"><i class="glyphicon glyphicon-tasks"></i> Add information</a></li>
                    <li><a href="editors.php"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Print report
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="indexi.php">pdf</a></li>
                            <li><a href="signup.html">picture</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">

				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Add information</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<div id="rootwizard">
								<div class="navbar">
								  <div class="navbar-inner">
								    <div class="container">
								<ul class="nav nav-pills">
								  	<li class="active"><a href="#tab1" data-toggle="tab">Claim Owner information</a></li>
									<li><a href="#tab2" data-toggle="tab">Plot particulars</a></li>
									<li><a href="#tab3" data-toggle="tab">Other information</a></li>
								</ul>
								 </div>
								  </div>
								</div>
								<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
								      <form class="form-horizontal" role="form">
										 
			  				<div class="panel-body">
							  <form  action ="editors.php" method = "post" action ="getdata.php" enctype = "multipart/form-data">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">First name</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" name="firstName" id="inputEmail3" placeholder="">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">middle name</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" name="midname" id="inputText3" placeholder="">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">Last name</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" name="lname" id="inputText3" placeholder="">
								    </div>
								  </div>
								   
								    <div class="form-group">
											<label class="col-md-2 control-label">Gender</label>
											<div class="col-md-10">
												<label class="radio radio-inline">
													<input type="radio">
													male  </label>
												<label class="radio radio-inline">
													<input type="radio">
													female </label>
											</div>
										</div>
								</div>
								    <div class="form-group">
											<label class="col-md-2 control-label">Marital stutus</label>
											<div class="col-md-10">
												<label class="radio radio-inline">
													<input type="radio">
													maried  </label>
												<label class="radio radio-inline">
													<input type="radio">
													single </label>
											</div>
										</div>
										
			  				<div class="panel-body">
			  					
								  <div class="form-group">
							
								    <div class="col-sm-10">
								      <div class="form-group">
											<label class="col-md-2 control-label">upload photo</label>
											<div class="col-md-10">
												<input type="file" name = "image"class="btn btn-default" id="image">
												<p class="help-block">
													upload an image file i.e *.PNG, .JPG.
												</p><br>
												<input type="text" name = "id" placeholder="image number">
												<input type="submit" name= "upld" value = "upload">
													
												
											</div>
										</div>
								    </div>
								</div>
								<?php
								$conect = mysqli_connect("localhost","root","","cityplan");
								
								if(isset($_POST['upld']))
								{
									$pich = addslashes(file_get_contents($_FILES["image"]["temp_name"]));
									$imgno = $_POST['id'];
									$qry = "INSERT INTO picha  VALUES ('$imgno', '$pich')";
									$query_run=mysqli_query($conect ,$qry);

									if($query_run)
									{
										echo 'image uploaded';

									}
									else
									{
										echo 'not uplosded';



									}



								}
								
								
								
								?>
								</form>


								
								 <div class="panel-body">
								 	<div class="form-group">
								 		<label for="inputText3" class="col-sm-2 control-label">Nationality</label></div>
								 		<div class="col-md-10">
			  							<div class="bfh-selectbox bfh-countries" data-country="TZ" data-flags="true"></div>
			  						</div>
			  					</div>
			  				
								  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">select id type</label>
								    <div class="col-sm-10">
								    	<select class="form-control" id="select-1">
													<option>National Id</option>
													<option>Kadi ya mpiga kura</option>
													<option>driving lisence</option>
													<option>others</option>
												</select> 
											</div>
										</div>

								<div class="panel-body">
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Id number</label>
										<div class="col-sm-10">
								      <input type="Text" class="form-control"name="idnum" id="inputEmail3" placeholder="">
								    </div>
								  </div>
								</div>
								  <div class="panel-body">
								  <div class="form-group">
											<label class="control-label col-md-2" for="prepend">Mobile number</label>
											<div class="col-md-10">
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group">
															<span class="input-group-addon">+255</span>
															<input class="form-control" name="phone" id="prepend" placeholder="" type="text">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">Birth date</label>
								    <div class="col-sm-10">
								    	<div class="bfh-datepicker" data-format="y-m-d" data-date="today"></div>
			  						
			  					</div>
								    </div>
								    
								  <div class="form-group">
								    <button type="submit" name= "upldi"class="btn btn-primary">
													submit
												</button>
											</div>
								  </div>
								 </form>
								    </div>
								    <div class="tab-pane" id="tab2">
								      <form class="form-inline" role="form">
							
											<fieldset>
												<div class="form-group col-sm-3">
													<label class="sr-only" for="exampleInputEmail2">Plot ID</label>
													<input type="Text" class="form-control" name="plotID" id="exampleInputEmail2" placeholder=" plot ID">
												</div>
												<div class="form-group  col-sm-3">
													<label class="sr-only" for="exampleInputPassword2">Plot location</label>
													<input type="Text" class="form-control" name="plotloc" id="exampleInputPassword2" placeholder="plot location">
												</div>
												<div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">Site name</label>
								    <div class="col-sm-10">
								    	<select class="form-control" id="select-1">
													<option>nyemihanga</option>
													<option>ng'ong'ona</option>
													
												</select> 
											</div>
										</div>
												
											</fieldset>
											<fieldset>
												<div class="form-group col-sm-3">
													<label class="sr-only" for="exampleInputEmail2">Plot size</label>
													<input type="Text" class="form-control" name="plotsz" id="exampleInputEmail2" placeholder=" plot size">
												</div>
												<div class="form-group  col-sm-3">
													<label class="sr-only" for="exampleInputPassword2">Plot coordinates</label>
													<input type="Text" class="form-control" name="plotcod" id="exampleInputPassword2" placeholder="plot coordinates">
												</div>
												
											
											</fieldset>

											<fieldset>
											<div class="form-group col-sm-3">
												 
												 <div class="form-group">

												<button type="submit" class="btn btn-primary">
													submit
												</button>
											</div>
										</div>
											</fieldset>
											
										</form>
								    </div>
									<div class="tab-pane" id="tab3">
										<fieldset>
											<legend>Neighbours</legend>
											<div class="panel-body">
			  					<form class="form-horizontal" role="form">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">North</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" id="inputEmail3" placeholder="">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">South</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" id="inputText3" placeholder="">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">West</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" id="inputText3" placeholder="">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label">East</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" id="inputText3" placeholder="">
								    </div>
								  </div>
								   <div class="form-group col-sm-3">
												 
												 <div class="form-group">

												<button type="submit" class="btn btn-primary">
													submit
												</button>
											</div>
										</div>
								    
								</div>
											
											<legend>Ten house tribunals</legend>
											<div class="panel-body">
											<div class="form-group">
												
								    <label for="inputText3" class="col-sm-2 control-label">Full name</label>
								    <div class="col-sm-10">
								      <input type="Text" class="form-control" id="inputText3" placeholder="">
								    </div>
								  </div>
											</div>
											
												 
												 <div class="form-group">

												<button type="submit" class="btn btn-primary">
													submit
												</button>
											</div>
										
									</form>


								<legend>Upload excel file</legend>
									<div class="panel-body">
								<div class="form-group">
																
								    <div class="col-sm-10">
								      <div class="form-group">
											<label class="col-md-2 control-label">upload file</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" id="exampleInputFile1">
												<p class="help-block">
													upload an image file i.e *.xlxs, .xls, .csv
												</p>
											</div>
										</div>
								    </div>
								</div>
																  <div class="form-group">
								    <label for="inputText3" class="col-sm-2 control-label"></label>
								    <div class="col-sm-10">
								    	<select class="form-control" id="select-1"placeholder=" choose the type of information">
													<option>claim owner information</option>
													<option>plot details</option>
													<option>neighbouring details</option>
													<option>others</option>
												</select> 
											</div>
										</div>
											</div>
											<div class="form-group col-sm-3">
												 
												 <div class="form-group">

												<button type="submit" class="btn btn-primary">
													submit
												</button>
											</div>
										</div>




										</fieldset>
								    </div>
									<ul class="pager wizard">
										<li class="previous first disabled" style="display:none;"><a href="javascript:void(0);">First</a></li>
										<li class="previous disabled"><a href="javascript:void(0);">Previous</a></li>
										<li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
									  	<li class="next"><a href="javascript:void(0);">Next</a></li>
									</ul>
								</div>	
							</div>
		  				</div>
		  			</div>
					</div>
				</div>


	  		<!--  Page content -->
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               CityPlan Consultants <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
  </body>
</html>