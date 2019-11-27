<?php
//include('web baca map.html'); // skrip menampilkan 
 
if(isset($_SESSION['login_user'])){
header("location: cekkoordinatmasuk.php");
}
?>


<html > 
<head> 
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
	<title>Halaman Tampilan Peta</title>
	<meta name="keywords" content="polygon,creator,google map,v3,draw,paint">
	<meta name="description" content="Google Map V3 Polygon Creator">
	
	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="polygon.min.js"></script>
	
	<script type="text/javascript">
	$(function(){
		  //create map
		 var bandung=new google.maps.LatLng(-6.887091, 107.615005);
		 var myOptions = {
		  	zoom: 16,
		  	center: bandung,
		  	mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		 map = new google.maps.Map(document.getElementById('main-map'), myOptions);
		 
		 var creator = new PolygonCreator(map);
		 
		 //reset
		 $('#reset').click(function(){ 
		 		creator.destroy();
		 		creator=null;
		 		
		 		creator=new PolygonCreator(map);
		 });		 
		 
		 
		 //show paths
		 $('#showData').click(function(){ 
		 		$('#dataPanel').empty();
		 		if(null==creator.showData()){
		 			$('#dataPanel').append('Please first create a polygon');
		 		}else{
		 			$('#dataPanel').append(creator.showData());
		 		}
		 });
		 
		 //show color
		 $('#showColor').click(function(){ 
		 		$('#dataPanel').empty();
		 		if(null==creator.showData()){
		 			$('#dataPanel').append('Please first create a polygon');
		 		}else{
		 				$('#dataPanel').append(creator.showColor());
		 		}
		 });
		 
		 // set polygon data to the form hidden field
         $('#map-form').submit(function () {
            $('#koordinat').val(creator.showData());
         });
	});	
	</script>
</head>
<body>



	<div id="header">
		<ul>
			<li class="title">
				Halaman untuk menampilkan dan melakukan proses geofancing
			</li>
		</ul>
	</div>
	<div id="main-map">
	</div>
	<form method= "post" action="simpan_data.php" id="map-form">
	<div id="side">
		<input type="hidden" id="koordinat" name="koordinat">
		<input id="reset" value="Reset" type="button" class="navi"/>
		<input id="showData" name="showdata" value="Show Paths (class function) " type="button" class="navi"/>
		<input type="submit" value= "save"/>
		<input id="showColor" value="Show Color (class function) " type="button" class="navi"/>
		<div   id="dataPanel">
		</div>
	</div>
	<input type="submit" value= "save"/>
	</form>
</body>
</html>
