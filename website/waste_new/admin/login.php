<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = htmlspecialchars(stripslashes(trim($_POST['username'])));
	$password = $_POST['password'];

	if (empty($username)) {
		$message = 'Username is required';
	} else if (empty($password)) {
		$message = 'Password is required';
	} else {
		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$results = DB::getInstance()->select($sql);
		
		if ($results) {
			$result = $results->fetch_object();
			$_SESSION['user'] = $result->username;
			header('Location:' . 'index.php');
		} else {
			$message = "Username or Password is incorrect";
		}
	} 
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="jumbotron">
				<h1 class="text-center">Login</h1>
				<hr>
				<?php
					if (isset($message)) {
						echo '<p class="alert alert-danger">' . $message . '</p>';
					}
				?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" name="username" placeholder="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="text" name="password" placeholder="password" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="login" class="btn btn-primary brn-lg">
					</div>
				</form>
			</div>	
		</div>
	</div>
</div>

<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'footer.php'; ?>