<?php
session_start();
include 'operasi.php';

if (isset($_POST["submit"])) {
   Registrasi();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
   <title>Form Login</title>
</head>

<body>
   <?php include 'navbar.php'; ?>
   <div class="container mt-5">
      <div class="col-md-6 offset-md-3">
         <div class="card ">
            <div class="card-header">
               Daftar Akun
            </div>
            <div class="card-body">
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group ">
                     <label for="instansi">Nama User</label>
                     <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                     <label for="kepada">Email</label>
                     <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-row">
                     <div class="col">
                        <label for="kepada">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                     </div>
                     <div class="col">
                        <label for="nama">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                     </div>
                  </div>

                  <div class="form-group ">
                     <label for="nama">Foto</label>
                     <input type="file" class="form-control" id="foto" name="foto">
                  </div>
                  <div class="form-group">

                     <input type="hidden" name="role" value="0" />



                     <button type="submit" name="submit" class="btn btn-primary col-12">Send</button>
               </form>
            </div>
         </div>
      </div>
   </div>


   <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
<script src="assets/sweetalert2/dist/sweetalert2.js"></script>