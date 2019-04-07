<?php include_once 'inc/header.php'; ?>

	<div class="jumbotron">
		<h1 class="text-center">Google Map View</h1>
	</div>
	<div id="map" style="height: 600px; width: 100%;"></div>

	<script type="text/javascript">
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 14,
				center: {lat:22.8033,lng:89.5324}
			});

			downloadData('ajax/coordinates.php', function(data) {
				var json = JSON.parse(data.responseText);

				for (i = 0; i < json.length; i++) {
					addMarker(map, json[i]);
				}
			});
		}

		function addMarker(mapObject, markerPositionObject) {
			var lattitude = parseFloat(markerPositionObject.lattitude);
			var longitude = parseFloat(markerPositionObject.longitude);
			
			var marker = new google.maps.Marker({
				position: {
					lat: lattitude,
					lng: longitude
				},
				map: mapObject,
				icon: 'asset/img/icon1.png'
			});

			var infoWindow = new google.maps.InfoWindow();

			var geocoder = new google.maps.Geocoder();

			geocoder.geocode({'location': {lat: lattitude, lng: longitude}}, function(results, status) {
		    	var address = "...........";

		    	if (status === 'OK') {
		    		if (results[0]) {
		    			address = results[0].formatted_address;
						infoWindow.setContent('<h3>' + markerPositionObject.dustbinid + '<hr>' + address + '</h3>');

						
		    		} else {
		    			infoWindow.setContent('<h3>' + markerPositionObject.dustbinid + '<hr>' + address + '</h3>');
		    		}
		    	} else {
		    		infoWindow.setContent('<h3>' + markerPositionObject.dustbinid + '<hr>' + address + '</h3>');
		    	}
		    });

		    marker.addListener('click', function() {
				infoWindow.open(mapObject, marker);
			});
		}

		function downloadData(url, callback) {
			var request = window.ActiveXObject ? 
					new ActiveXObject('Microsoft.XMLHttp') : 
					new XMLHttpRequest();
			
			request.onreadystatechange = function() {
				if (request.readyState == 4) {
					request.onreadystatechange = doNothing();
					callback(request, request.status);
				}
			}
			request.open('GET', url, true);
			request.send(null);
		}

		function doNothing() {}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6mu75V0U-rfxhsGyPXLBURyoP3xdCFxA&callback=initMap"></script>

<?php include_once 'inc/footer.php'; ?>