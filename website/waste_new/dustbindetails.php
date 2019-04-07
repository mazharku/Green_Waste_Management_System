<?php include_once 'inc/header.php'; ?>

<?php 
	/*
	 * DUSTBIN PAGE 
	 */
	if (isset($_GET['id'])) {
		$dustbinid = $_GET['id'];
	} else {
		header('location:index.php');
		exit();
	}

?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div id="dustbin"></div>
		</div>
		<div class="col-md-4">
			<h1>Smart Bin Details</h1>
			<p id="dustbin-id">Bin ID</p>
			<p id="dustbin-status">Status:</p>
			<p id="dustbin-temperature">Temperature</p>
			<p id="dustbin-location">Location</p>
			<p id="current-date">Date</p>
		</div>
		<div class="col-md-5">
			<div id="map" style="height:600px; width=100%;"></div>			
		</div>
	</div>
</div>
<div class="container-fluid" style="margin-bottom: 50px;">
	<a href="statistics.php?id=<?php echo $dustbinid; ?>" class="btn btn-primary btn-lg">Bin Statistics</a>
</div>

<script type="text/javascript">
	var dustbinid = "<?php echo $dustbinid; ?>";
	var url = "ajax/dustbindata.php?id=" + dustbinid;


	setInterval(function() {
		downloadDustbinData(url, function(request) {
			var data = JSON.parse(request.responseText);
			
			var heights = 100 - ((parseFloat(data[0].value) / parseFloat(data[0].size) * 100).toFixed(2));
			var height= parseFloat(heights).toFixed(2);
			

			document.getElementById('dustbin-id').innerHTML = "Bin ID: " + data[0].dustbinid;
			document.getElementById('dustbin-status').innerHTML = "Status: " + height+' % FULL';
			document.getElementById('dustbin-temperature').innerHTML = "Temperature: " + data[0].temperature + ' &#8451;';
			document.getElementById('current-date').innerHTML = "Date: " + (new Date());
			document.getElementById('dustbin').innerHTML = '<div class="col-md-2" style="height: 220px; width: 150px; border: 2px solid #000;margin:20px;border-radius: 70px 70px 7px 7px;padding: 0;"><div style="position:absolute;bottom:0;background: #999;height: '+height+'%;width: 100%;border-radius: 65px 65px 6px 6px;"></div><div style="position: relative;top:50%;left:50%;transform: translate(-50%,-50%);"><a href="javascript:void(0)" style="text-align: center;font-size: 20px;color: #000;"><p>'+data[0].size+'</p><p>'+parseFloat((data[0].size - data[0].value)).toFixed(2)+'</p></a></div></div>';
		});
	}, 1000);
	

	function downloadDustbinData(url, callback) {
		var request = window.ActiveXObject ?
				new ActiveXObject('Microsoft.XMLHttp') :
				new XMLHttpRequest();

		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				request.onreadystatechange = null;
				callback(request, request.status);
			}
 		}

 		request.open('GET', url, true);
 		request.send(null);
	}

	

	function initMap() {
		downloadDustbinData(url, function(data) {
			var json = JSON.parse(data.responseText);
			// console.log(json);
			
			var latlng = {
				lat: parseFloat(json[0].lattitude),
				lng: parseFloat(json[0].longitude)
			}
			// console.log(latlng);	
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 16,
				center: latlng
			});

			var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				icon: 'asset/img/icon6.png'
			});

			var infoWindow = new google.maps.InfoWindow();

			var geocoder = new google.maps.Geocoder();

			geocoder.geocode({'location': latlng}, function(results, status) {
		    	var address = "...........";

		    	if (status === 'OK') {
		    		if (results[0]) {
		    			address = results[0].formatted_address;
						infoWindow.setContent('<h3>' + address + '</h3>');
						document.getElementById('dustbin-location').innerHTML = "Location: " + address;
						
		    		} else {
		    			infoWindow.setContent('<h3>' + address + '</h3>');
		    		}
		    	} else {
		    		infoWindow.setContent('<h3>' + address + '</h3>');
		    	}
		    });

			marker.addListener('click', function() {
				infoWindow.open(map, marker);
			});
		});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6mu75V0U-rfxhsGyPXLBURyoP3xdCFxA&callback=initMap"></script>

<?php include_once 'inc/footer.php'; ?>