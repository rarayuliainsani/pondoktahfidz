<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/kelompok/edit/'.$kelompok->idkelompok), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Kode Kelompok</label>
  <div class="col-md-5">
    <input type="text" name=kdkelompok class="form-control" value="<?php echo $kelompok->kdkelompok ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Kelompok</label>
  <div class="col-md-5">
    <input type="text" name=namakelompok class="form-control" value="<?php echo $kelompok->namakelompok ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Kategori Kelompok</label>
  <div class="col-md-5">
    <select name="kategori_kelompok" class="form-control">
      <option value="Tahfidz">Tahfidz</option>
      <option value="Tahsin" <?php if($kelompok->kategori_kelompok=="Tahsin") {echo "selected";} ?>>Tahsin</option>}
     
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
     <?php if($kelompok->idpengajar==$pengajar->idpengajar){
      echo "selected"; } ?>>
        <?php echo $pengajar->nama ?>
      </option>
     
     <?php }
     ?>
   </select>
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