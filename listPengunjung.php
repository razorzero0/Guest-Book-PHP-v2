<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
   header('location:login.php');
} else {
   $username = $_SESSION['username'];
}

if (isset($_GET["id_pengunjung"])) {
   hapusPengunjung();
}



?>
<?php
include('layout/navbar.php') ?>


<!-- page content -->
<div class="right_col" role="main">

   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2> List Data Pengunjung</h2>
            <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
               </li>

               <li><a class="close-link"><i class="fa fa-close"></i></a>
               </li>
            </ul>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">

            <div class="container mt-3">
               <div class="col-md-12 ">
                  <div class="card ">


                     <div class="card-body">

                        <table id="datatable-buttons" class="table table-striped table-bordered table-hover ">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Nama </th>
                                 <th>Email</th>
                                 <th>Waktu Masuk</th>
                                 <th>Waktu Keluar</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $nomor = 1;
                              $query_mysql = mysqli_query($host, "SELECT * FROM pengunjung ORDER BY id DESC");
                              while ($data = mysqli_fetch_array($query_mysql)) {
                              ?>
                                 <tr>

                                    <td><?= $nomor++; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['email']; ?></td>
                                    <td><?= $data['jam_masuk']; ?></td>
                                    <td><?= $data['jam_keluar']; ?></td>

                                    <td>
                                       <!-- <a class="edit btn btn-warning" href="edit.php?id_pengunjung=<?= $data['id_pengunjung']; ?>">Edit</a> -->
                                       <a class="hapus btn btn-danger" href="?id_pengunjung=<?= $data['id_pengunjung']; ?>" onclick="return confirm('Yakin?');">Hapus</a>
                                    </td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                        </table>

                     </div>
                  </div>
               </div>


            </div>
         </div>
      </div>

   </div>
</div>


<!-- /page content -->


<?php include('layout/footer.php') ?>