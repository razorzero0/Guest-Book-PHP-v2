<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
  <title>Form Buku Tamu</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark  bg-primary mb-6">
    <div class="container">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



      <?php
      if (!isset($_SESSION['username'])) {
      ?>

        <a class="nav-item text-light nav-brand " href="formPengunjung.php">Form Kunjungan</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
          </ul>
          <a class="nav-item text-light text-bold btn btn-success " href="login.php">login</a>

        <?php } else {
        ?>
          <a class="nav-item text-light nav-brand " href="Dashboard.php">Dashboard</a>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <a class="nav-item text-light text-bold btn btn-danger " href="logout.php">logout</a>

          <?php }
          ?>

          </div>
  </nav>