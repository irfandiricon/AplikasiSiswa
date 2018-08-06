<?php
require_once '__setting.php';
$table_user = TABLE_USER;
$host = HOST;
$user = USERNAME;
$password = PASSWORD;
$db = DATABASE;

$con= mysqli_connect($host, $user, $password);
$connection = mysqli_select_db($con, $db);

$username = isset($_POST['username']) ? $_POST['username']:"";
$password = isset($_POST['password']) ? $_POST['password']:"";

$myusername=mysqli_real_escape_string($con, $username);
$mypassword= md5(mysqli_real_escape_string($con, $password));

$query="SELECT user_id, username, nama_lengkap, level, last_login FROM $db.$table_user
  WHERE username='$myusername' and password='$mypassword'";

$ex_query= mysqli_query($con, $query);
$rows= mysqli_num_rows($ex_query);

if ($rows == 0){
    $pesan = "Login Gagal. Pastikan Username dan Password Anda Benar !";
    $isValid = 0;
    $row=array('isValid' =>0,'rows' => $pesan);
}else{
    session_start();
    $data= mysqli_fetch_assoc($ex_query);
    $row['rows'] = $data;
    $isValid = 1;
    $row=array('isValid' =>1,'rows' => $data);
}

echo json_encode($row);
mysqli_close($con);
