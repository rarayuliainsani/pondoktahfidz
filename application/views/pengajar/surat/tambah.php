<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('pengajar/surat/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Surat</label>
  <div class="col-md-5">
    <input type="text" name=nama_surat class="form-control"  placeholder="Nama Surat" value="<?php echo set_value('nama_surat') ?>" required>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-2 control-label">Jumlah Ayat</label>
  <div class="col-md-5">
     <input type="text" name=jumlah_ayat class="form-control"  placeholder="Jumlah Ayat" value="<?php echo set_value('jumlah_ayat') ?>" required>
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