<?php
session_start();
$USER_ID = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$FLAG_AKTIF = isset($_SESSION['flag_aktif']) ? $_SESSION['flag_aktif']:"";
$LEVEL = isset($_SESSION['level']) ? $_SESSION['level']:"";
if ($USER_ID && $FLAG_AKTIF=="Y"){
    if($LEVEL == "1"){
        include "template.php";
    }else{
        include "template_user.php";
    }
}else{
    echo "<script>window.location.href='login/';</script>";
}
