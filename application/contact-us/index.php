<script src="home/index.js"></script>
<script src="contact-us/index.js"></script>
<div id="panel-content">
    <div class="panel panel-default" style="border-radius:0px !important;">
        <div class="panel-heading">
            Silahkan Lengkapi Data Berikut !!!
        </div>
        <div class="panel-body">
            <form method="post" id="form_1" name="form_1">
                <div class="row" id="columns">
                    <div class="col-md-3">Masukan Email Anda</div>
                    <div class="col-md-5">
                        <input required type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com">
                    </div>
                </div>
                <div class="row" id="columns">
                    <div class="col-md-3">Masukan No. Telp/HP Anda</div>
                    <div class="col-md-5">
                        <input required type="text" class="form-control" name="no_telp" id="no_telp" placeholder="08xxxxxxxxx">
                    </div>
                </div>
                <div class="row" id="columns">
                    <div class="col-md-3">Masukan Nama Anda</div>
                    <div class="col-md-5">
                        <input required type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="row" id="columns">
                    <div class="col-md-3">Masukan Subjek</div>
                    <div class="col-md-5">
                        <input required type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek">
                    </div>
                </div>
                <div class="row" id="columns">
                    <div class="col-md-3">Masukan Pesan</div>
                    <div class="col-md-5">
                        <textarea required type="text" class="form-control" name="pesan" id="pesan"
                            placeholder="Pesan Berita" rows="5"></textarea>
                    </div>
                </div>
                <div class="row" id="columns">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <button class="btn btn-primary" type="button" onclick="SimpanPesan()"><span class="glyphicon glyphicon-send"></span> &nbsp; Kirim Pesan</button> &nbsp;
                        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-trash" ></span> &nbsp; Batalkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    #columns{
        padding : 5px;
    }
</style>
