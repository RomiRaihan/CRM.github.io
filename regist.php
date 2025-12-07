<?php
include "db/database.php";
session_start();
$failed= false;
$success=false;

if(isset($_POST['regist'])){
   $nama= $_POST['nama'];
   $email= $_POST['email'];
   $nohp= $_POST['nohp'];
   $username= $_POST['username'];
   $password= $_POST['password'];

   try {

       $sql = "INSERT INTO login (NamaLengkap, EMail, NoHP, user, password) 
        VALUES ('$nama', '$email','$nohp','$username', '$password')";
if($db->query($sql)) {
    $success=true;
}else {
}}catch(mysqli_sql_exception){
    $failed=true;
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IMORA TECH</title>
    <link rel="icon" type="image/png" href="/gambar/tittle.png" />
    <link rel="stylesheet" type="text/css" href="regist.css" />
    <link rel="stylesheet" href="icon/css/all.css" />
  </head>
  <body>
    <main>
      <section class="login-pageactive">
        <div class="login">
          <span class="borderline"></span>
          <span class="borderliner"></span>
          <form action='regist.php' method='POST' class="container-login">
            <h1>REGISTRASI</h1>
            <div class="inputbox">
              <input type="text" name="nama"  required="required" />
              <span>Nama Lengkap</span>
              <div class="icon">
                <i class="fa-regular fa-user" style="color: white"></i>
              </div>
              <i></i>
            </div>
            <div class="inputbox">
              <input type="email" name="email"  required="required" />
              <span>E-mail</span>
              <div class="icon">
                <i class="fa-regular fa-user" style="color: white"></i>
              </div>
              <i></i>
            </div>
            <div class="inputbox">
              <input type="tel" name="nohp"  required="required" />
              <span>No HP</span>
              <div class="icon">
                <i class="fa-regular fa-user" style="color: white"></i>
              </div>
              <i></i>
            </div>
            <div class="inputbox">
              <input type="text" name="username"  required="required" />
              <span>Username</span>
              <div class="icon">
                <i class="fa-regular fa-user" style="color: white"></i>
              </div>
              <i></i>
            </div>
            <div class="inputbox">
              <input
                type="password"
                name="password"
      
                required="required"
              />
              <span>Password</span>
              <button type="button" class="toggle-password">
                <i class="fa-regular fa-eye" style="color: white"></i>
                <i class="fa-regular fa-eye-slash" style="color: white"></i>
              </button>
            </div>
            <div class="btn">
              
            </div>
            <button type="submit" name="regist" class="btn-login">REGISTRASI</button>
            <a href="login.php">
              <p>
                LOGIN
              </p>
            </a>
        </form>

        </div>
      </section>
         <div class="card success<?= $success ? 'success.active' : '' ?>"style="border: 5px solid green; top:25%; height: 320px; padding: 0.5rem 2rem 1rem;">
        <div class="icon"style="color: green; font-size: 4rem; font-weight: bold; margin-bottom: 0;">✔</div>
        <div class="title"style="color: green; font-size: 3rem; font-weight: bold;  margin-top: 0;">Success</div>
        <div class="message">
          <h1 style="color: green; font-weight: bold;">Registrasi Berhasil</h1>
          <p style="color: green; font-weight: bold; margin-top:1rem;">Lanjut Login</p>
        </div>
        <button type="submit" class="btn-login" onclick="window.location='beranda.php'" tabindex="0" style="color: white; 
        font-weight: bold; padding: 0.5rem; background-color: green;
         border-radius: 0.5rem; cursor: pointer; margin-top:1rem;">
CONTINUE
</button>
      </div>
      <div name="failed"class="card error<?= $failed ? 'error.active' : '' ?>" style="border: 5px solid red; height:320px; padding: 0.5rem 2rem 1rem; top:25%;">
        <div class="icon" style="color: red; font-size: 3rem; font-weight: bold; margin-bottom: 0;">✖</div>
        <div class="title" style="color: red; font-size: 3rem; font-weight: bold;  margin-top: 0;">Error</div>
        <div class="message">
          <h1 style="color: red; font-weight: bold;">User dan Password sudah terdaftar</h1>
          <p style="color: red; font-weight: bold;">masukan Username dan password yang baru</p>
        </div>
        <button type="submit" class="btn-error" onclick="window.location='regist.php'" tabindex="0" style="color: white; font-weight: bold;
         margin-top:1rem;
         padding: 0.5rem; background-color: red;
         border-radius: 0.5rem; cursor: pointer;" >
TRY AGAIN
</button>

      </div>
    </main>
    <script src="js/regist.js"></script>
  </body>
</html>

