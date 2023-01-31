<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}

if (isset($_GET['id_komentar'])) {
  hapusKomentar();
}
if (isset($_GET['id_komentarFavorite'])) {
  favoriteKomentar();
}
if (isset($_GET['id_komentarUnfavorite'])) {
  UnfavoriteKomentar();
}

if (isset($_GET['hapusSemua'])) {
  hapusSemuaKomentar();
}
?>
<?php
include('layout/navbar.php') ?>


<!-- page content -->
<div class="right_col" role="main">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> List Data komentar</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <a href="?hapusSemua" style="margin-left:87%;" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus semua komentar ?')">Hapus Semua </a>

        <table id="datatable-buttons" class="table table-striped table-bordered table-hover ">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama </th>
              <th>Komentar</th>
              <th>Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $nomor = 1;
            $query_mysql = mysqli_query($host, "SELECT * FROM komentar ORDER BY waktu DESC");
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
              <tr>

                <td><?= $nomor++; ?></td>
                <td><?= $data['username']; ?></td>
                <td><?= $data['komentar']; ?></td>
                <td><?= $data['waktu'] ?></td>
                <td>
                  <?php if (!$data['bintang']) { ?>
                    <a class="edit btn btn-warning" href="?id_komentarFavorite=<?= $data['id']; ?>">Pin</a>

                  <?php } else {  ?><a class="edit btn btn-success" href="?id_komentarUnfavorite=<?= $data['id']; ?>">unPinned</a> <?php } ?>
                  <a class="hapus btn btn-danger" href="?id_komentar=<?= $data['id']; ?>" onclick="return confirm('Yakin?');">Hapus</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>


      </div>
    </div>

  </div>
</div>


<!-- /page content -->


<?php include('layout/footer.php') ?>