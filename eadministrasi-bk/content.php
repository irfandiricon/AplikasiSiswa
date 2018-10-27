<?php
if($hal==""){
    include "home/index.php";
}elseif($hal=="home"){
    include "home/index.php";
}elseif($hal=="tentang-kami"){
    include "about-us/index.php";
}elseif($hal=="cara-pendaftaran"){
    include "support/index.php";
}elseif($hal=="hubungi-kami"){
    include "contact-us/index.php";
}
?>
