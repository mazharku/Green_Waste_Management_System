<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php'; ?>
<?php
/*
  DELETE DUSTBIN 
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$dustbin_id = htmlspecialchars(stripslashes(trim($_POST['dustbin_id'])));
	//$size = htmlspecialchars(stripslashes(trim($_POST['size'])));

	if (empty($dustbin_id)) {
		$message = '<p class="alert alert-danger">Bin ID is required.</p>';
	} else {
		$result0 = DB::getInstance()->delete("DELETE FROM addbin WHERE dustbinid='$dustbin_id'; ");
		$result1 = DB::getInstance()->delete("DELETE FROM get_value WHERE dustbinid='$dustbin_id'; ");
		$result2 = DB::getInstance()->delete("DELETE FROM get_location WHERE dustbinid='$dustbin_id'; ");
		//$result3 = DB::getInstance()->delete("DELETE FROM statistics WHERE dustbinid='$dustbin_id'; ");

		if ($result0 && $result1 && $result2) {
			$message = '<p class="alert alert-success">Operation Successfull</p>';
		} else {
			$message = '<p class="alert alert-danger">Operation Failed.</p>';
		}
	}
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="jumbotron">
				<h1 class="text-center">Delete Smart Bin</h1>
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
								$results = DB::getInstance()->select("SELECT * FROM addbin;");

								if ($results) {
									while ($r = $results->fetch_object()) {
										echo '<option value="' . $r->dustbinid . '">'. $r->dustbinid .'</option>';
									}
								}
							?>
						</select>
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