  <?php
  $connect = mysqli_connect("localhost","root","","cityplan");
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

<!-- Bootstrap -->

<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<!-- styles -->
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// >
<[if lt IE 9]>
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



<!-- Modal -->
<div class="modal fade" id="claimeditmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action ="change.php" method = "post">
      <div class="modal-body">
              
                  <div class="form-group">
                  <label>First name</label>
                  <input type="text" class="form-control" name="fname" id="fname"  placeholder="First name">
                  
                  </div>
                  <div class="form-group">
                  <label>Middle name</label>
                  <input type="text" class="form-control" name="midname" id="midname" placeholder="middle name">
                  
                  </div>
                  <div class="form-group">
                  <label>Last name</label>
                  <input type="text" class="form-control" name="lname"  id="lname"   placeholder="Last name">
                  
                  </div>
                  <div class="form-group">
                  <label>Gender</label>
                  <input type="text" class="form-control" name="gender"  id="gender"  placeholder="ME/KE">
                  
                  </div>
                  <div class="form-group">
                  <label>Martual stutus</label>
                  <input type="text" class="form-control" name="maritalstutus" id="maritalstutus"  placeholder="Marital stutus">
                  
                  </div>
                  <div class="form-group">
                  <label>Citizenship</label>
                  <input type="text" class="form-control" name="citizenship"  id="citizenship"  placeholder="citizenship">
                  
                  </div>
                  <div class="form-group">
                  <label>Id type</label>
                  <input type="text" class="form-control" name="idtype" id="idtype"  placeholder="id type">
                  
                  </div>
                  <div class="form-group">
                  <label>Id no</label>
                  <input type="text" class="form-control" name="idno"  id="idno" placeholder="id type">
                  
                  </div>
                  <div class="form-group">
                  <label>Pone number</label>
                  <input type="text" class="form-control" name="phone"  id="phone" placeholder="id type">
                  
                  </div>
                  
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="changedata" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



        <div class="col-md-10" >
        

          
        <div class="content-box-large">
          <div class="panel-heading">
         
            <div class="panel-title">CityPlan Consultants</div>
          </div>
          <form  action ="editors.php" method = "post" action ="">


            <input type="text"  name="id"  placeholder="search"/>
            <input type="submit" name = "search" value ="SEARCH">
          

  


            <select class="form-control" name ="aina" id="select-1"placeholder=" choose category of data">
                            <option>claim owner information</option>
                            <option>plot details</option>
                            <option>neighbouring details</option>
                            <option>others</option>
                          </select> 
                          
            
            <div class="panel-body">
 
            <table cellpadding="0" cellspacing="0"  style =" width: 100%;  table-layout:fixed;font-family: Times new Roman;font-size: 12px;"class="table table-striped table-bordered" id="example">
              
              <?php 
              $output = '';
              if(isset($_POST['search'])){
                $searchq = $_POST['id'];
                $aina = $_POST['aina'];
                if($aina == 'claim owner information'){
                echo '
                  <thead>
                <tr>
                  <th>customer ID</th>
                  <th>First name</th>
                  <th>Middle name</th>
                  <th>Last name</th>
                  <th>Gender</th>
                  <th>Martual stutus</th>
                  <th>Citizenship</th>
                  <th>Id type</th>
                  <th>Id number</th>
                  <th> phone number</th>
                  <th> picture</th>
                  <th>EDIT</th>
                  
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
                      <td>  <button type="button" class="btn btn-primary edtbtn" id = "edtbtn" data-toggle="modal" data-target="#claimeditmodel">
                      Edit
                    </button></td>
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
                  <td><img width="100" height="100" src="images/multimedia/'.$ui.'" class="img-responsive img-thumbnail"/></td>
                  <td>  <button type="button" class="btn btn-primary edtbtn" data-toggle="modal" data-target="#claimeditmodel">
                  Edit
                </button></td>
  
                  
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


      <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <!-- jQuery UI -->
    
      <!-- Include all compiled plugins (below), or include individual files as needed -->
    

    

      <script src="vendors/ckeditor/ckeditor.js"></script>
      <script src="vendors/ckeditor/adapters/jquery.js"></script>

      <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

      <script src="js/custom.js"></script>
      <script src="js/editors.js"></script>
      <script>
      $(document).ready( function () {

        document.getElementById('edtbtn').addEventListener('click',function(){
          
          $('#claimeditmodel').trigger('focus');
          $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function()
          {

            return. $(this).text();
          }
          
          ).get();
          console.log(data);
          $('fname').val(data[0]);
          $('midname').val(data[1]);
          $('lname').val(data[2]);
          $('gender').val(data[3]);
          $('maritalstutus').val(data[4]);
          $('citizenship').val(data[5]);
          $('idtype').val(data[6]);
          $('idno').val(data[7]);
          $('phone').val(data[8]);


        });

          });
    </script>
    </body>
  </html>