<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('pengajar/pertemuan/edit/'.$pertemuan->idpertemuan), ' class="form-horizontal"');
?>


<div class="form-group">
  <label  class="col-md-2 control-label">Pertemuan Ke</label>
  <div class="col-md-5">
    <input type="text" name=pertemuanke class="form-control" value="<?php echo $pertemuan->pertemuanke ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Tempat</label>
  <div class="col-md-5">
    <input type="text" name=tempat class="form-control"   value="<?php echo $pertemuan->tempat ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Tanggal</label>
  <div class="col-md-5">
    <input type="date" name=tanggal class="form-control"  placeholder="Tanggal" value="<?php echo $pertemuan->tanggal ?>" required>
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