<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
// echo form_open(base_url('admin/pendaftaran/tambah'), ' class="form-horizontal"');
?>

<?php $this->session->flashdata('sukses'); ?>

<!-- function buat savenya dimana? function tambah buat nampilin form buakan? -->
<form action="<?=base_url()?>admin/pendaftaran/tambah" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label  class="col-md-2 control-label">Nama Calon Santri</label>
  <div class="col-md-2">
    <input type="text" name=nama_santri class="form-control"  placeholder="Nama Santri" value="<?php echo set_value('nama_santri') ?>" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label">Upload Foto</label>
  <div class="col-md-5">
    <input type="file" name="foto" class="form-control" >
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
          <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
          <input type="radio" name="jenis_kelamin" value="Perempuan" > Perempuan
          </div>
     </div>

 <div class="form-group">
  <label class="col-md-2 control-label">Nama Ayah</label>
  <div class="col-md-5">
    <input type="text" name=nama_ayah class="form-control"  placeholder="Nama ayah" value="<?php echo set_value('nama_ayah') ?>" required>
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Nama Ibu</label>
  <div class="col-md-5">
    <input type="text" name=nama_ibu class="form-control"  placeholder="Nama ibu" value="<?php echo set_value('nama_ibu') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Pendidikan</label>
    <div class="col-md-5">
          <select name="pendidikan" class="form-control" onchange="changePendidikan(this.value)">
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
  <label class="col-md-2 control-label" id="kelas_label">Kelas/Semester</label>
  <div class="col-md-5">
    <select name="kelas" id="kelas" class="form-control">
      <option value="-">-</option>
    </select>
  </div>
</div>

 <div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
   <textarea name="alamat" class="form-control"  placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">No Hp</label>
  <div class="col-md-5">
    <input type="text" name=nohp class="form-control"  placeholder="No Hp" value="<?php echo set_value('nohp') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggal Daftar</label>
  <div class="col-md-5">
    <input type="text" name=tgl_daftar class="form-control"  placeholder="Tanggal Daftar" value="<?=date('Y-m-d')?>" required>
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
</div>
</form>
<?php 
// echo form_close();
 ?>

<script>
    function changePendidikan(value) {
        $("#kelas").html('')
        $("#label_kelas").html('Semester')
        let x=0;
        if(value=='TK'){
            x=0;
        }else if(value=='SD'){
            x=6;
        }else if(value=='SMP' || value=='SMA'){
            x=3;
        }else if(value=='Lainnya'){
            x=0;
        }else if(value=='Perguruan Tinggi'){
            x=8;
            $("#label_kelas").html('Semester')
        }
        for (let index = 1; index <= x; index++) {
            $("#kelas").append(`<option value="`+index+`">`+index+`</option>`)
        }
    }
</script>