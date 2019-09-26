<!DOCTYPE html>
<html>
  <head>
    <title>CityPlan Consultants </title>
	<meta charset="utf-8" />
	
	<meta
      name="viewport"
      content="initial-scale=1,maximum-scale=1,user-scalable=no"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/calendar.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/fullcalendar/fullcalendar.js"></script>
    <script src="vendors/fullcalendar/gcal.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<script src = 'https://js.arcgis.com/4.12'></script>

	<link
      rel="stylesheet"
      href="https://js.arcgis.com/4.12/esri/themes/light/main.css"
    />
	



  
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
	                 	<a href="indexi.php">CityPlan consultants</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
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
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
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
                    <li><a href="site.php"><i class="glyphicon glyphicon-calendar"></i> sites</a></li>
                   <!-- <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>-->
                       <li><a href="forms.php"><i class="glyphicon glyphicon-tasks"></i> Add information</a></li>
                    <li><a href="editors.php"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                    <li class="submenu">
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Print report
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">pdf</a></li>
                            <li><a href="signup.html">picture</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  

		  			<div class="content-box-large">
					
		  				<div class="panel-body">
						 
		  					<div class="row">
							 
	
   
						
    <!--
  ArcGIS API for JavaScript, https://js.arcgis.com
  For more information about the layers-featurelayer-collection sample, read the original sample description at developers.arcgis.com.
  https://developers.arcgis.com/javascript/latest/sample-code/layers-featurelayer-collection/index.html
  -->
  <style>
      html,
      head,
      #viewDiv {
        padding: 0;
        margin: 0;
        height: 800px;
        width: 100%;
      }
      #mainWindow {
        padding: 0.5em;
        background-color: #fff;
      }
      #mainWindow p,
      #uploadForm {
        display: block;
        padding: 0.1em;
      }
    </style>


   

    <script>
	let view;
      require([
        "esri/config",
        "esri/Map",
        "esri/views/MapView",
        "esri/widgets/Expand",
        "esri/request",
        "esri/layers/FeatureLayer",
        "esri/layers/support/Field",
        "esri/Graphic"
      ], function(
        esriConfig,
        Map,
        MapView,
        Expand,
        request,
        FeatureLayer,
        Field,
        Graphic
      ) {
        var portalUrl = "https://www.arcgis.com";

        document.getElementById("uploadForm").addEventListener("change", function(event) {
            var fileName = event.target.value.toLowerCase();

            if (fileName.indexOf(".zip") !== -1) {
              //is file a zip - if not notify user
              generateFeatureCollection(fileName);
            } else {
              document.getElementById("upload-status").innerHTML =
                '<p style="color:red">Add shapefile as .zip file</p>';
            }
          });

        var map = new Map({
          basemap: "topo"
        });

         view = new MapView({
         
          map: map,
          container: "viewDiv",
		  center:[35.94763040541671,-6.083543133902401],
		  zoom:8,
          popup: {
            defaultPopupTemplateEnabled: true
          }
        });

        var fileForm = document.getElementById("mainWindow");

        var expand = new Expand({
          expandIconClass: "esri-icon-upload",
          view: view,
          content: fileForm
        });

        view.ui.add(expand, "top-right");

        function generateFeatureCollection(fileName) {
          var name = fileName.split(".");
          // Chrome and IE add c:\fakepath to the value - we need to remove it
          // see this link for more info: http://davidwalsh.name/fakepath
          name = name[0].replace("c:\\fakepath\\", "");

          document.getElementById("upload-status").innerHTML ="<b>Loading </b>" + name;

          // define the input params for generate see the rest doc for details
          // https://developers.arcgis.com/rest/users-groups-and-items/generate.htm
          var params = {
            name: name,
            targetSR: view.spatialReference,
            maxRecordCount: 1000,
            enforceInputFileSizeLimit: true,
            enforceOutputJsonSizeLimit: true
          };

          // generalize features to 10 meters for better performance
          params.generalize = true;
          params.maxAllowableOffset = 10;
          params.reducePrecision = true;
          params.numberOfDigitsAfterDecimal = 0;

          var myContent = {
            filetype: "shapefile",
            publishParameters: JSON.stringify(params),
            f: "json"
          };

          // use the REST generate operation to generate a feature collection from the zipped shapefile
          request(portalUrl + "/sharing/rest/content/features/generate", {
            query: myContent,
            body: document.getElementById("uploadForm"),
            responseType: "json"
          }) .then(function(response) {
              var layerName =response.data.featureCollection.layers[0].layerDefinition.name;
              document.getElementById("upload-status").innerHTML = "<b>Loaded: </b>" + layerName;
              addShapefileToMap(response.data.featureCollection);
            }).catch(errorHandler);
        }

        function errorHandler(error) {
          document.getElementById("upload-status").innerHTML = "<p style='color:red;max-width: 500px;'>" + error.message + "</p>";
        }

        function addShapefileToMap(featureCollection) {
          // add the shapefile to the map and zoom to the feature collection extent
          // if you want to persist the feature collection when you reload browser, you could store the
          // collection in local storage by serializing the layer using featureLayer.toJson()
          // see the 'Feature Collection in Local Storage' sample for an example of how to work with local storage
          var sourceGraphics = [];

          var layers = featureCollection.layers.map(function(layer) {
            var graphics = layer.featureSet.features.map(function(feature) {
              return Graphic.fromJSON(feature);
            });
            sourceGraphics = sourceGraphics.concat(graphics);
            var featureLayer = new FeatureLayer({
              objectIdField: "FID",
              source: graphics,
              fields: layer.layerDefinition.fields.map(function(field) {
                return Field.fromJSON(field);
              })
            });
            return featureLayer;
            // associate the feature with the popup on click to enable highlight and zoom to
          });
          map.addMany(layers);
          view.goTo(sourceGraphics);

          document.getElementById("upload-status").innerHTML = "";
        }
      });
    </script>

</head>
 
   
  <body>
    <div id="mainWindow">
      <div>

        <div style="padding-left:4px;">
          <p>
            Download shapefile from
            <a
              href="https://bsvensson.github.io/various-tests/shp/drp_county_boundary.zip"
              >here.</a
            >
          </p>
          <p>Add a zipped shapefile to the map.</p>
          <p>
            Visit the
            <a
              target="_blank"
              href="https://doc.arcgis.com/en/arcgis-online/reference/shapefiles.htm"
              >Shapefiles</a
            >
            help topic for information and limitations.
          </p>
          <form enctype="multipart/form-data" method="post" id="uploadForm">
            <div class="field">
              <label class="file-upload">
                <span><strong>Add File</strong></span>
                <input type="file" name="file" id="inFile" />
              </label>
            </div>
          </form>
          <span
            class="file-upload-status"
            style="opacity:1;"
            id="upload-status"
          ></span>
          <div id="fileInfo"></div>
        </div>
      </div>
	  
    </div>
	<div id="viewDiv"></div>

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
    
  </body>
</html>
