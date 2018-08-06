<?php
session_start();
$user_id = isset($_POST['user_id']) ? $_POST['user_id']:"";
$username = isset($_POST['username']) ? $_POST['username']:"";
$nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap']:"";
$level = isset($_POST['level']) ? $_POST['level']:"";
$last_login = isset($_POST['last_login']) ? $_POST['last_login']:"";

$_SESSION['user_id'] = $user_id;
$_SESSION['username'] = $username;
$_SESSION['nama_lengkap'] = $nama_lengkap;
$_SESSION['level'] = $level;
$_SESSION['last_login'] = $last_login;

echo json_encode($_POST);
?>
