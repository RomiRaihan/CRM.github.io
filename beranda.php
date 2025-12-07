<?php
include "db/database.php";
session_start();
if(isset($_SESSION['is_login']) == false){
  header("location: login.php");
}
if(isset($_POST['logout'])){
  session_unset();
  session_destroy();
  header('location: login.php');
}
$sql = "SELECT COUNT(*) AS total FROM datapelanggan";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$totalPelanggan = $row['total'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IMORA TECH</title>
    <link rel="icon" type="image/png" href="/gambar/tittle.png" />
    <link rel="stylesheet" type="text/css" href="imoratech.css" />
    <link rel="stylesheet" href="icon/css/all.css" />
  </head>
  <body>
    <header>
      <!-- start navbar -->

        <nav class="navbar">
          <div class="logo">
            <a href="logo.png"
              ><img src="gambar/logo.png" alt="Logo" class="logo-img"
            /></a>
          </div>
          <div class="navbar-nav">
              <span style="color: white; font-size:12px; text-transform: uppercase;
 font-weight: bold; margin-top:2.5rem; margin-bottom:2.5rem; margin-left:4.5rem;">Selamat Datang 
              <?=$_SESSION['username']?>
            </span>
            <a href="beranda.php"><i class="fa-solid fa-gauge"></i></i>DASHBOARD</a>
            <a href="CRM.php"><p>CRM</p>
              <i class="fa-regular fa-user"></i>CUSTOMER
              </a>
              <a href="customer.php?id=1"><p>NETWORKING</p>
              <i class="fa-regular fa-user"></i>CUSTOMER
              </a>
                <form class="logoute" action="beranda.php" method="POST">
                   <button type="submit" name="logout" class="btn-logout">LOGOUT</button>
                </form>
          </div>
          <div class="hamburger" id="hamburger">
            <i class="fa-solid fa-bars bar" style="color: white"></i>
            <i class="fa-solid fa-xmark x" style="color: white"></i>
          </div>
      </nav>
      <!-- navbar end -->
    </header>
    <main>
     <div class="dashboard">
      <div class="conten">TOTAL PELANGGAN
        <div class="total-pelanggan"><?php echo $totalPelanggan?> Pelanggan</div>
      </div>
      <div class="conten">TOTAL TUNGGAKAN
        <div class="total-tunggakan">20 PELANGGAN</div>
      </div>
      <div class="conten">TOTAL AKTIVASI
        <div class="total-aktivasi">15 AKTIVASI</div>
      </div>
      <div class="conten2">TOTAL PELANGGAN BARU
      <div class="total-pelanggan-baru">10 PELANGGAN</div>
      </div>
      <div class="conten3">PENJUALAN
      <P>INFORMASI GRAFIK PENJUALAN</P>
      <img src="gambar/emas.png" alt="">
      </div>
     </div>
    </main>
    <!-- konten 3 end -->
    <!-- footer start -->
    <!-- <footer>
      <div class="social">
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
      </div>

      <div class="credit">
        <p>credit by <a href="">RomiRaihan</a>. | &copy; 2024</p>
      </div>
    </footer> -->
    <!-- footer end -->
    <!-- js -->
    <script src="js/imoratech.js"></script>
  </body>
</html>
