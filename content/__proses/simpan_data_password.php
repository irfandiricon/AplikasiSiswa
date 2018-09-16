<?php
//die(json_encode($_POST));
include "../../koneksi_db/Koneksi.php";
$table_user = TABLE_USER;
$old_password = isset($_POST['old_password']) ? $_POST['old_password']:"";
$new_password_1 = isset($_POST['new_password_1']) ? $_POST['new_password_1']:"";
$new_password_2 = isset($_POST['new_password_2']) ? $_POST['new_password_2']:"";
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$md5_password_2 = md5($new_password_2);
$json = array("isValid" => 0, "isPesan" => array());

if($old_password=="" || $new_password_1=="" || $new_password_2==""){
    $isValid = 0;
    $isPesan = "Wrong Password !!!";
}elseif($new_password_1 != $new_password_2){
    $isValid = 0;
    $isPesan = "Wrong Password !!!";
}else if($new_password_1 == $new_password_2){
    $q = "SELECT password FROM $db.$table_user where user_id = '$user_id'";
    $ex_q = mysqli_query($con, $q);
    $r = mysqli_fetch_assoc($ex_q);
    $password = $r['password'];
    if($password != md5($old_password)){
        $isValid = 0;
        $isPesan = "Wrong Password !!!";
    }else{
        $q2 = "UPDATE $db.$table_user set password='$md5_password_2' where user_id='$user_id'";
        $ex_q2 = mysqli_query($con, $q2);
        if(!$ex_q2){
            $isValid = 0;
            $isPesan = "Data gagal diperbaharui, Error : ".mysqli_error($con);
        }else{
            $isValid = 1;
            $isPesan = "Data berhasil tersimpan !!!";
        }
    }
}

$json = array("isValid" => $isValid, "isPesan" => $isPesan);
echo json_encode($json);
mysqli_close($con);
?>
