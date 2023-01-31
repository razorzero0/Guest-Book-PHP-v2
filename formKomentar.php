<?php
session_start();
include "operasi.php";
if (isset($_GET['id_komentar'])) {

  hapusKomentar();
}
if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}




?>
<?php
include('layout/navbar.php') ?>
<style type="text/css">
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
    color: black;
    text-align: center;
    padding-top: 250px;
  }



  .komentar {

    border: 1px solid gray;
    padding: 2rem;
    margin-top: 1em;
    margin-bottom: 1em;
    border-radius: 20px;
    box-shadow: 2px 5px 1px gray;
  }

  .saya {
    background-color: #fff;
  }

  p {
    font-size: medium;
    color: black;

  }

  .row {
    display: flex;
    justify-content: center;
  }
</style>

<!-- page content -->
<div class="right_col" role="main">


  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2> Form Komentar</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="post" class="form-data">
            <div class="form-group">

              <textarea name="komentar" id="komentar" class="form-control" row="3" placeholder="Masukan komentar"></textarea>
            </div>
            <button id="submitKomentar" name="submit" class="btn btn-primary col-12">Send</button>
          </form>
        </div>
      </div>

      <!-- this loader will fadeout if page loaded for first time  -->
      <div class="preloader">
        <h1>Loading</h1>
        <div class="loading">
          <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </div>
      <div class="container">

        <!-- <h2 class="text-center">PHP infinite scroll pagination</h2> -->
        <br />
        <div class="col-md-12" id="post-data">
          <?php include('komentar/data.php'); ?>
        </div>
      </div>
    </div>

  </div>
</div>




<!-- /page content -->


<?php include('layout/footer.php') ?>