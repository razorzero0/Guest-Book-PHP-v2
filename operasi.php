<?php
$host = mysqli_connect("localhost", "root", "", "gb");
function login()
{

  $username = $_POST['username'];
  $pass = md5($_POST['password']);
  global $host;
  $cekuser = mysqli_query($host, "SELECT * FROM user WHERE username = '$username'");
  $hasil = mysqli_fetch_array($cekuser);

  if ($pass != $hasil['password']) {
    header('location:login.php?status=1');
  } elseif ($hasil['status'] == 0) {
    header('location:login.php?status=2');
  } else {
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d h:m:s');
    $id = $hasil['id_user'];
    mysqli_query($host, "UPDATE user SET waktu_login='$date' WHERE id_user='$id'");

    $_SESSION['username'] = $hasil['username'];
    $_SESSION['id'] = $hasil['id_user'];
    $_SESSION['email'] = $hasil['email'];
    if ($hasil["is_Admin"] == 1) {
      $_SESSION['admin'] = 1;
      header('location:Dashboard.php');
    } else {
      header('location:Dashboard.php');
    }
  }
}



function Registrasi()
{
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  $password = md5($_POST['password']);
  $role = $_POST['role'];
  global $host;

  $datas = mysqli_query($host, "SELECT * FROM user");


  while ($hasil = $datas->fetch_assoc()) {
    if (!$nama || !$username || !$password || !$email) {
      echo "<script>
      alert('Harap diisi semua!');
      </script>";
    } elseif ($username == $hasil['username'] || $email == $hasil['email']) {
      echo "<script>
      alert('Username / Email sudah digunakan');
      </script>";

      die;
    }
  }


  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  if (!isset($errorMsg)) {
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d h:m:s');
    mysqli_query($host, "INSERT INTO user VALUES('','$nama','$username','$email','1','$role','$gambar','$password','$date')");
    header("location:login.php");
  } else {
    header(`location:registrasi.php?error=$errorMsg`);
  }
}


function addUser()
{
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  $password = md5($_POST['password']);
  $role = $_POST['role'];
  global $host;


  if (!$nama || !$username || !$password) {
    echo "<script>
      alert('Harap diisi semua!');
      </script>";
  } else {

    $gambar = upload();
    if (!$gambar) {
      return false;
    }
    if (!isset($errorMsg)) {
      date_default_timezone_set("Asia/Jakarta");
      $date = date('Y-m-d h:m:s');
      mysqli_query($host, "INSERT INTO user VALUES('','$nama','$username','$email','1','$role','$gambar','$password','$date')");
      header("location:listUser.php");
    } else {
      header(`location:listUser.php?error=$errorMsg`);
    }
  }
}






function editUser()
{
  $id_petugas = $_POST['id_user'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $gambarLama = $_POST['foto_lama'];
  global $host;
  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['foto']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }
  mysqli_query($host, "UPDATE user SET nama_user='$nama', username='$username', email='$email',foto='$gambar' WHERE id_user='$id_petugas'");

  header("location:listUser.php");
}
function editProfile()
{
  $id_petugas = $_POST['id_user'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $gambarLama = $_POST['foto_lama'];
  global $host;
  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['foto']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  mysqli_query($host, "UPDATE user SET nama_user='$nama', username='$username', email='$email',foto='$gambar' WHERE id_user='$id_petugas'");

  header("location:profile.php");
}

function upload()
{
  $imgName = $_FILES['foto']['name'];
  $imgTmp = $_FILES['foto']['tmp_name'];
  $imgSize = $_FILES['foto']['size'];
  $upload_dir = 'uploads/';
  $error = $_FILES['foto']['error'];
  $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

  $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

  $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;
  $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

  $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

  $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
    return false;
  }


  if (in_array($imgExt, $allowExt)) {

    if ($imgSize < 5000000) {
      move_uploaded_file($imgTmp, $upload_dir . $userPic);
    } else {
      echo "<script>
				alert('Ukuran Gambar terlalu besar!');
			  </script>";
      return false;
    }
  } else {
    echo "<script>
    alert('Bukan gambar!');
    </script>";
    return  false;
  }

  return $userPic;
}



function hapusUser()
{
  $id_petugas = $_GET['id_user'];
  global $host;
  mysqli_query($host, "DELETE FROM user WHERE id_user='$id_petugas'");
  header("location:listUser.php");
}

function addPengunjung()
{
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $masuk = str_replace('T', ' ', $_POST['masuk']);
  $keluar =  $_POST['keluar'];

  global $host;
  mysqli_query($host, "INSERT INTO pengunjung VALUES('','$nama','$email','$masuk','$keluar' )");
  if (!$_SESSION['username']) {
    header("location:formPengunjung.php?status=1");
  } else {
    header("location:kunjunganSaya.php?status=1");
  }
}

function editPengunjung()
{
  $id_pengunjung = $_POST['id_pengunjung'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $masuk = $_POST['masuk'];
  $keluar = $_POST['keluar'];
  $alamat = $_POST['alamat'];
  $komentar = $_POST['komentar'];
  global $host;
  mysqli_query($host, "UPDATE pengunjung SET nama='$nama', email='$email', nama='$nama', 
    jam_masuk='$masuk', jam_keluar='$keluar',alamat='$alamat', komentar='$komentar' WHERE id_pengunjung='$id_pengunjung'");
  header("location:listPengunjung.php");
}

function hapusPengunjung()
{
  $id_pengunjung = $_GET['id_pengunjung'];
  global $host;
  mysqli_query($host, "DELETE FROM pengunjung WHERE id_pengunjung='$id_pengunjung'");
  header("location:listPengunjung.php");
}


function addKomentar()
{
  global $host;
  $username = $_SESSION["username"];
  $komentar = $_POST['komentar'];
  date_default_timezone_set("Asia/Jakarta");
  $waktu = date('d F Y, H:i');
  $cekuser = mysqli_query($host, "SELECT * FROM user WHERE username = '$username'");
  $hasil = mysqli_fetch_array($cekuser);
  $profile = $hasil['foto'];

  global $host;

  mysqli_query($host, "INSERT INTO komentar VALUES('','$username','$komentar','','$profile','$waktu')");
}

function favoriteKomentar()
{
  $id = $_GET['id_komentarFavorite'];
  global $host;
  mysqli_query($host, "UPDATE komentar SET bintang='1' WHERE id='$id'");
}
function UnfavoriteKomentar()
{
  $id = $_GET['id_komentarUnfavorite'];
  global $host;
  mysqli_query($host, "UPDATE komentar SET bintang='0' WHERE id='$id'");
}


function hapusKomentar()
{
  $id = $_GET['id_komentar'];
  global $host;
  mysqli_query($host, "DELETE FROM komentar WHERE id='$id'");
  header('Location: ' . $_SERVER['PHP_SELF']);
  die;
}

function hapusSemuaKomentar()
{
  global $host;
  $result = mysqli_query($host, "SELECT * FROM komentar");
  while ($data = $result->fetch_assoc()) {
    mysqli_query($host, "DELETE FROM komentar WHERE id='" . $data['id'] . "'");
  }
  header('Location: ' . $_SERVER['PHP_SELF']);
  die;
}


function aktifkan()
{
  $id = $_POST['id'];
  global $host;
  mysqli_query($host, "UPDATE user SET status='1' WHERE id_user='$id'");
}
function nonaktifkan()
{
  $id = $_POST['id'];
  global $host;
  mysqli_query($host, "UPDATE user SET status='0' WHERE id_user='$id'");
}
