<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php'; ?>
<?php
/*
  add new dustbin
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dustbin_id = htmlspecialchars(stripslashes(trim($_POST['dustbin_id'])));
    $size = htmlspecialchars(stripslashes(trim($_POST['size'])));

    $validate = new Validate();
    $validation = $validate->validation(array(
        'Dustbin ID' => $dustbin_id
    ));

    if ($validation) {
        if (empty($size)) {
            $message = '<p class="alert alert-danger">Size is required</p>';
        } else if (preg_match("/^[0-9]+$/", $size) != 1) {
            $message = '<p class="alert alert-danger">Size must be numeric character.</p>';
        } else {
            $result = DB::getInstance()->multiple_query(
                "INSERT INTO addbin(dustbinid, size) VALUES ('$dustbin_id', '$size');" .
                "INSERT INTO get_location(dustbinid, longitude, lattitude) VALUES ('$dustbin_id', 0, 0);" .
                "INSERT INTO get_value(dustbinid, value, temperature) VALUES ('$dustbin_id', '$size', 0);" .
                "INSERT INTO statistics(dustbinid) VALUES ('$dustbin_id', NULL, NULL);"
            );
            var_dump($result);
            if ($result === true) {
                $message = '<p class="alert alert-success">Successfully added new Smart Bin</p>';
            } else {
                $message = '<p class="alert alert-danger">Failed to add new Smart Bin</p>';
            }
        }
    } else {
        $message = '<p class="alert alert-danger">' . $validate->get_errors()[0] . '</p>';
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="jumbotron">
                <h1 class="text-center">ADD Smart Bin</h1>
                <hr>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="dustbin_id">Bin ID:</label>
                        <input type="text" name="dustbin_id" placeholder="Bin id" class="form-control">
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