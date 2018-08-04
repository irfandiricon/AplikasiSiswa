<?php
session_start();
$USER_ID=isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
if ($USER_ID){
    include "template.php";
}else{
    echo "<script>window.location.href='login/';</script>";
}
