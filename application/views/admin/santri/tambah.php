<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('admin/santri/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Kode Santri</label>
  <div class="col-md-5">
    <input type="text" id=kode_santri name=kode_santri class="form-control"  placeholder="Kode Santri" value="<?php echo set_value('kode_santri') ?>" onkeyup="unameStatus(this.value)""  required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Santri</label>
  <div class="col-md-5">
    <input type="text" name=nama_santri class="form-control"  placeholder="Nama Santri" value="<?php echo set_value('nama_santri') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Foto</label>
  <div class="col-md-5">
    <input type="file" name=foto class="form-control" >
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" name=tempat_lahir class="form-control"  placeholder="Tampat Lahir" value="<?php echo set_value('tempat_lahir') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggall Lahir</label>
  <div class="col-md-5">
    <input type=date max="<?=date('Y-m-d')?>" name=tgl_lahir class="form-control"  placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir') ?>" required>
  </div>
  </div>

 <div class="form-group">
     <label class="col-md-2 control-label">Jenis Kelamin</label>
      <div class="col-md-5">
          <input type="radio" name="jenis_kelamin" value="Laki-laki" >Laki-laki
          <input type="radio" name="jenis_kelamin" value="Perempuan" > Perempuan
          </div>
     </div>

<div class="form-group">
  <label class="col-md-2 control-label">Pendidikan</label>
    <div class="col-md-5">
          <select name="pendidikan" class="form-control" ">
      <option value="TK">TK</option>
      <option value="SD">SD</option>
      <option value="SMP">SMP</option>
      <option value="SMA">SMA</option>
      <option value="Perguruan Tinggi">Perguruan Tinggi</option>
      <option value="Lainnya">Lainnya</option>
    </select>
          </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Tanggal Masuk</label>
  <div class="col-md-5">
    <input type="date" name=tanggal_masuk class="form-control"  placeholder="Tanggal masuk" value="<?php echo set_value('tanggal_masuk') ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
   <textarea name="alamat" class="form-control"  placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required></textarea>
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Asal Sekolah</label>
  <div class="col-md-5">
    <input type="text" name=asal_sekolah class="form-control"  placeholder="Asal Sekolah" value="<?php echo set_value('asal_sekolah') ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Nama Ayah</label>
  <div class="col-md-5">
    <input type="text" name=nama_ayah class="form-control"  placeholder="Nama ayah" value="<?php echo set_value('nama_ayah') ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Pekerjaan Ayah</label>
  <div class="col-md-5">
    <input type="text" name=pekerjaan_ayah class="form-control"  placeholder="Pekerjaan Ayah" value="<?php echo set_value('pekerjaan_ayah') ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Nama Ibu</label>
  <div class="col-md-5">
    <input type="text" name=nama_ibu class="form-control"  placeholder="Nama ibu" value="<?php echo set_value('nama_ibu') ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Pekerjaan Ibu</label>
  <div class="col-md-5">
    <input type="text" name=pekerjaan_ibu class="form-control"  placeholder="Pekerjaan Ibu" value="<?php echo set_value('pekerjaan_ibu') ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">No Hp</label>
  <div class="col-md-5">
    <input type="text" name=nohp class="form-control"  placeholder="No Hp" value="<?php echo set_value('nohp') ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Jumlah Hafalan</label>
  <div class="col-md-5">
    <input type="text" name=jumlah_hafalan class="form-control"  placeholder="Jumlah Hafalan" value="<?php echo set_value('jumlah_hafalan') ?>" >
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label">Username</label>
  <div class="col-md-5">
    <input type="text" id=username name=username class="form-control"  readonly="" placeholder="Username" value="<?php echo set_value('username') ?>" required>
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
   var kode_santri = $("#kode_santri").val();
    $("#username").val(kode_santri);
 
 } 
</script>

<?php echo form_close(); ?>