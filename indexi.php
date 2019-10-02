<?php
$connect = mysqli_connect("mwgmw3rs78pvwk4e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","h7l9ehepp73f4lp6","qn81i2ospadx0b5v","jvkaflsb5i15egxa");


$message = '';
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

?><!DOCTYPE html>
<html>





<link rel="shortcut icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script-->

    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <!--script src="https://code.jquery.com/jquery.js"></script-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src ="bootstrap/js/bootstrap.min.js" ></script>
		<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	
	<!--script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script-->
	<script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
	
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<script src = 'https://js.arcgis.com/4.12/init.js'></script>
	<link rel = "stylesheet" href = "https://js.arcgis.com/4.12/esri/css/main.css">
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
	                 	
		  				<img width="100" height="25" src="images/logo.PNG"alt="">
		  			
	                 </span>
	                 	<a href="indexi.php">CityPlan Consultants</a></h1>
	              </div>
	           </div>
			   <div class="col-md-5">
	              <div class="row">
				  <form   method = "post" >
				  <div class="col-lg-12">
	                  <div class="input-group form">
						   <input id='idtext' type="text" name = "cp" class="form-control" placeholder="Search...">
						   <span class="input-group-btn">
						 <button class="btn btn-primary" name = "srch" id ='zoomsearch' >Search</button>
						</span>
					
						</div>

				 </div>
						 </form>
				 </div>
				 </div>
			 
	</form>   
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="index.php">Logout</a></li>
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
					<ul>
					
					<form action = "pdf.php" method = "post" id ='print' name ='print'>
				  <div class="col-lg-12">

	                  <div class="input-group form">
				
						 <button class="btn btn-primary"type="submit" name = "prt"  > Print </button>
						</span>
						
						</div>
					
						
					</form>	
						 

				 </div>
						 
						 <?php

						
						 
						 
						 
						 ?>
					
                        </ul>
                         <!-- Sub menu -->
                         <ul>
						 
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>


	<script>
		  $(document).ready(function() {
			  console.log('Hello');

			
		  });
	</script>

		  <!-- GENRERATING REPORT-->
		  
		  <?php
		  
		 ?>
		  
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title"><h4>CLAIM OWNER DETAILS</h4></div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>

							
						</div>
		  				<div class="panel-body">
						 
						  <?php
    
  
						
						 if(isset($_POST['srch']))
						 {
							 
							$ID = $_POST['cp'];
						
							$_SESSION['nam']= $ID;
							
						
							
	
						
						 if($ID == ''){
							$qry = "SELECT * FROM customer WHERE customerID = '$ID'or Fname  = '$ID' or midname = '$ID'";
							$resul = mysqli_query($connect,$qry);
							 echo '';
						 }
						 else{
							 
							$qry = "SELECT * FROM customer WHERE customerID = '$ID'or Fname = '$ID' or midname = '$ID'or CONCAT(Fname,' ',midname) = '$ID'";
							$resul = mysqli_query($connect,$qry);
						  while($row = mysqli_fetch_array($resul))
						  {
							
							$dob = $row["birthdate"];
							$today = date("Y-m-d");
							$diff = date_diff(date_create($dob),date_create($today));
							  ?>
							  <form action = "" method = "post">
							  <?php 
							  $ui = $row['picture']; 
								  echo '<img width="200" height="200" tyle ="float: right;margin-left:10px;margin-bottom:5px; border: solid black 1px;padding: 2px" src="images/multimedia/'.$ui.'" class="img-responsive img-thumbnail"/>';
								  ?>
								 	  
								  <br/>
		  			


								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php if($row['gender']=='FEMALE'){ echo '<strong>FIRST NAME:</strong>	Ms.  '; echo $row['Fname'];} 
								  if($row['gender']=='MALE'){ echo '<strong>FIRST NAME:</strong> 	Mr. '; echo $row['Fname'];} if($row['gender']=='OTHERS'){ echo '<strong>FIRST NAME:</strong>	'; echo $row['Fname'];}?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> MIDDLE NAME:</strong>	'; echo $row['Lname'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>LAST NAME:</strong>	'; echo $row['midname'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> GENDER :</strong>	'; echo $row['gender'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>MARITAL STUTUS:</strong>	'; echo $row['maritalstutus'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> CITIZENSHIP:</strong>	'; echo $row['citizenship'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> ID TYPE:</strong>	'; echo $row['idtype'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>ID NUMBER:</strong>	'; echo $row['idno'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> PHONE NUMBER:</strong>	0'; echo $row['phone'];  ?></p>
								  <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> AGE:</strong>	'; echo $diff->format('%y');  ?></p>
								  <p></p>
								  <p></p>
								  <br/>
							
							  </form>



							  <?php
						  }
						 }
						}
						
						  ?>
				  			<br />
				  			
							<br /><br />
		  				</div>
		  			</div>
		  		</div>

		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Neighbouring information  </div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
							  <?php
						  
						  if(isset($_POST['srch']))
						  {
 
							 $ID = $_POST['cp'];
							 $qry = "SELECT * FROM customer WHERE customerID = '$ID'or Fname  =  '$ID' or midname = '$ID'or CONCAT(Fname,' ',midname) = '$ID'";
								$resul = mysqli_query($connect,$qry);
								
								while($row = mysqli_fetch_array($resul))
								{
	
								 
								 
									 $nama = $row['customerID'];
								 
								
								if($ID == ''){
									$qryi = "SELECT * FROM neighbor WHERE plotnu = '$ID' or plotnu =  '$nama' ";
									$resulu = mysqli_query($connect,$qryi);
									echo '';
								}else{
							 
							 $qryi = "SELECT * FROM neighbor WHERE plotnu = '$ID'or plotnu =  '$nama'";
						   $resulu = mysqli_query($connect,$qryi);
 
						   while($row = mysqli_fetch_array($resulu))
						   {
							   ?>
							   <form action = "" method = "post">
								  
							  <p></p>
							  <center><p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>PLOT NUMBER:</strong>	'; echo $row['plotnu'];  ?></p></center>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>NORTH :</strong>	'; echo $row['north'];  ?></p>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> SOUTH :</strong>	'; echo $row['south'];  ?></p>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> WEST :</strong>	'; echo $row['west'];  ?></p>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> EAST:</strong>	'; echo $row['east'];  ?></p>
							 
								  
 
 
							   </form>
 
 
 
							   <?php
 
 
 
 
						   }
						}
						  }
						}
 
 
 
						   ?>
					  			
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title"><h4>PLOT DETAILS</h4></div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
								
								 
							 
							  
					</center>
							  <?php
						  
						  if(isset($_POST['srch']))
						  {
 
							 $ID = $_POST['cp'];
							 
							 
							 $qry = "SELECT * FROM customer WHERE customerID = '$ID'or Fname  =  '$ID' or midname = '$ID'or CONCAT(Fname,' ',midname) = '$ID'";
								$resul = mysqli_query($connect,$qry);
								
								while($row = mysqli_fetch_array($resul))
								{
	
								 
								 
									 $nama = $row['customerID'];
								 
								
								if($ID == ''){
									$qryi = "SELECT * FROM plot WHERE plotno = '$ID' or plotno =  '$nama' ";
									$resulu = mysqli_query($connect,$qryi);
									echo '';
								}else{
						  
						$qryi = "SELECT * FROM plot WHERE plotno = '$ID' or plotno = '$nama' ";
						$resulu = mysqli_query($connect,$qryi);
 
						   while($row = mysqli_fetch_array($resulu))
						   {
							   ?>
							   <form action = "" method = "post">
								  
							  <center><p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>PLOT NUMBER:</strong>	'; echo $row['plotno'];  ?></p></center>
							    <img  id = 'screenshotImage'   width = "200" height = "198" tyle ="float: left;margin-right:10px;margin-bottom:5px; border: solid black 1px;padding: 2px"><br/>
							 
								   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>PLOT SIZE:</strong>	'; echo $row['plotsize']; echo' meter square';  ?></p>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> PLOT LOCATION:</strong>	'; echo $row['plotLocation'];  ?></p>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> PLOT X COORDINATES :</strong>	'; echo $row['plotcoordinatesx'];  ?></p>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong>PLOT Y COORDINATES:</strong>	'; echo $row['plotcoordinatesy'];  ?></p>
							   <p style = "font-family: Lucida Fax;font-size: 14px;"><?php echo '<strong> SITE NAME:</strong>	'; echo $row['site'];  ?></p>
								  <P></P>
								  <P></P>
 
							   </form>
 
 
 
							   <?php
 
 
 
 
						   }
						  }
						}
						}
 
 
 
						   ?>
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>

		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title "><h4>Plot map location</h4></div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
		  			</div>
		  			<div class="content-box-large box-with-header">
			  			
			

			<!--<style>
			svg
			{
				height: 50vw;
			}
			path{
				fill: "#00FF00"; transition : .6s fill;
			}
			path:hover{fill :#00FF00;
			text :'model';
				 }
				 path:text.info{
					 color : blue;
				 }
				 .msg {height: 2em;
				 &:not(:empty) {
					 padding: .25em .75em;
					 border-radius: 5px;
					 background: #b53;
					 color: #fff
					 }
				 }
				 code {
	display: inline-block;
	padding: 0 .375em .125em;
	border-radius: 10px;
	background: #ccc;
	font: 900 1.125em/1.25 consolas, monaco, monospace
}
				 
				 
			</style>-->
						  <!--<img src="images/Nyemihanga.svg"alt="">-->
						
					
						<div id = "toolbar" style = ' color:white; background:rgba(0,0,0,0.6)'>
					<span>
					<select id = 'fidlist'></select>
					<input id = "idtexti"  type = "text"  placeholder ="please enter the FID first">
					<button class="btn btn-primary" id="screenshotBa" >Zoom map</button>
					<button class="btn btn-primary" id="screenshotB"  >Add to certificate</button>





					
				</span>
					
					</div>
				
					<br/>
					<br/>
					<center>
						  <div id = "mapview" style='width:100%;height:600px'></div>

						  </center>
						  <script>
   var imgi;
   let qrurl = "https://services5.arcgis.com/YefRmgg8xmG2PWEN/ArcGIS/rest/services/Nyamihenga_Dodoma/FeatureServer/0/query";
   function loadfidi()
   {
	const fidi = document.getElementById("fidilist");
	const fidlayermaker = getalayer();
	const query = fidlayermaker.createQuery();
query.outFields = ["*"];
query.returnGeometry = false;
query.returnDistinctValues = true;
fidlayermaker.queryFeatures(query).then(result => result.features.forEach(t=>{
		let o = document.createElement("option");
	   o.textContent = t.attributes.FID;
	   fidi.appendChild(o);
   
	   })).catch(e=>alert("Error executing query."));
   }
   function loadfid(layers)
   {
	const fid = document.getElementById("fidlist");
	   layers.forEach(l=>{
		
	   let o = document.createElement("option");
	   o.textContent = l.title;
	   fid.appendChild(o);
   
	   });
	   
   }
   function getalayer()
   {
	const fid = document.getElementById("fidlist");
	const slectedIndex = fid.options.selectedIndex; 
	return fid.options[selectedIndex].layer;
   }
   function onTypechange(e){
	   const dd = e.target;
	   const selectedIndex = dd.options.selectIndex;
	   const fd = dd.options[selectedIndex].textContent;
	   const fidlayermaker = getalayer();
	   const query = fidlayermaker.createQuery();
	   query.where = "FID='"+fd+"'";
	  
	   fidlayermaker.definitionExpression = query.where;
	   fidlayermaker.queryFeature(query);
   }
   
//ZOOMING AND SEARCHING
	 require(["esri/WebMap",
	 "esri/views/MapView",
	 "esri/widgets/Print",
	 "esri/request",
	 "esri/Graphic",
	
	 	"esri/widgets/Search"
		
			
	 
	 ],(WebMap, MapView, Print,Request,Graphic, Search)=>{
		
	
		 
	   const map1 = new WebMap({"portalItem": {"id" : "ec910fc0cd5f4ed4a26b846e246d9d19"} });
	 
	   const view = new MapView({container: "mapview", map: map1});
	   //screenshot function
	   const screenshotBa = document.getElementById("screenshotBa");
	   const screenshotB = document.getElementById("screenshotB");
	
	   const zoomsearch =  document.getElementById("zoomsearch");
	   var picurl;

	 
	   
function drawGeometry (geometry, cleanup=true) {
let g;
let s;
//it is a line
if (geometry.paths != undefined) 
{
	g = {
		type: "polyline",
		paths: geometry.paths
	}
	s = {
		type: "simple-line",
		cap: "round",
		color: [255,0,0,0.5],
		width: 7,
		style: "solid"
	}
} //it is a polygon
else if (geometry.rings != undefined) 
{
	g = {
		type: "polygon",
		rings: geometry.rings
	}
	s = {
		type: "simple-fill",
		color: [255,0,0,0.5],
		style: "backward-diagonal",
		outline: {
			width: 5,
			color: [0,0,255,0.7],
			style: "solid",
			cap: "round"
		}
	}
}
else //else its a point
{
	g = {
		type: "point",
		longitude: geometry.x,
		latitude: geometry.y
	}
	s = {
		type: "simple-marker",
		color: [255,0,0, 0.5],
		size: 30
	}
}
if (cleanup === true) view.graphics = [];
let graphic = new Graphic({geometry: g, symbol: s})
view.graphics.add(graphic);
view.goTo(graphic);
}
	 
	   screenshotBa.addEventListener("click",function(){
	let rar = document.getElementById("idtexti");
	let rari = rar.value;
	let queryOptions = {
                            responseType: "json",
							query: {
								f: "json",
								where:"FID = "+rari+"",
								//returnCountOnly: false,
								returnGeometry: true,
								outSR: 4326
							
							}
                            
                            };
	
	   Request(qrurl,queryOptions).then(function(response){
		   
		   //alert(JSON.stringify(response.data.features[0].geometry));
		   //drawGeometry(response.data.features[0].geometry);
		   drawGeometry(response.data.features[0].geometry);
		   view.goTo(response.data.features[0].geometry.rings);
	
	   } ).catch (err => reject (alert ("ERR: " + err)));
	 }	
);
	  
	 
	   var options = {
  width: 2048,
  height: 2048
};
var ni ={format:"png"};
var id;

		
screenshotB.addEventListener("click", function() {
view.takeScreenshot(options).then(function(screenshot) {
	var imageElement = document.getElementById("screenshotImage");
  imageElement.src = screenshot.dataUrl;
let lindi =  imageElement.src;
screenshoturl.value = screenshot.dataUrl;


			  console.log('Hello');
			
   $.post('tt.php',{postname:lindi},
			function (data)
			{
				console.log(data);

			});
  
		//	  $.ajax({
	//		type: 'post',
		//	url: 'indexi.php',
		//	data:{
//				surls: screenshot.dataUrl
//},
		//	dataType:'json',
			//success: (response) => {
				console.log(response);
		//
			//}
		//});
			  

//var mapImg = domConstruct.toDom('<img src="'+rsltURL.url+'" border="0" style="width:740px;height:'+this.imgHeight+'px;"/>');
//domConstruct.place(mapImg, dom.byId('mapImgDiv'), 'replace');

		});
		
	});
   
	   map1.when(()=>loadfid(map1.layers));
	   
 
	  // map1.when(()=>loadfidi());
	  // map1.when(()=>setev());
		
	
	   //let search = new Search({view: view});
			//	view.ui.add(search, "top-left");
	  // view.when(function() {
		//	var print = new Print({
			//view: view,
		 //  // specify your own print service
		//	 printServiceUrl:
			//	"https://utility.arcgisonline.com/arcgis/rest/services/Utilities/PrintingTools/GPServer/Export%20Web%20Map%20Task"
		//	});
   
			 // Add widget to the top right corner of the view
			// view.ui.add(print, "top-right");
		 //  });
   //
   
	 });
	 
	 
	 
   
	 
	 </script>
	
</form>

		  <br />
			</div>
		  		
		  	</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
              CityPlan Consultant <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
  </body>
</html>
