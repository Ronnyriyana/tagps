<?php
//include('cekkoordinatmasuk.php');
?>


<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="http://maps.google.com/maps/api/js"></script>
  <script src="gmaps.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="../gmaps.js"></script>
  <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="examples.css" />
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
<style type="text/css">
    #map {
      width: 1200px;
      height: 600px;
    }
  </style>
  <script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        el: '#map',
        lat: -6.887091,
        lng: 107.615005
      });
      
        var path = [
            <?php
				include("koneksiDB.php");
				$qr=mysqli_query($koneksi, "select data from points");
				while($data = mysqli_fetch_array($qr)){
					echo $data['data'];
				}
			?>
          ];
     
		polygon = map.drawPolygon({
			paths: path,
			strokeColor: '#BBD8E9',
			strokeOpacity: 1,
			strokeWeight: 3,
			fillColor: '#BBD8E9',
			fillOpacity: 0.6
		  });
	

      map.addMarker({
        lat: -6.887091,
        lng: 107.615005,
        draggable: true,
        fences: [polygon],
        outside: function(marker, fences){
          alert('This marker has been moved outside of its fence');
        }
      });
    });
  </script>
<body>

<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">GPS Tracker Bertenaga Surya</a>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:800px;min-width:400px" id="home">
  <img class="w3-image" src="modul gps.jpg" alt="Hamburger Catering" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">GPS Tracker Bertenaga Surya</h1>
  </div>
</header>
<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="arduino.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About GPS Tracker Bertenaga Surya</h1><br>
      <p class="w3-large"> GPS tracker bertenaga surya adalah</p>
    </div>
  </div>
  
  
  <div class="w3-row w3-padding-64" id="tampilan">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Tampilan Peta</h1><br>
	</div>
   </div>
   

			<script src="http://maps.google.com/maps/api/js"></script>
			<script src="gmaps.js"></script>
			<style type="text/css">
				#map {
						width: 600px;
						height: 750px;
					}
			</style>
  
  <div id="map"></div>
  <script>
    var map = new GMaps({
      el: '#map',
      lat: -6.887091,
      lng: 107.615005
    });
  </script>

		<div class="w3-col m6 w3-padding-large">
				<h1 class="w3-center">koordinat saat ini</h1><br>
				<p class="w3-large" name= "listkoordinat"> <i><?php echo $koordinat; ?></i></p>
		</div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<p>
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
