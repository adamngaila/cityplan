<?php

$dbHost     = "mwgmw3rs78pvwk4e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbUsername = "h7l9ehepp73f4lp6";
$dbPassword = "qn81i2ospadx0b5v";
$dbName     = "jvkaflsb5i15egxa";
// Create database connection
//$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
  $connect = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
  $message = '';
  $query = "SELECT * FROM customer";
  $results = mysqli_query($connect,$query);

	//Initialize logging clases
	

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

                      <a href="indexi.php">CityPlan Consultants</a></h1>
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
        <div class="col-md-2">
          <div class="sidebar content-box" style="display: block;">
                  <ul class="nav">
                      <!-- Main menu -->
                      <li class="current"><a href="indexi.php"><i class="glyphicon glyphicon-home"></i> home</a></li>
									<li><a href="site.php"><i class="glyphicon glyphicon-calendar"></i> View shape file</a></li>
								<!-- <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
									<li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
									<li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
									<li><a href="forms.php"><i class="glyphicon glyphicon-tasks"></i> Add information</a></li-->
									<li><a href="registry.php"><i class="glyphicon glyphicon-pencil"></i> Registry</a></li>
									<li class="submenu">
									<a href="#">
											<i class="glyphicon glyphicon-list"></i> Pages
											<span class="caret pull-right"></span>
										</a>
									<ul>
									<li><a href='http://www.cityplan.co.tz'>Company site</a></li>					
									<li><a href="continue.php">Admin site</a></li>
									<li><a href="logout.php">Logout</a></li>
										</ul>
                          <a href="#">
                              <i class="glyphicon glyphicon-list"></i> Print report
                              <span class="caret pull-right"></span>
                          </a>
                          <!-- Sub menu -->
                          <ul>
                              <li><a href="registryreport.php">print</a></li>
                           
                          </ul>
                      </li>
                  </ul>
              </div>
        </div>
        <div class="col-md-10" style = "font-family: Lucida Fax;font-size: 10px;">

          <div class="content-box-large">
          <div class="panel-heading">
            <div class="panel-title">CityPlan Consultants</div>
          
          <form  action ="" method = "post" action ="">

            <input type="text"  name="id"  placeholder="search"/>
            <input type="submit" name = "search" value ="SEARCH">
            <div>
            <select class="form-control" name ="aina" id="select-1"placeholder=" choose category of data">
                            <option>claim owner information</option>
                            <option>plot details</option>
                            <option>neighbouring details</option>
                            <option>others</option>
                          </select> 
                          </div>
            
            <div class="panel-body">
            <table cellpadding="0" cellspacing="0"  class="table table-striped table-bordered" id="example">
              
              <?php 
              $output = '';
              if(isset($_POST['search'])){
                $searchq = $_POST['id'];
                $aina = $_POST['aina'];
                if($aina == 'claim owner information'){
                echo '
                  <thead>
                <tr>
                  <th>ID</th>
                  <th>Jina la kwanza</th>
                  <th>Jina la kati</th>
                  <th>Jina la mwisho</th>
                  <th>Jinsia</th>
                  <th>Hali ya ndoa</th>
                  <th>Uraia</th>
                  <th>Aina ya kitambulisho</th>
                  <th>Namba ya kitambulisho</th>
                  <th> Namba ya simu</th>
                  <th> Picha</th>
                  
                  
                </tr>
              </thead>';

                if($searchq == ''){
                  $qr = "SELECT * FROM customer WHERE customerID";
                  $result = mysqli_query($connect,$qr);
                  $count = mysqli_num_rows($result);
                  while ($row = mysqli_fetch_array($result)) {
                    $ui = $row['picture']; 

                  echo '
                    <tr>
                      <td>'.$row["customerID"].'</td>
                    <td>'.$row["Fname"].'</td>              
                    <td>'.$row["midname"].'</td>
                    <td>'.$row["Lname"].'</td>
                    <td>'.$row["gender"].'</td>
                    <td>'.$row["maritalstutus"].'</td>            
                    <td>'.$row["citizenship"].'</td>
                    <td>'.$row["idtype"].'</td>
                    <td>'.$row["idno"].'</td>
                      <td>'.$row["phone"].'</td>
                      <td><img width="100" height="100" src="images/multimedia/'.$ui.'" class="img-responsive img-thumbnail"/></td>
                    
                  </tr>
    
                  ';
                }

                }
                
              
                $qr = "SELECT * FROM customer WHERE customerID LIKE '$searchq' OR Fname LIKE '$searchq' OR  CONCAT(Fname,' ',midname) LIKE '$searchq' ";
                $result = mysqli_query($connect,$qr);
                $count = mysqli_num_rows($result);
                if($count == 0){
                  $output = 'there was no search. you can write customer ID or first name to get more info';
                } else{
              while ($row = mysqli_fetch_array($result)) {
                $ui = $row['picture']; 

                $output = '
                <tr>
                <td>'.$row["customerID"].'</td>
                <td>'.$row["Fname"].'</td>              
                  <td>'.$row["midname"].'</td>
                  <td>'.$row["Lname"].'</td>
                  <td>'.$row["gender"].'</td>
                  <td>'.$row["maritalstutus"].'</td>            
                  <td>'.$row["citizenship"].'</td>
                  <td>'.$row["idtype"].'</td>
                  <td>'.$row["idno"].'</td>
                  <td>'.$row["phone"].'</td>
                  <td><img width="150" height="150" src="images/multimedia/'.$ui.'" class="img-responsive img-thumbnail"/></td>
                    
                  
                </tr>

                ';
              }
            }
          }

          if($aina == 'plot details'){
            echo '
              <thead>
            <tr>
              <th>Plot ID</th>
              <th>Plot size</th>
              <th>Plot Location</th>
              <th>Plot Exisitng use</th>
              <th>Plot Proposed Use</th>
              <th>Site name</th>
            
            </tr>
          </thead>';

            if($searchq == ''){
              $qr = "SELECT * FROM plot";
              $result = mysqli_query($connect,$qr);
              $count = mysqli_num_rows($result);
              while ($row = mysqli_fetch_array($result)) {

              echo '
                <tr>
                  <td>'.$row["plotno"].'</td>
                <td>'.$row["plotsize"].'</td>              
                <td>'.$row["plotLocation"].'</td>
                <td>'.$row["existingUse"].'</td>
                <td>'.$row["proposedUse"].'</td>
                <td>'.$row["sites"].'</td>            
                
              </tr>

              ';
            }

            }
            
          
            $qr = "SELECT * FROM plot WHERE plotno LIKE '$searchq' OR plotsize LIKE '$searchq'  ";
            $result = mysqli_query($connect,$qr);
            $count = mysqli_num_rows($result);
            if($count == 0){
              $output = 'there was no search.you can write plot number to get the details';
            } else{
          while ($row = mysqli_fetch_array($result)) {

            $output = '
            <tr>
            <td>'.$row["plotno"].'</td>
            <td>'.$row["plotsize"].'</td>              
              <td>'.$row["plotLocation"].'</td>
              <td>'.$row["existingUse"].'</td>
              <td>'.$row["proposedUse"].'</td>
              <td>'.$row["sites"].'</td>            
              
              
            </tr>

            ';
          }
        }
      }

      if($aina == 'neighbouring details'){
        echo '
          <thead>
        <tr>
      
          <th>plot number</th>
          <th>north</th>
          <th>south</th>
          <th>west</th>
          <th>East</th>
        
        </tr>
      </thead>';

        if($searchq == ''){
          $qr = "SELECT * FROM neighbor";
          $result = mysqli_query($connect,$qr);
          $count = mysqli_num_rows($result);
          while ($row = mysqli_fetch_array($result)) {

          echo '
            <tr>
              <td>'.$row["plotnu"].'</td>
            <td>'.$row["north"].'</td>              
            <td>'.$row["south"].'</td>
            <td>'.$row["west"].'</td>
            <td>'.$row["east"].'</td>           
            
          </tr>

          ';
        }

        }
        
      
        $qr = "SELECT * FROM neighbor WHERE idneighbor LIKE '$searchq' OR plotnu LIKE '$searchq'  ";
        $result = mysqli_query($connect,$qr);
        $count = mysqli_num_rows($result);
        if($count == 0){
          $output = 'therewas no search';
        } else{
      while ($row = mysqli_fetch_array($result)) {

        $output = '
        <tr>
        <td>'.$row["plotnu"].'</td>
            <td>'.$row["north"].'</td>              
            <td>'.$row["south"].'</td>
            <td>'.$row["west"].'</td>
            <td>'.$row["east"].'</td>           
                        
          
          
        </tr>

        ';
      }
    }
  }




        }
            
            
            
            print($output);

              ?>
              <tbody>

              </tbody>
            </table>
          

          </form>
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

      <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://code.jquery.com/jquery.js"></script>
      <!-- jQuery UI -->
      <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="bootstrap/js/bootstrap.min.js"></script>

      <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
      <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

      <script src="vendors/ckeditor/ckeditor.js"></script>
      <script src="vendors/ckeditor/adapters/jquery.js"></script>

      <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

      <script src="js/custom.js"></script>
      <script src="js/editors.js"></script>
    </body>
  </html>
