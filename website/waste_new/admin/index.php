<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php'; ?>
<?php
/*
  Admin index page 
 */
$sql = "SELECT * FROM addbin INNER JOIN get_value ON addbin.dustbinid=get_value.dustbinid INNER JOIN get_location ON get_value.dustbinid = get_location.dustbinid ";
$result_set = DB::getInstance()->select($sql);
$results = [];

if ($result_set) {
	while ($row = $result_set->fetch_object()) {
		$results[] = $row;
	}
}
?>
<div class="container">
	<div class="jumbotron">
		<h1 class="text-center">Smart Bin Operation</h1>
		<hr>
		<a href="add-dustbin.php" class="btn btn-primary btn-lg">Add Bin</a>
		<a href="update-dustbin.php" class="btn btn-info btn-lg">Update Bin</a>
		<a href="delete-dustbin.php" class="btn btn-danger btn-lg">Delete Bin</a>
	</div>
	<div>
		<h1 class="text-center">Smart Bin Statistics</h1>
		<hr>
		<table class="table table-striped table-responsive">
			<tr>
				<th>Seial No.</th>
				<th>Bin ID</th>
				<th>Size</th>
				<th>Value</th>
				<th>Temperature</th>
				<th>Lattitude</th>
				<th>Longitude</th>
				<!-- <th>Operation</th> -->
			</tr>
			<?php
				$count = 0;
				foreach ($results as $result) {
			?>
					<tr>
						<td><?php echo ++$count; ?></td>
						<td><?php echo $result->dustbinid; ?></td>
						<td><?php echo $result->size; ?></td>
						<td><?php echo $result->value; ?></td>
						<td><?php echo $result->temperature; ?></td>
						<td><?php echo $result->lattitude; ?></td>
						<td><?php echo $result->longitude; ?></td>
						<!-- <td>
							<a href="javascript::void(0)" class="btn btn-primary">Update</a>
							<a href="javascript::void(0)" class="btn btn-danger">Delete</a>
						</td> -->
					</tr>
			<?php
				}
			?>
		</table>
	</div>
</div>

<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'footer.php'; ?>