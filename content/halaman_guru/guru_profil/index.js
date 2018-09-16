function FormAwal(){
    $('#panel-content').load('content/halaman_guru/guru_profil/index.php');
}
function FormUpdateData(){
      $('#panel-content').load('content/halaman_guru/guru_profil/form_data_profile.php');
}

function FormUpdatePassword(){
    $('#panel-content').load('content/halaman_guru/guru_profil/form_data_password.php');
}

function getDataSekolah(value){
    var sekolah_dll = document.getElementById('nama_sekolah_dll');
    var input = document.createElement('input');
    input.id = "nama_sekolah_lainnya";
    input.name = "nama_sekolah_lainnya";
    if(value=="dll"){
        sekolah_dll.append(input);
        $('#nama_sekolah_lainnya').attr({'class':'form-control','placeholder':'Masukan Nama Sekolah'});
        $('#nama_sekolah_lainnya').css({'margin-top':'10px'});
    }else{
        var data = {
            id_sekolah : value
        }
        $.ajax({
            url : 'content/master/master_data_sekolah.php',
            cache : false,
            data : data,
            dataType : 'json',
            type : 'post',
            success : function(res){
                //alert(JSON.stringify(res));
                $('#alamat_sekolah').val(res.alamat_sekolah);
                $('#no_telepon_sekolah').val(res.no_telepon_sekolah);
            }
        });
        $('#nama_sekolah_lainnya').remove();
    }
}

function ProsesUpdateDataProfile(){
    var formData = $('#form1').serialize();
    $.ajax({
        url : 'content/__proses/simpan_data_profile_guru.php',
        type : 'post',
        cahce : false,
        data : formData,
        dataType : 'json',
        beforeSend : function(){
            $("#loading").show();
            $("#loading").html('<img src="images/loading.gif" width=50 height=50>');
        },
        success : function(result){
            var isValid = result.isValid;
            var pesan = result.isPesan;
            if(isValid==1){
                $("#loading").html('<font color="green" size="4"><b>'+pesan+'</b></font>');
                setTimeout(function(){
                    FormAwal();
                },1000);
                return;
            }else{
                $("#loading").html('<font color="red" size="4"><b>'+pesan+'</b></font>');
                return;
            }
        }
    });
}

function CekPassword(){
    var new_password_1 = $('#new_password_1').val();
    var new_password_2 = $('#new_password_2').val();
    if(new_password_1=="" || new_password_2==""){
        $('#cekpassword').html("<font color='red'><span class='fa fa-exclamation-circle'></span></font>");
    }else if(new_password_1 == new_password_2){
        $('#cekpassword').html("<font color='green'><span class='fa fa-check-circle'></span></font>");
    }else{
        $('#cekpassword').html("<font color='red'><span class='fa fa-exclamation-circle'></span></font>");
    }
}

function ProsesUpdatePassword(){
    var new_password_1 = $('#new_password_1').val();
    var new_password_2 = $('#new_password_2').val();
    if(new_password_1=="" || new_password_2==""){
        alert('Wrong Password !!!');
        return;
    }else if(new_password_1 == new_password_2){
        var formData = $('#form1').serialize();
        $.ajax({
            url : 'content/__proses/simpan_data_password.php',
            type : 'post',
            cahce : false,
            data : formData,
            dataType : 'json',
            beforeSend : function(){
                $("#loading").show();
                $("#loading").html('<img src="images/loading.gif" width=50 height=50>');
            },
            success : function(result){
                var isValid = result.isValid;
                var pesan = result.isPesan;
                if(isValid==1){
                    $("#loading").html('<font color="green" size="4"><b>'+pesan+'</b></font>');
                    setTimeout(function(){
                        FormAwal();
                    },1000);
                    return;
                }else{
                    $("#loading").html('<font color="red" size="4"><b>'+pesan+'</b></font>');
                    return;
                }
            }
        });
    }else{
        alert('Wrong Password !!!');
        return;
    }
}
