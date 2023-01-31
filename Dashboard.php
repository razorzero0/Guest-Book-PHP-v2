<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
   header('location:login.php');
} else {
   $username = $_SESSION['username'];
}

if (isset($_GET["id_user"])) {
   hapusUser();
}
if (isset($_POST["submit"])) {
   addUser();
}
if (isset($_POST["aktifkan"])) {
   aktifkan();
}
if (isset($_POST["nonaktifkan"])) {
   nonaktifkan();
}


?>
<?php
include('layout/navbar.php') ?>


<!-- page content -->
<div class="right_col" role="main">

   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2> Selamat Datang <?= $_SESSION['username'] ?></h2>
            <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
               </li>

               <li><a class="close-link"><i class="fa fa-close"></i></a>
               </li>
            </ul>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">

         </div>
      </div>

   </div>
</div>


<!-- /page content -->


<?php include('layout/footer.php') ?>