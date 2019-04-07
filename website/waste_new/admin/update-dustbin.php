<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php'; ?>
<?php
/*
  UPDATE DUSTBIN 
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$dustbin_id = htmlspecialchars(stripslashes(trim($_POST['dustbin_id'])));
	$size = htmlspecialchars(stripslashes(trim($_POST['size'])));

	if (empty($dustbin_id)) {
		$message = '<p class="alert alert-danger">Dustbin ID is required.</p>';
	} else {
		if (empty($size)) {
			$message = '<p class="alert alert-danger">Size is required.</p>';
		} else if (preg_match("/^[0-9]+$/", $size) != 1){
			$message = '<p class="alert alert-danger">Size must be numeric character.</p>';
		} else {
			$result = DB::getInstance()->update("UPDATE addbin SET size='$size' WHERE dustbinid='$dustbin_id'");
			if ($result) {
				$message = '<p class="alert alert-success">Operation Successfull</p>';
			} else {
				$message = '<p class="alert alert-danger">Operation Failed.</p>';
			}
		}
	}
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="jumbotron">
				<h1 class="text-center">Update Smart Bin</h1>
				<hr>
				<?php
					if (isset($message)) {
						echo $message;
					}
				?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="dustbin_id">Bin ID:</label>
						<select name="dustbin_id" class="form-control">
							<option value="">Select Bin ID</option>
							<?php
								$results = DB::getInstance()->select("SELECT * FROM addbin");

								if ($results) {
									while ($row = $results->fetch_object()) {
										echo '<option value="' . $row->dustbinid . '">'. $row->dustbinid .'</option>';
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="size">Size:</label>
						<input type="text" name="size" placeholder="size" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary brn-lg">
					</div>
				</form>
			</div>	
		</div>
	</div>
</div>

<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'footer.php'; ?>