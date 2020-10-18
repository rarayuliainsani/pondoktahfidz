<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/user/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Pengguna</label>
  <div class="col-md-5">
    <input type="text" name=nama class="form-control"  placeholder="Nama Pengguna" value="<?php echo set_value('nama') ?>" required>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" name=username class="form-control"  placeholder="Username" value="<?php echo set_value('username') ?>" required>
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" name=password class="form-control"  placeholder="password" value="<?php echo set_value('password') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Level</label>
  <div class="col-md-5">
    <select name="level" class="form-control">
    	<option value="Admin">Admin</option>
    	<option value="Santri">Santri</option>
    	<option value="Pengajar">Pengajar</option>
    	<option value="Bendahara">Bendahara</option>
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