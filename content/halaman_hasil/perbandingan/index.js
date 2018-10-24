function GetTable1(){
    $.ajax({
        url : 'content/halaman_hasil/perbandingan/get_table_bimbingan_klasikal.php',
        cache : false,
        type : 'post',
        success : function(table){
            $('#DataTable').html(table);
        }
    });
}

function GetTable2(){
    $.ajax({
        url : 'content/halaman_hasil/perbandingan/get_table_bimbingan_kelompok.php',
        cache : false,
        type : 'post',
        success : function(table){
            $('#DataTable').html(table);
        }
    });
}

function GetTable3(){
    $.ajax({
        url : 'content/halaman_hasil/perbandingan/get_table_konseling_kelompok.php',
        cache : false,
        type : 'post',
        success : function(table){
            $('#DataTable').html(table);
        }
    });
}

function GetTable4(){
    $.ajax({
        url : 'content/halaman_hasil/perbandingan/get_table_konseling_individu.php',
        cache : false,
        type : 'post',
        success : function(table){
            $('#DataTable').html(table);
        }
    });
}
