<!DOCTYPE html>
<html>

<head>
	
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
	
	<title>Map</title>

	<style type="text/css">
		body{
			margin: 0;
		}
		#map{
			height: 100vh;
			width: 100vw;
		}
	</style>

</head>


<body>

	<div id='map'></div>

	<script>

	  mapboxgl.accessToken = 'pk.eyJ1IjoibWRzYWtpYjc1IiwiYSI6ImNrdnl2c2pneTR6Zmkyb210eWk2Y292cXgifQ.Eag7xY-igJI6Mkl7VziwXQ';
	  
	  navigator.geolocation.getCurrentPosition(successLocation,errorLocation,{enableHighAccuracy: true})

	  function successLocation(position){
	  	console.log(position)
	  	setupMap([position.coords.longitude,position.coords.latitude])
	  }


	  function errorLocation(){
	  	setupMap([23.8103, 90.4125])
	  }

	  function setupMap(center){
	  	const map = new mapboxgl.Map({
		    container: 'map',
		    style: 'mapbox://styles/mapbox/streets-v11',
		    center: center,
		    zoom: 16
		});

	  	const nav = new mapboxgl.NavigationControl()
		map.addControl(nav)

		var directions = new MapboxDirections({
		  accessToken: mapboxgl.accessToken
		 
		});

		

		map.addControl(directions, 'top-left');

	  }

	  

	</script>

</body>
</html>
