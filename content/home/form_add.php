<?php
$id = isset($_POST['id']) ? $_POST['id']:"";
$judul = isset($_POST['judul']) ? $_POST['judul']:"";
$isi = isset($_POST['isi']) ? $_POST['isi']:"";
?>
<form method="post" action="javascript:void(0)" name="form_1" id="form_1">
    <div class="panel panel-default panel-heading">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="180">Judul Berita</td>
                            <td>
                                <input type="hidden" name="id" id="id">
                                <input required placeholder="Masukan Judul Berita" class="form-control" name="judul" id="judul">
                            </td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>Isi Berita</td>
                            <td>
                                <div id="isi" name="isi" style="width:'100%';"></div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="left">
                                <button class="btn btn-info" name="simpan" id="simpan" type="button" onclick="ProsesSimpanData()">
                                    Simpan Data
                                </button>&nbsp;
                                <button class="btn btn-danger" name="simpan" id="simpan" type="reset" onclick="FormAwal()">
                                    Batal
                                </button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

<script>
    $(function(){
        $('#isi').texteditor({
            height : 300,
            id : 'isi'
        });
    });

    $(function(){
        var id = '<?php echo $id?>';
        var judul = '<?php echo $judul?>';
        var isi = '<?php echo $isi?>';
        var data = {
            id : id,
            judul : judul,
            isi : isi
        }
        $('#form_1').form('load',data);
        $('#isi').texteditor('setValue',isi);
    });


</script>
