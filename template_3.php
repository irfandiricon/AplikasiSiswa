<?php
include "koneksi_db/Koneksi.php";
$USER_ID = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$LEVEL = isset($_SESSION['level']) ? $_SESSION['level']:"";

if ($USER_ID && $LEVEL){
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
    <link rel="stylesheet" type="text/css" href="easyUi/themes/bootstrap/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyUi/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="easyUi/easyui-texteditor/texteditor.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
</head>

<div id="menu_aplikasi">
    <?php
        include "menu_3.php";
    ?>
</div>
<div class="fix-header fix-sidebar" style="overflow:hidden">
    <div id="main-wrapper" >
        <?php
          include "head.php";
        ?>
        <div class="page-wrapper" >
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h5 class="text-primary" id="_title"></h5>
                </div>
            </div>
            <div class="panel panel-default panel-heading" id="panel-content" style="padding-left:10px;padding-right:10px;"></div>
            <footer class="footer">© 2018 All rights reserved</footer>
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
    <!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script> -->

    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function(){
            $('body').append("</bo"+"dy>");
            var height = parseInt($('#panel-content').height())-350;
            $('#panel-content').css({'background-color':'#fff'});
        });

        $('#panel-content').load('welcome.php');
    </script>

    <style>
        .panel{
            font-size : 14px;
        }

        .btn {
            font-size : 14px;
        }

        .card{
            margin : 0px !important;
        }

        table {
            color : black;
        }

        .table-striped tbody tr:nth-of-type(2n+1){
            background-color: rgba(62, 227, 11, 0.1);
        }
        input {
          overflow: visible;
        }

        .form-control{
          display: block;
          width: 100%;
          padding: .375rem .75rem;
          font-size: 12px;
          line-height: 1.5;
          color: #495057;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #ced4da;
          border-radius: .25rem;
          transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        textarea {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 12px;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .form{
          display: block;
          width: 100%;
          padding: .375rem .75rem;
          font-size: 12px;
          line-height: 1.5;
          color: #495057;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #ced4da;
          border-radius: .25rem;
          transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
</div>
</html>
<?php
}else{
    header("location: ./");
}
?>
