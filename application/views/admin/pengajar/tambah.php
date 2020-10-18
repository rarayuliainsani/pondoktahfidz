<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('admin/pengajar/tambah'), ' class="form-horizontal"');
?>


<div class="form-group">
  <label  class="col-md-2 control-label">NIP</label>
  <div class="col-md-5">
    <input type="text" id=nip name=nip class="form-control"  placeholder="NIP" value="<?php echo set_value('nip') ?>" onkeyup="unameStatus(this.value)"required>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-2 control-label">Nama Pengajar</label>
  <div class="col-md-5">
    <input type="text" name=nama class="form-control"  placeholder="Nama Pengajar" value="<?php echo set_value('nama') ?>" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label">Upload Foto</label>
  <div class="col-md-5">
    <input type="file" name=foto class="form-control" >
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" name=tempat_lahir class="form-control"  placeholder="Tampat Lahir" value="<?php echo set_value('tempat_lahir') ?>" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggall Lahir</label>
  <div class="col-md-5">
    <input type=date name=tgl_lahir class="form-control"  placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir') ?>" >
  </div>
  </div>

 <div class="form-group">
     <label class="col-md-2 control-label">Jenis Kelamin</label>
      <div class="col-md-5">
          <input type="radio" name="jk" value="Laki-laki" >Laki-laki
          <input type="radio" name="jk" value="Perempuan" > Perempuan
          </div>
     </div>

 <div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
   <textarea name="alamat" class="form-control"  placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required></textarea>
  </div>
</div>


 <div class="form-group">
  <label class="col-md-2 control-label">Jumlah Hafalan</label>
  <div class="col-md-5">
    <input type="text" name=jml_hafalan class="form-control"  placeholder="Jumlah Hafalan" value="<?php echo set_value('jml_hafalan') ?>" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alumni</label>
  <div class="col-md-5">
   <input type="text" name="alumni" class="form-control"  placeholder="Alumni" value="<?php echo set_value('alumni') ?>" >
  </div>
</div>


 <div class="form-group">
  <label class="col-md-2 control-label">Nama Orang tua</label>
  <div class="col-md-5">
    <input type="text" name=nama_ortu class="form-control"  placeholder="Nama Orang Tua" value="<?php echo set_value('nama_ortu') ?>" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alamat Orang Tua</label>
  <div class="col-md-5">
   <textarea name="alamat_ortu" class="form-control"  placeholder="Alamat" value="<?php echo set_value('alamat_ortu') ?>" ></textarea>
  </div>
</div>


 <div class="form-group">
  <label class="col-md-2 control-label">No Hp</label>
  <div class="col-md-5">
    <input type="text" name=nohp class="form-control"  placeholder="No Hp" value="<?php echo set_value('nohp') ?>" >
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" id=username name=username class="form-control"  placeholder="Username" value="<?php echo set_value('username') ?>" required>
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" name=password class="form-control"  placeholder="Password" value="<?php echo set_value('password') ?>" required>
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

<script>
 function unameStatus(value) {
  console.log(value);
   var nip = $("#nip").val();
    $("#username").val(nip);
 
 } 
</script>

<?php echo form_close(); ?>