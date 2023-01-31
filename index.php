<?php session_start(); ?>
<link rel="stylesheet" href="assets/css/a.css">
<!-- <link rel="stylesheet" href="nav.css"> -->

<body>
  <div class="loading"></div>
  <div class="main-main" style="display: none;">

    <?php include 'navbar.php' ?>
    <div class="context">

      <img src="assets/img/s.gif" class="img" />
      <h1 class="box">Selamat Datang</h1><br>
      <h1 class="box">Aplikasi Perpustakaan by</h1><br>
      <ul>
        <li>
          <h3 class="name1">Muh Ainun Yanuarsyam (20562020015)</h3>
        </li>
        <li>
          <h3 class="name2">Ridofas Tri Sandi (20562020023)</h3>
        </li>
      </ul>
    </div>

    <div class="area">
      <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.loading').load('loading.php')
      setTimeout(() => {
        $('.loading').css({
          "display": "none"
        });
        $('.main-main').css({
          "display": "block"
        });
      }, 3000)

    })
  </script>
  <script>
    setTimeout(() => {

      var tl = gsap.timeline({
        repeat: 20,
        repeatDelay: 1
      });
      tl.to(".img", {
        x: 1210,
        duration: 3
      });
      tl.to(".img", {
        rotate: -90,
        duration: 1
      });
      tl.to(".img", {
        y: -1090,
        duration: 3
      });
      tl.to(".img", {
        x: 0,
        duration: 1,
        rotate: 0
      });
      tl.to(".img", {
        y: 0,
        duration: 3
      });

    }, 3000)
  </script>
</body>

</html>