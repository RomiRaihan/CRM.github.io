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
$pelanggan = "
SELECT 
    crm.*, 
    datapelanggan.Nama AS Name,
    datapelanggan.Alamat,
    datapelanggan.Site
FROM crm
JOIN datapelanggan 
    ON crm.IDpelanggan = datapelanggan.IDpelanggan
ORDER BY crm.IDpelanggan ASC
";
$sql = mysqli_query($db, $pelanggan);
$no = 0;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IMORA TECH</title>
    <link rel="icon" type="image/png" href="/gambar/tittle.png" />
    <link rel="stylesheet" type="text/css" href="CRM.css" />
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
          font-weight: bold; margin-top:2.5rem; margin-bottom:2.5rem; margin-left:4.7rem;">Selamat Datang 
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
      <div class="customer"><span>CUSTOMER</span>
        <p>DAFTAR CUSTOMER</p>
        <hr>
        <div class="customer-container">
          <div class="filter-section">
            <select id="categoryFilter">
              <option value="all">Semua</option>
              <option value="online">ONLINE</option>
              <option value="offline">OFFLINE</option>
              <option value="isolir">ISOLIR</option>
            </select>
          </div>
          
          <div class="search-box">
            <input type="text" id="search-input" placeholder="" />
            <button type="reset" id="search-btn"></button>
          </div>
        </div>
        <div class="tambah">
           <button type="button" class="buka">+ Tambah</button>
         </div>
          <div class="tabel">
            <div class="container-tabel">
              <p style="width: 1.2rem;">NO</p>
              |<P style="width: 4rem;">ID</P>
              |<P style="width: 6.5rem;">Nama</P>
              |<P style="width: 10rem;">ALAMAT</P>
              |<P style="width: 4rem;">SITE</P>
              |<P style="width: 8rem;">SN</P>
              |<P style="width: 4rem;">PAKET</P>
              |<P style="width: 4rem;">STATUS</P>
            </div>
        </div>
        <div class="data-pelanggan">
              <?php
              while($result = mysqli_fetch_assoc($sql)){
                ?>
                <div class="container-data-pelanggan">
              <p style="width: 1.2rem; "><?php echo ++$no?></p>
              |<a class="idPelanggan" style="width: 4rem; color:white;" href="customer.php?id=<?php echo $result['IDpelanggan']; ?>">
              <?php echo "CUS" . str_pad($result['IDpelanggan'], 3, "0", STR_PAD_LEFT);?></a>
              |<P class="nama" style="width: 6.5rem; "><?php echo $result['Name']?></P>
              |<P style="width: 10rem;"><?php echo $result['Alamat']?></P>
              |<P style="width: 4rem;"><?php echo $result['Site']?></P>
              |<P style="width: 8rem;"><?php echo $result['SN']?></P>
              |<P style="width: 4rem;"><?php echo $result['Paket']?></P>
              |<P style="width: 3.5rem;"><?php echo $result['Status']?></P>
              <br>
            </div>
            <?php
              };
              ?>
        </div>
      </div>
    </main>
        <section class="produk">
      <div class="produk-kontener">
        <i class="fa-solid fa-xmark close-x" style="color: gray;"></i>
        <div class="konten-produk">
          <div class="deskripsi-produk">
            <h2>TAMBAH DATA</h2>
            
            <form action="db/tambah.php" method="POST">
                  <div class="data-customer">
           <div class="datapelanggan">
             <p class="head">DATA PELANGGAN </p>
             <input type="hidden" name="IDpelanggan" id="IDpelanggan"  />
             <div class="detail-pelanggan">
               <div class="item1">Nama</div>
               <div class="item1">Jenis Kelamin</div>
               <div class="itm2"><input type="text" name="Nama" id="Nama" require="require" />
               </div>
               <div class="itm2"><input type="text" name="JenisKelamin" id="JenisKelamin" require="require" />
               </div>
               <div class="item1">No.Handphone</div>
               <div class="item1">E-Mail</div>
               <div class="itm2"><input type="text" name="Nohp" id="Nohp"  require="require"/>
               </div>
               <div class="itm2"><input type="text" name="Email" id="Email" require="require" />
               </div>
               <div class="item1">Tanggal Lahir</div>
               <div class="item1">Nomor Induk Kependudukan(NIK)</div>
               <div class="itm2"><input type="date" name="tanggallahir" id="tanggallahir" require="require" />
               </div>
               <div class="itm2"><input type="text" name="NIK" id="NIK"  require="require"/>
               </div>
           </div>
            <div class="dataKTP">
             <p class="head">ALAMAT SESUAI KTP</p>
              <div class="itm1">
              <div class="item1">ALAMAT</div>
              <div class="item2"><input type="text" name="alamat" id="alamat" require="require" /></div>
            </div>
             <div class="detail-alamat">
               <div class="item3">KELURAHAN</div>
               <div class="item3">KECAMATAN</div>
               <div class="itm2"><input type="text" name="kelurahan" id="kelurahan" require="require" />
               </div>
               <div class="itm2"><input type="text" name="kecamatan" id="kecamatan" require="require" />
               </div>
               <div class="item3">KOTA</div>
               <div class="item3">PROVINSI</div>
               <div class="itm2"><input type="text" name="kota" id="kota" require="require" />
               </div>
               <div class="itm2"><input type="text" name="provinsi" id="provinsi" require="require" />
               </div>
           </div>
           <p class="head">DATA LAINNYA</p>
           <div class="detail-alamat">
             <div class="item3">TANGGAL REGISTRASI</div>
             <div class="item3">SITE</div>
             <div class="itm2"><input type="date" name="tanggalregist" id="tanggalregist"  require="require"/>
            </div>
               <div class="itm2"><input type="text" name="site" id="site" require="require" />
               </div>
               <div class="item3">SN</div>
               <div class="item3">PAKET</div>
               <div class="itm2"><input type="text" name="SN" id="SN" require="require" />
               </div>
               <div class="itm2"><input type="text" name="paket" id="paket" require="require" />
              </div>
            </div>
            <button type='submit' name="tambah"class="tambah">TAMBAHKAN DATA</button>
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
