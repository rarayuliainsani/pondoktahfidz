<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/pendaftaran/edit/'.$pendaftaran->idpendaftaran), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Calon Santri</label>
  <div class="col-md-2">
    <input type="text" name=nama_santri class="form-control"  placeholder="Nama Santri" value="<?php echo $pendaftaran->nama_santri ?>" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" name=tempat_lahir class="form-control"  placeholder="Tampat Lahir" value="<?php echo $pendaftaran->tempat_lahir ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggall Lahir</label>
  <div class="col-md-5">
    <input type=date max="<?=date('Y-m-d')?>" name=tgl_lahir class="form-control"  placeholder="Tanggal Lahir" value="<?php echo $pendaftaran->tgl_daftar ?>" required>
  </div>
  </div>

 <div class="form-group">
     <label class="col-md-2 control-label">Jenis Kelamin</label>
      <div class="col-md-5">
          <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($pendaftaran->jenis_kelamin=="Laki-laki") {echo "checked";} ?>  >Laki-laki
          <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($pendaftaran->jenis_kelamin=="Perempuan") {echo "checked";} ?> > Perempuan
          </div>
     </div>

 <div class="form-group">
  <label class="col-md-2 control-label">Nama Ayah</label>
  <div class="col-md-5">
    <input type="text" name=nama_ayah class="form-control"  placeholder="Nama ayah" value="<?php echo $pendaftaran->nama_ayah ?>" required>
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Nama Ibu</label>
  <div class="col-md-5">
    <input type="text" name=nama_ibu class="form-control"  placeholder="Nama ibu" value="<?php echo $pendaftaran->nama_ibu ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Pendidikan</label>
  <div class="col-md-5">
   <select name="pendidikan" class="form-control" onchange="changePendidikan(this.value)">
      <option value="TK" >TK</option>
      <option value="SD" <?php if($pendaftaran->pendidikan=="SD") {echo "selected";} ?>>SD</option>
      <option value="SMP" <?php if($pendaftaran->pendidikan=="SMP") {echo "selected";} ?>>SMP</option>
      <option value="SMA" <?php if($pendaftaran->pendidikan=="SMA") {echo "selected";} ?>>SMA</option>
      <option value="Perguruan Tinggi" <?php if($pendaftaran->pendidikan=="Perguruan Tinggi") {echo "selected";} ?>>Perguruan Tinggi</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kelas / Semester</label>
  <div class="col-md-5">
    <input type="text" name=kelas class="form-control"  placeholder="Kelas" value="<?php echo $pendaftaran->kelas ?>" required>
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
   <textarea name="alamat" class="form-control"  placeholder="Alamat" value="<?php echo $pendaftaran->alamat ?>" required></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">No Hp</label>
  <div class="col-md-5">
    <input type="text" name=nohp class="form-control"  placeholder="No Hp" value="<?php echo $pendaftaran->nohp ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggal Daftar</label>
  <div class="col-md-5">
    <input type="date" name=tgl_daftar class="form-control"  placeholder="Tanggal Daftar" value="<?php echo $pendaftaran->tgl_daftar ?>" required>
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

<script>
    function changePendidikan(value) {
        $("#kelas").html('')
        $("#label_kelas").html('Semester')
        let x=0;
        if(value=='SD'){
            x=6;
        }else if(value=='SMP' || value=='SMA'){
            x=3;
        }else if(value=='Perguruan Tinggi'){
            x=8;
            $("#label_kelas").html('Semester')
        }
        for (let index = 1; index <= x; index++) {
            $("#kelas").append(`<option value="`+index+`">`+index+`</option>`)
        }
    }
</script>