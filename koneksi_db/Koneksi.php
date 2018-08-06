<?php
if(!isset($_SESSION)){session_start();}
$rootPath=$_SERVER['DOCUMENT_ROOT'];
require_once ($rootPath."/AplikasiSiswa/".'__setting.php');

$aplikasi = NAMA_DIRECTORY;
$host=HOST;
$user=USERNAME;
$password=PASSWORD;
$db=DATABASE;

$con = mysqli_connect($host, $user, $password);
$database= mysqli_select_db($con, $db);

if(!$database){
    die("Koneksi Gagal : ". mysqli_connect_error());
}
