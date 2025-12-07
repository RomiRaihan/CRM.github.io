<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name ="crm_imoratech";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error){
    echo "koneksi gagal";
    die ("error");
}

mysqli_select_db($db, $database_name);
?>