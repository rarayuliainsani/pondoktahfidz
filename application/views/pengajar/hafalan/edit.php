<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('pengajar/hafalan/edit/'.$hafalan->idhafalan), ' class="form-horizontal"');
?>
<div class="form-group">
  <label  class="col-md-2 control-label">Nama Santri</label>
  <div class="col-md-5">
     <select name="idsantri" class="form-control">
   <?php foreach ($santri as $santri) {
    ?>

   }
     <option value="<?php echo $santri->kode_santri?>"
     <?php if($hafalan->idsantri==$santri->idsantri){
      echo "selected"; } ?>>
        <?php echo $santri->nama_santri ?>
      </option>
     
     <?php }
     ?>
   </select>
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
     <?php if($hafalan->idpengajar==$pengajar->idpengajar){
      echo "selected"; } ?>>
        <?php echo $pengajar->nama ?>
      </option>
     
     <?php }
     ?>
   </select>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Tanggal</label>
  <div class="col-md-5">
    <input type="text" name=tanggal class="form-control" value="<?php echo $hafalan->tanggal ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Dari Ayat</label>
  <div class="col-md-5">
    <input type="text" name=dari_ayat class="form-control"   value="<?php echo $hafalan->dari_ayat ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Dari Surat</label>
  <div class="col-md-5">
   <select name="dari_surat" class="form-control">
   <?php foreach ($surat as $surat) {
    ?>

   }
     <option value="<?php echo $surat->idsurat?>"
     <?php if($hafalan->dari_surat==$surat->idsurat){
      echo "selected"; } ?>>
        <?php echo $surat->nama_surat ?>
      </option>
     
     <?php }
     ?>
   </select>
  </div>
</div>


<div class="form-group">
  <label  class="col-md-2 control-label">Sampai Ayat</label>
  <div class="col-md-5">
    <input type="text" name=sampai_ayat class="form-control" value="<?php echo $hafalan->sampai_ayat ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Sampai Surat</label>
  <div class="col-md-5">
   <select name="sampai_surat" class="form-control">
   <?php foreach ($surat2 as $surat) {
    ?>

   }
     <option value="<?php echo $surat->idsurat?>"
     <?php if($hafalan->sampai_surat==$surat->idsurat){
      echo "selected"; } ?>>
        <?php echo $surat->nama_surat ?>
      </option>
     
     <?php }
     ?>
   </select>
  </div>
</div>

<!-- <div class="form-group">
  <label  class="col-md-2 control-label">Hafalan Terakhir</label>
  <div class="col-md-5">
    <input type="text" name=hafalan_terakhir class="form-control" value="<?php echo $hafalan->hafalan_terakhir ?>" required>
  </div>
</div> -->

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