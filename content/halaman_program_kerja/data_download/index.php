<script src="content/halaman_program_kerja/data_download/index.js"></script>
<div class="card" style="overflow:scroll">
    <div class="card-body">
      <?php
      include "../../../koneksi_db/Koneksi.php";
      $table_download = TABLE_DOWNLOAD;
      $file_location = FILE_LOCATION;
      $lampiran = "path_file";
      $file = "CONCAT('<a href=file_upload/',".$lampiran.",' target=__blank>',' &nbsp;(Download) </a>') as path_file";
      $query = "SELECT id,nama_file,$file FROM $db.$table_download ";
      $ex_query = mysqli_query($con, $query);
      while($rows = mysqli_fetch_assoc($ex_query)){
          $id = $rows['id'];
          $nama_file= $rows['nama_file'];
          $path_file = $rows['path_file'];
          $data = json_encode(array("id" => $id, "nama" => $nama_file, "path_file" => $path_file));
      ?>
      <div class="panel panel-default" style="border-radius:0px !important;color:black;">
          <div class="panel-heading">
              <b><?php echo $nama_file;?></b>
          </div>
          <div class="panel-body">
              <b><?php echo $path_file;?></b>
          </div>
      </div>
      <hr width="100%">
      <?php
      }
      ?>
    </div>
</div>
