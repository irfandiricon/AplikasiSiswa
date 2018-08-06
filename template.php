<?php
include "koneksi_db/Koneksi.php";
$USER_ID = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";

if ($USER_ID){
$nama_aplikasi = NAMA_APPLICATION;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/login.png">
    <title><?php echo $nama_aplikasi;?></title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/lib/dropzone/dropzone.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="easyUi/themes/metro-orange/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyUi/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="easyUi/easyui-texteditor/texteditor.css">
</head>

<div id="menu_aplikasi">
    <?php
        include "menu.php";
    ?>
</div>
<div class="fix-header fix-sidebar" style="overflow:hidden">
    <div id="main-wrapper" >
        <?php
          include "head.php";
        ?>
        <div class="page-wrapper" >
            <div class="panel panel-default panel-heading" id="panel-content" style="padding:10px;"></div>
        </div>
    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/dropzone/dropzone.js"></script>
    <script src="index.js"></script>
    <script type="text/javascript" src="easyUi/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="easyUi/datagrid.detailview.js"></script>
    <script type="text/javascript" src="easyUi/easyui-texteditor/jquery.texteditor.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script>
        $(function(){
            $('body').append("</bo"+"dy>");
            var height = parseInt($(window).innerHeight()-130);
            $('#panel-content').css({'height':height,'background-color':'#fff','font-size':'10px'});
        });

        $('#panel-content').load('welcome.php');
    </script>
    <style>
        input {
            font-size: 10px;
        }
        .datagrid-header .datagrid-cell span {
            color : black;
            font-weight: bold;
            font-size: 10px;
        }
        .datagrid-view{
            color : black;
        }
        .datagrid-toolbar{
            color : black;
            font-size : 10px;
            padding : 5px;
        }
        .datagrid-cell{
            font-size: 10px;
            color : black;
        }
        .l-btn-text {
            color : black;
            font-size: 10px;
        }
        .datagrid-cell-rownumber{
            color : black;
            font-size: 10px;
        }
        .pagination{
            color : black;
            font-size : 10px;
        }
        .pagination-info{
            color : black;
            font-size : 10px;
        }
        .datagrid-cell{
            color : black;
            font-size : 10px;
        }
    </style>
</div>
</html>
<?php
}else{
    header("location: ./");
}
?>
