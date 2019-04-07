<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo WEBSITE_TITLE; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo WEBSITE_URL; ?>/asset/css/style.css">
  </head>

  <body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo WEBSITE_URL; ?>">WMS</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search" action="<?php echo WEBSITE_URL; ?>" method="GET">
                  <div class="form-group">
                    <input type="text" class="form-control" name="dustbinid" id="dustbinid" placeholder="Enter Bin ID">
                  </div>

                  <button type="submit" class="btn btn-alert">Search</button>
                </form>
              </li>
              <li><a href="javascript::void(0)"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Contact</a></li>
              <li>
              <?php
                if (isset($_SESSION['user'])) {
                  echo '<li><a href="' . WEBSITE_URL . 'admin/index.php"><span class="glyphicon glyphicon-book"></span>&nbsp; ' . $_SESSION['user'] . '</a></li>';
                  echo '<li><a href="' . WEBSITE_URL . 'admin/logout.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Logout</a></li>';
                } else {
                  echo '<li><a href="' . WEBSITE_URL . 'admin/login.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Login</a></li>';
                }
              ?>
            </ul>
        </div>
      </div>
      <div id="address-list"></div>
    </nav>
