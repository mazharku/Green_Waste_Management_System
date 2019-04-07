<?php include_once 'inc/header.php'; ?>

<?php
	$dustbinid = '';
	
	if (isset($_GET['dustbinid'])) {
		$dustbinid = $_GET['dustbinid'];
	}
?>

<div class="container">
	<div class="jumbotron">
		<h1 class="text-center">Green Waste Management System</h1>
	</div>	
</div>

<div class="container">
	<div id="content" style="min-height: 600px;"></div>	
</div>


<div class="container">
	<a href="map-view.php" class="btn btn-primary btn-lg">Map View</a>
</div>

<script type="text/javascript">

setInterval(function() {
	var dustbinid = "<?php echo $dustbinid; ?>"; 
	var content = document.getElementById('content');

	var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHttp') : new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// console.log(JSON.parse(this.responseText));
			content.innerHTML = this.responseText;
		}
	}
	request.open('GET', 'ajax/alldustbin.php?dustbinid=' + dustbinid, true);
	request.send(null);	
}, 500);
</script>

<?php include_once 'inc/footer.php'; ?>