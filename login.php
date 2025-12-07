<?php
include "db/database.php";
session_start();
$failed= false;
$success=false;
if(isset($_SESSION['is_login'])){
  header("location: beranda.php");
}


if(isset($_POST['login'])){
   $username= $_POST['username'];
   $password= $_POST['password'];
  
   $sql = "SELECT * FROM login where user='$username' AND password='$password'";
   $result = $db->query($sql);
   if($result->num_rows > 0){
    $data = $result->fetch_assoc();
    $_SESSION["username"] = 
    $data["user"];
    
    $_SESSION["is_login"] = true;
    $success=true;
   }else{
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
    <link rel="stylesheet" type="text/css" href="login.css" />
    <link rel="stylesheet" href="icon/css/all.css" />
  </head>
  <body>
    <main>
      <section class="login-pageactive">
        <div class="login">
          <span class="borderline"></span>
          <span class="borderliner"></span>
          <form action='login.php' method='POST' class="container-login">
            <h1>LOGIN</h1>
            <div class="inputbox">
              <input type="text" name="username" id="username" required="required" />
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
                id="password"
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
            <button type="submit" name="login" class="btn-login">LOGIN</button>
            <a href="regist.php">
              <p>
                REGISTRASI
              </p>
            </a>
          </form>

        </div>
      </section>
      <div class="card success<?= $success ? 'success.active' : '' ?>"style="border: 5px solid green; top:25%; height: 320px; padding: 0.5rem 2rem 1rem;">
        <div class="icon"style="color: green; font-size: 4rem; font-weight: bold; margin-bottom: 0;">✔</div>
        <div class="title"style="color: green; font-size: 3rem; font-weight: bold;  margin-top: 0;">Success</div>
        <div class="message">
          <h1 style="color: green; font-weight: bold;">Login Berhasil</h1>
          <p style="color: green; font-weight: bold; margin-top:1rem;">Selamat datang kembali <?=$_SESSION['username']?></p>
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
          <h1 style="color: red; font-weight: bold;">User dan Password tidak di temukan</h1>
          <p style="color: red; font-weight: bold;">masukan Username dan password yang benar</p>
        </div>
        <button type="submit" class="btn-error" onclick="window.location='login.php'" tabindex="0" style="color: white; font-weight: bold;
         margin-top:1rem;
         padding: 0.5rem; background-color: red;
         border-radius: 0.5rem; cursor: pointer;" >
TRY AGAIN
</button>

      </div>
    </main>
    <script src="js/login.js"></script>
  </body>
</html>
