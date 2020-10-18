<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('pengajar/absensi/edit/'.$absensi->idabsensi), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Pertemuan Ke</label>
  <div class="col-md-5">
     <select name="idpertemuan" class="form-control">
   <?php foreach ($pertemuan as $pertemuan) {
    ?>

   }
     <option value="<?php echo $pertemuan->idpertemuan?>"
     <?php if($absensi->idpertemuan==$pertemuan->idpertemuan){
      echo "selected"; } ?>>
        <?php echo $pertemuan->pertemuanke ?>
      </option>
     
     <?php }
     ?>
   </select>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Tanggal</label>
  <div class="col-md-5">
    <input id="tanggal" type="text" name=tanggal class="form-control" readonly="" value="<?php echo $absensi->tanggal  ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Pengajar</label>
  <div class="col-md-5">
     <select name="idpengajar" class="form-control">
   <?php foreach ($pengajar as $pengajar) {
    ?>

   }
     <option value="<?php echo $pengajar->idpengajar?>"
     <?php if($absensi->idpengajar==$pengajar->idpengajar){
      echo "selected"; } ?>>
        <?php echo $pengajar->nama ?>
      </option>
     
     <?php }
     ?>
   </select>
  </div>
</div>


<div class="form-group">
  <label  class="col-md-2 control-label">Nama Santri</label>
  <div class="col-md-5">
     <select name="idsantri" class="form-control">
   <?php foreach ($santri as $santri) {
    ?>

   }
     <option value="<?php echo $santri->idsantri?>"
     <?php if($absensi->idsantri==$santri->idsantri){
      echo "selected"; } ?>>
        <?php echo $santri->nama_santri ?>
      </option>
     
     <?php }
     ?>
   </select>
  </div>
</div>


<div class="form-group">
     <label class="col-md-2 control-label">Keterangan</label>
      <div class="col-md-5">
          <input type="radio" name="keterangan" value="Hadir" <?php if($absensi->keterangan=="Hadir") {echo "checked";} ?> >Hadir
          <input type="radio" name="keterangan" value="Sakit" <?php if($absensi->keterangan=="Sakit") {echo "checked";} ?> >Sakit
          <input type="radio" name="keterangan" value="Izin" <?php if($absensi->keterangan=="Izin") {echo "checked";} ?>>Izin
          <input type="radio" name="keterangan" value="Alfa" <?php if($absensi->keterangan=="Alfa") {echo "checked";} ?>>Alfa
          </div>
     </div>


<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
   <button class="btn btn-success btn-lg" name="submit" type="submit">
      <i class="fa fa-save"></i>Simpan
   </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
      <i class="fa fa-times"></i>Reset
   </button>
  </div>
</div>

<?php echo form_close(); ?>