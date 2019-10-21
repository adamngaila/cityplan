

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
                                    <li><a href="current"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                        <li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Register users</a></li>
                        <li class="current"><a href="forms.php"><i class="glyphicon glyphicon-record"></i> Add parcels details </a></li>
                        <li><a href="editors.php"><i class="glyphicon glyphicon-list"></i> Edit information</a></li>
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
                                               
                                                </div>
                                             




                <!--Tab 1 for uploading files-->

  
                                            
                        <fieldset>
                        <?php
$conn = mysqli_connect("localhost", "root", "", "cityplan");

if (isset($_POST["import"])) {

    $aina = $_POST['aina'];
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {if($aina == 'neighbouring details'){
                                                    
                                                                                    $query = "INSERT into neighbor(idneighbor,plotnu,north,south,west,east) values('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "')";}
                            if($aina == 'claim owner information'){
                                $query = "INSERT into customer(customerID,Fname,midname,Lname,gender,maritalstutus,citizenship,idtype,idno,birthdate,picture,phone,Utambuzi) values('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "')";
                                        } 

               if($aina == 'plot details'){
                                $query = "INSERT into plot(plotno,plotsize,plotLocation,existingUse,proposedUse,roadAccess,sites,utambuzi) values('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "')";
                                        }      
                                        if($aina == 'others'){
                                            $query = "INSERT into customer(customerID,Fname,midname,Lname,gender,maritalstutus,citizenship,idtype,idno,birthdate,picture,phone,Utambuzi) values('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "')";
                                                    }      
                                                                        
                                                                                    
                     
            $result = mysqli_query($conn, $query);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<style>

.outer-scontainer {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-top: 0px;
	margin-bottom: 20px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
}

.outer-scontainer table {
	border-collapse: collapse;
	width: 100%;
}

.outer-scontainer th {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.outer-scontainer td {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
<h2>Import CSV file</h2>
    
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
        <div class="col-sm-10">

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                
                <div class="input-row">
                    <label class="col-md-2 control-label">Choose CSV
                        File</label> <input type="file"class="btn btn-default" name="file"
                        id="file" accept=".csv">
                        <br/>
                        <div>
                    
                    <select class="form-control" name="aina" id="select-1"placeholder=" choose the type of information">
                                                                <option>claim owner information</option>
                                                                <option>plot details</option>
                                                                <option>neighbouring details</option>
                                                                <option>others</option>
                                                            </select> 
                                                            </div>
                                                            <br/>
                                                            
                    <button type="submit" id="submit" name="import"
                        class="btn btn-submit">Import</button>
                    <br />

                </div>
                </form>


                    
 

        </div>
        </div>
   


                        </fieldset>
                                                            <fieldset>
                                                            
                                                            <legend>Upload Pictures</legend>
                                                    <div class="panel-body">
                                                <div class="form-group">
                                                
                                                
                                                    <div class="col-sm-10">
                    <form action="" method="post" enctype="multipart/form-data">
                    Select Image Files to Upload:
                    <input type="file" name="files[]" multiple class="btn btn-default"><br/>
                    <input type="submit" name="submiti" value="UPLOAD" class="btn btn-primary">
                </form>		
                <?php
            if(isset($_POST['submiti'])){

                // Include the database configuration file
                include_once 'dbconfig.php';
            
                
                // File upload configuration
                $targetDir = "uploads/";
                $allowTypes = array('jpg','png','jpeg','gif');
                
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                if(!empty(array_filter($_FILES['files']['name']))){
                    foreach($_FILES['files']['name'] as $key=>$val){
                        // File upload path
                        $fileName = basename($_FILES['files']['name'][$key]);
                        $targetFilePath = $targetDir . $fileName;
                        
                        // Check whether file type is valid
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                        if(in_array($fileType, $allowTypes)){
                            // Upload file to server
                            if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                                // Image db insert sql
                                $insertValuesSQL .= "('".$fileName."', NOW()),";
                            }else{
                                $errorUpload .= $_FILES['files']['name'][$key].', ';
                            }
                        }else{
                            $errorUploadType .= $_FILES['files']['name'][$key].', ';
                        }
                    }
                    
                    if(!empty($insertValuesSQL)){
                        $insertValuesSQL = trim($insertValuesSQL,',');
                        // Insert image file name into database
                        $insert = $db->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL");
                        if($insert){
                            $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                            $statusMsg = "Files are uploaded successfully.".$errorMsg;
                        }else{
                            $statusMsg = "Sorry, there was an error uploading your file.";
                        }
                    }
                }else{
                    $statusMsg = 'Please select a file to upload.';
                }
                
                // Display status message
                echo $statusMsg;
            }
            ?>	


                                                            </fieldset>

                                                            
                                                        </form>
                                                    </div>
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
                </html>`