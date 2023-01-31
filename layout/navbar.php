<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admiministrator</title>

  <!-- Bootstrap -->
  <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">



  <!-- Datatables -->
  <link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <!-- <link href="assets/stylesheets/jquery.spin.css" rel="stylesheet" type="text/css" /> -->
  <link href="assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-database"></i> <span>Administrator</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix ">
            <?php if (isset($_SESSION['id'])) {
              $id_petugas = $_SESSION['id'];
              $query_mysql = mysqli_query($host, "SELECT * FROM user WHERE id_user='$id_petugas'");
              while ($data = mysqli_fetch_array($query_mysql)) { ?>
                <div class="profile_pic">
                  <div style="width:60px;border-radius: 100px;">
                    <img src="uploads/<?= $data['foto'] ?>" alt="..." class="img-circle profile_img" style="width: 100%;height:60px;  object-fit:cover;">
                  </div>
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2><?= $data['nama_user'] ?></h2>
                </div>
            <?php }
            } ?>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <?php if (isset($_SESSION['admin'])) { ?>
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Dashboard.php">Dashboard</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-user"></i>Data User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="listUser.php">List User</a></li>
                      <li><a href="userNonaktif.php">User Non-Aktif</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-group"></i> Data Pengunjung<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="listPengunjung.php">List Pengunjung</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-comments"></i> Data Komentar<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="formKomentar.php">Form Komentar</a></li>
                      <li><a href="listKomentar.php">List Komentar</a></li>

                    </ul>
                  </li>
                <?php } else { ?>
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Dashboard.php">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-comments"></i> Data Komentar<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="formKomentar.php">Form Komentar</a></li>

                    </ul>
                  <li><a><i class="fa fa-history"></i> Data Kunjungan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="kunjunganSaya.php">Kunjungan saya</a></li>

                    </ul>
                  </li>
                <?php } ?>
              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <?php if (isset($_SESSION['id'])) {
                  $id_petugas = $_SESSION['id'];
                  $query_mysql = mysqli_query($host, "SELECT * FROM user WHERE id_user='$id_petugas'");
                  while ($data = mysqli_fetch_array($query_mysql)) {

                ?>
                    <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <div style="overflow:hidden;">
                        <img src="uploads/<?= $data['foto'] ?>" alt="" style="  object-fit:cover;"><?= $data['nama_user'] ?>

                        <span class=" fa fa-angle-down"></span>
                      </div>
                    </a>

                <?php }
                } ?>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="profile.php"> Profile</a></li>


                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right text-danger"></i> Log Out</a></li>
                </ul>
              </li>


            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->