<script src="content/halaman_siswa/siswa_profil/index.js"></script>
<?php include "master_data_profile.php";?>
<div class="card" style="overflow:scroll">
    <div class="card-body">
    <form id="form1" name="form1" method="post">
        <div class="row">
            <div class="col-md-6">
                <font size="4">Data Diri</font>
                <hr width="100%">
                <div class="table-responsive">
                <table class="table" style="color:black">
                    <tbody>
                        <tr>
                            <td width="150">Username</td>
                            <td>
                                <input readonly name="user_id_siswa" value="<?php echo $user_id;?>" type="hidden">
                                <input readonly name="user_id_login" value="<?php echo $user_id_login;?>" type="hidden">
                                <input readonly name="username" value="<?php echo $username;?>" class="form-control">
                            </td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td><input name="nis" value="<?php echo $nis;?>" class="form-control"></td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><input name="nama_lengkap" value="<?php echo $nama_lengkap;?>" class="form-control"></td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><input name="tempat_lahir" value="<?php echo $tempat_lahir;?>" class="form-control"></td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>
                                <input name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $tgl_lahir;?>">
                            </td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih Data</option>
                                    <?php
                                    $jk = array("Laki-Laki","Perempuan");
                                    $jk_id = array("L","P");
                                    $jumlah = count($jk);
                                    for($i=0;$i<$jumlah;$i++){
                                        $id = $jk_id[$i];
                                        $name = $jk[$i];
                                    ?>
                                        <option value="<?php echo $id;?>" <?php if($jenis_kelamin==$id){echo "selected";}?>><?php echo $name?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><textarea name="alamat" id="alamat"><?php echo $alamat;?></textarea></td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input name="email" value="<?php echo $email;?>" type="email" class="form-control"></td>
                            <td width="5"></td>
                        </tr>
                        <tr>
                            <td>No. Telp / HP</td>
                            <td><input name="no_telp" value="<?php echo $no_telp;?>" class="form-control"></td>
                            <td width="5"></td>
                        </tr>
                    </trbody>
                </table>
                </div>
            </div>
            <div class="col-md-6">
                <font size="4">Data Sekolah</font>
                <hr width="100%">
                <div class="table table-responsive">
                    <table class="table" style="color:black">
                        <tbody>
                          <tr>
                              <td>Kelas</td>
                              <td>
                                  <select class="form-control" id="kelas" name="kelas">
                                      <option value="">Pilih Data</option>
                                      <?php
                                      $class = array("X","XI","XII");
                                      $class_id = array("10","11","12");
                                      $jumlah = count($class);
                                      for($i=0;$i<$jumlah;$i++){
                                          $id = $class_id[$i];
                                          $name = $class[$i];
                                      ?>
                                          <option value="<?php echo $id;?>" <?php if($kelas==$id){echo "selected";}?>><?php echo $name?></option>
                                      <?php
                                      }
                                      ?>
                                  </select>
                              </td>
                              <td width="5"></td>
                          </tr>
                            <tr>
                                <td width="150">Nama Sekolah</td>
                                <td>
                                    <select class="form-control" id="nama_sekolah" name="nama_sekolah" onchange="getDataSekolah(this.value)">
                                        <option value="">Pilih Data</option>
                                        <?php
                                        $q2 = "SELECT id, nama FROM $db.$table_sekolah where flag_aktif='Y' order by nama";
                                        $ex_q2 = mysqli_query($con, $q2);
                                        while($r2 = mysqli_fetch_assoc($ex_q2)){
                                            $id = $r2['id'];
                                            $nama = $r2['nama'];
                                        ?>
                                            <option value="<?php echo $id;?>" <?php if($id_sekolah==$id){echo "selected";}?>>
                                                <?php echo $nama?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                        <option value="dll">Lainnya</option>
                                    </select>
                                    <span id="nama_sekolah_dll"></span>
                                </td>
                                <td width="5"></td>
                            </tr>
                            <tr>
                                <td>Alamat Sekolah</td>
                                <td>
                                    <textarea name="alamat_sekolah" id="alamat_sekolah"><?php echo $alamat_sekolah;?></textarea>
                                </td>
                                <td width="5"></td>
                            </tr>
                            <tr>
                                <td>No. Telepon Sekolah</td>
                                <td><input name="no_telepon_sekolah" value="<?php echo $no_telepon_sekolah;?>" class="form-control"></td>
                                <td width="5"></td>
                            </tr>
                        </trbody>
                    </table>
                </div>
            </div>
        </div>
        <hr width="100%">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-info btn-lg" type="button" onclick="ProsesUpdateDataProfile()">
                    <span class="fa fa-save"></span> Simpan Data
                </button>
                &nbsp;&nbsp;
                <span id="loading"></span>
            </div>
        </div>
    </form>
    </div>
</div>

<script>
    $(function(){
          $('#tanggal_lahir').datetimepicker({
              defaultDate: new Date(),
              format:'DD/MM/YYYY'
          });
    });
</script>
