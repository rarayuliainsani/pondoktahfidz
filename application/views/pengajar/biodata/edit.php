<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('pengajar/biodata/edit/'.$pengajar->idpengajar), ' class="form-horizontal"');
?>


<div class="form-group">
  <label  class="col-md-2 control-label">NIP</label>
  <div class="col-md-5">
    <input type="text" name=nip class="form-control"  placeholder="NIP" value="<?php echo $pengajar->nip  ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama</label>
  <div class="col-md-5">
    <input type="text" name=nama class="form-control"  placeholder="Nama" value="<?php echo $pengajar->nama ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Edit Foto</label>
  <div class="col-md-5">
    <input type="file" name=foto class="form-control" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" name=tempat_lahir class="form-control"  placeholder="Tempat Lahir" value="<?php echo $pengajar->tempat_lahir ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggall Lahir</label>
  <div class="col-md-5">
    <input type=date max="<?=date('Y-m-d')?>" name=tgl_lahir class="form-control"  placeholder="Tanggal Lahir" value="<?php echo $pengajar->tgl_lahir ?>" >
  </div>
  </div>

  <div class="form-group">
     <label class="col-md-2 control-label">Jenis Kelamin</label>
      <div class="col-md-5">
          <input type="radio" name="jk" value="Laki-laki" <?php if($pengajar->jk=="Laki-laki") {echo "checked";} ?>>Laki-laki
          <input type="radio" name="jk" value="Perempuan" <?php if($pengajar->jk=="Perempuan") {echo "checked";} ?>> Perempuan
          </div>
     </div>



 <div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
   <input type="text" name="alamat" class="form-control"  placeholder="Alamat" value="<?php echo $pengajar->alamat  ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Jumlah Hafalan</label>
  <div class="col-md-5">
    <input type="text" name=jml_hafalan class="form-control"  placeholder="Jumlah Hafalan" value="<?php echo $pengajar->jml_hafalan ?>" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alumni</label>
  <div class="col-md-5">
   <input type="text" name="alumni" class="form-control"  placeholder="Alumni" value="<?php echo $pengajar->alumni ?>" >
  </div>
</div>


 <div class="form-group">
  <label class="col-md-2 control-label">Nama Orang tua</label>
  <div class="col-md-5">
    <input type="text" name=nama_ortu class="form-control"  placeholder="Nama Orang Tua" value="<?php echo $pengajar->nama_ortu ?>" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alamat Orang Tua</label>
  <div class="col-md-5">
   <input type="text"  name="alamat_ortu" class="form-control"  placeholder="Alamat" value="<?php echo $pengajar->alamat_ortu ?>" >
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">No Hp</label>
  <div class="col-md-5">
    <input type="text" name=nohp class="form-control"  placeholder="No Hp" value="<?php echo $pengajar->nohp ?>" required>
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