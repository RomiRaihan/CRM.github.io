<?php
include "db/database.php";
// include "db/update.php";
session_start();
if(isset($_SESSION['is_login']) == false){
  header("location: login.php");
}
if(isset($_POST['logout'])){
  session_unset();
  session_destroy();
  header('location: login.php');
}
$id = $_GET['id'];
if (!isset($_GET['id'])) {
    die("ID pelanggan tidak ditemukan.");
}
$pelanggan = "SELECT * FROM datapelanggan WHERE IDpelanggan = '$id' LIMIT 1";
$sql = mysqli_query($db, $pelanggan);
$result = mysqli_fetch_assoc($sql);


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IMORA TECH</title>
    <link rel="icon" type="image/png" href="/gambar/tittle.png" />
    <link rel="stylesheet" type="text/css" href="customer.css" />
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
              <a href="beranda.php"><i class="fa-solid fa-gauge"></i>DASHBOARD</a>
              <a href="CRM.php"><p>CRM</p>
                <i class="fa-regular fa-user"></i>CUSTOMER
              </a>
              <a href="customer.php"><p>NETWORKING</p>
                <i class="fa-regular fa-user"></i>CUSTOMER
              </a>
              <form class="logoute" action="customer.php" method="POST">
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
      <div class="customer">
        <span><?php echo $result['nama']?></span>   |<span> <?php echo "CUS" . str_pad($result['IDpelanggan'], 3, "0", STR_PAD_LEFT); ?></span>
        <br><div class="kontak">
         <a href=""><i class="fa-brands fa-whatsapp" style="color: #04ff00; margin-right: 0.5rem;" ></i><?php echo $result['Nohp']?></a>
         <a href=""><i class="fa-solid fa-envelope" style="color: #000000; margin-right: 0.5rem;"></i><?php echo $result['Email']?></a>
        </div>
        <div class="lokasi">
          <p><i class="fa-solid fa-sitemap" style="color: #000000; margin-right: 0.5rem;"></i><?php echo $result['site']?></p>
          <p><i class="fa-solid fa-house"style="color: #000000; margin-right: 0.5rem;"></i><?php echo $result['alamat']?></p>
        </div>
      </div>
        <hr>
        <div class="data-customer">
          <div class="navcus">
            <a href="">INFORMASI</a><a href="">SERVICES</a><a href="">TAGIHAN</a><a href="">TRANSAKSI</a>
          </div>
          <div class="dataregist">
            <p class="head">DATA REGISTRASI</p>
            <div class="data">
              <p>TANGGAL REGISTRASI</p><p>NETWORK SITE</p>
            </div>
            <div class="data2">
              <p><i class="fa-regular fa-calendar"style="color: white; margin-right: 0.5rem;">
              </i><?php echo $result['tanggalregist']?></p>
              <p><i class="fa-solid fa-layer-group"style="color: white; margin-right: 0.5rem;">
              </i><?php echo $result['site']?></p>
            </div>
          </div>
          <div class="datapelanggan">
            <p class="head">DATA PELANGGAN</p>
            <div class="detail-pelanggan">
              <div class="item1">Nama</div>
              <div class="item1">Jenis Kelamin</div>
              <div class="item2"><?php echo $result['nama']?></div>
              <div class="item2"><?php echo $result['JenisKelamin']?></div>
              <div class="item1">No.Handphone</div>
              <div class="item1">E-Mail</div>
              <div class="item2"><?php echo $result['Nohp']?></div>
              <div class="item2"><?php echo $result['Email']?></div>
              <div class="item1">Tanggal Lahir</div>
              <div class="item1">Nomor Induk Kependudukan(NIK)</div>
              <div class="item2"><?php echo $result['tanggallahir']?></div>
              <div class="item2"><?php echo $result['NIK']?></div>
          </div>
           <div class="dataKTP">
            <p class="head">ALAMAT SESUAI KTP</p>
            <div class="itm1">
              <div class="item1">ALAMAT</div>
              <div class="item2"><?php echo $result['alamat']?>
                |  <?php echo $result['kelurahan']?>  |  <?php echo $result['kecamatan']?>  |  <?php echo $result['kota']?>  |  
          <?php echo $result['provinsi']?></div>
            </div>
            <div class="detail-alamat">
              <div class="item3">KELURAHAN</div>
              <div class="item3">KECAMATAN</div>
              <div class="item4"><?php echo $result['kelurahan']?></div>
              <div class="item4"><?php echo $result['kecamatan']?></div>
              <div class="item3">KOTA</div>
              <div class="item3">PROVINSI</div>
              <div class="item4"><?php echo $result['kota']?></div>
              <div class="item4"><?php echo $result['provinsi']?></div>
          </div>
          <button type="button" class="open">UPDATE DATA</button>
        </div>
    </main>
    <section class="produk">
      <div class="produk-kontener">
        <i class="fa-solid fa-xmark close-x" style="color: gray;"></i>
        <div class="konten-produk">
          <div class="deskripsi-produk">
            <h2>UPDATE DATA</h2>
            
            <form action="db/update.php" method="POST">
      <input type="hidden" name="IDpelanggan" value="<?php echo $result['IDpelanggan']?>">
              <div class="data-customer">
           <div class="datapelanggan">
             <p class="head">DATA PELANGGAN | <?php echo "CUS" . str_pad($result['IDpelanggan'], 3, "0", STR_PAD_LEFT); ?></p>
             <div class="detail-pelanggan">
               <div class="item1">Nama</div>
               <div class="item1">Jenis Kelamin</div>
               <div class="itm2"><input type="text" name="Nama" id="Nama"  />
               </div>
               <div class="itm2"><input type="text" name="JenisKelamin" id="JenisKelamin"  />
               </div>
               <div class="item1">No.Handphone</div>
               <div class="item1">E-Mail</div>
               <div class="itm2"><input type="text" name="Nohp" id="Nohp"  />
               </div>
               <div class="itm2"><input type="text" name="Email" id="Email"  />
               </div>
               <div class="item1">Tanggal Lahir</div>
               <div class="item1">Nomor Induk Kependudukan(NIK)</div>
               <div class="itm2"><input type="date" name="tanggallahir" id="tanggallahir"  />
               </div>
               <div class="itm2"><input type="text" name="NIK" id="NIK"  />
               </div>
           </div>
            <div class="dataKTP">
             <p class="head">ALAMAT SESUAI KTP</p>
             <div class="detail-alamat">
               <div class="item3">ALAMAT</div>
               <div class="item3">SITE</div>
               <div class="itm2"><input type="text" name="alamat" id="alamat"  />
               </div>
               <div class="itm2"><input type="text" name="site" id="site"  />
               </div>
               <div class="item3">KELURAHAN</div>
               <div class="item3">KECAMATAN</div>
               <div class="itm2"><input type="text" name="kelurahan" id="kelurahan"  />
               </div>
               <div class="itm2"><input type="text" name="kecamatan" id="kecamatan"  />
               </div>
               <div class="item3">KOTA</div>
               <div class="item3">PROVINSI</div>
               <div class="itm2"><input type="text" name="kota" id="kota"  />
               </div>
               <div class="itm2"><input type="text" name="provinsi" id="provinsi"  />
               </div>
           </div>
           <button type='submit' name="update"class="update">UPDATE DATA</button>
          </div>
          </form>
      </div>
        </div>
      </div>
    </section>
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
