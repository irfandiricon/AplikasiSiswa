<script src="content/halaman_guru/guru_profil/index.js"></script>
<?php include "master_data_profile.php";?>
<div class="card" style="overflow:scroll">
    <div class="card-body">
        <form id="form1" name="form1" method="post">
            <div class="row">
                <div class="col-md-6">
                    <font size="4">Update Password</font>
                    <hr width="100%">
                    <div class="row">
                        <div class="col-md-5">Old Password</div>
                        <div class="col-md-7">
                            <input class="form-control" required type="password" id="old_password" name="old_password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">New Password</div>
                        <div class="col-md-7">
                            <input class="form-control" required type="password" id="new_password_1" name="new_password_1" onchange="CekPassword()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Confirm Password &nbsp; <span id="cekpassword"></span></div>
                        <div class="col-md-7">
                            <input class="form-control" required type="password" width="80%" id="new_password_2" name="new_password_2" onchange="CekPassword()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                          <button class="btn btn-danger" type="button" onclick="FormAwal()">
                              <span class="fa fa-backward"></span> Batal
                          </button>&nbsp;
                            <button class="btn btn-info" type="button" onclick="ProsesUpdatePassword()">
                                <span class="fa fa-save"></span> Simpan Data
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                            <div id="loading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .row{
        padding:10px;
    }
</style>
