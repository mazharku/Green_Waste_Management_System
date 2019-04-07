<?php include_once 'inc/header.php'; ?>

<?php 
	/*
	 * DUSTBIN STATISTICS PAGE 
	 */
	if (isset($_GET['id'])) {
		$dustbinid = $_GET['id'];
	} else {
		header('location:index.php');
		exit();
	}
?>
<div class="container">
	<h1 class="text-center">Smart Bin ID: <?php echo $dustbinid; ?></h1>
	<h3 class="text-center">Statistics</h3>
<?php 
	$sql = "SELECT * FROM statistics WHERE dustbinid=$dustbinid";

	$result = DB::getInstance()->select($sql);

if ($result) {
	?>
	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Empty Date</th>
			<th>Full Date</th>
		</tr>
	<?php
	$count = 0;
	while ($row = $result->fetch_object()) {
		?>
		<tr>
			<td><?php echo ++$count; ?></td>
			<td><?php if ($row->empty_date != NULL) { echo date('F d, Y h:i:sa', strtotime($row->empty_date)); } ?></td>
			<td><?php if ($row->full_date != NULL) { echo date('F d, Y h:i:sa', strtotime($row->full_date)); } ?></td>
		</tr>
<?php		
	}
	echo '</table>';
} else {
	echo 'Sorry';
}
?>

</div>
<?php include_once 'inc/footer.php'; ?>