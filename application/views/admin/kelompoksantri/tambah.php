<?php
 if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

 }
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/kelompoksantri/tambah'), 'class="form-horizontal"');
?>


<div class="form-group">
    <label class="col-md-2 control-label text-right">Nama santri </label>
        <div class="col-md-5">
            <select required="" name="idsantri" class="form-control selectpicker" data-live-search="true" onchange="changeSantri(this.value)" >
            <option value="" disabled selected>--Pilih Data--</option>
            <?php foreach($santri as $santri){ 
                $this->db->select('*');
                
                $db = $this->db->get_where('santri', array('idsantri'=>$idsantri))->row();
                
                if($santri->idsantri == $idsantri){?>
                    <option value="<?php echo $db->idsantri?>" selected>
                            <?php echo $db->nama_santri ?>
            </option>
            
            <?php }else{ ?>
                 <option value="<?php echo $santri->idsantri?>">
                            <?php echo $santri->nama_santri ?>
           <?php }
        } ?>
            </select>

        </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Jenis Kelamin</label>
  <div class="col-md-5">
    <input id="jenis_kelamin" type="text" name=jenis_kelamin class="form-control" readonly="" value="<?php echo set_value('jenis_kelamin')  ?>" required>
  </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label text-right">Kode kelompok</label>
        <div class="col-md-5">
            <select name="idkelompok" class="form-control" onchange="changeKelompok(this.value)" >
            <option value="" disabled selected>---</option>
            <?php foreach($kelompok as $kelompok){ 
                $this->db->select('*');
                
                $db = $this->db->get_where('kelompok', array('idkelompok'=>$idkelompok))->row();
                
                if($kelompok->idkelompok == $idkelompok){?>
                    <option value="<?php echo $db->idkelompok?>" selected>
                            <?php echo $db->kdkelompok. "|". $db->kategori_kelompok  ?> 
            </option>
            
            <?php }else{ ?>
                 <option value="<?php echo $kelompok->idkelompok?>">
                            <?php echo $kelompok->kdkelompok. "|". $kelompok->kategori_kelompok ?>
           <?php }
        } ?>
            </select>

        </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Kelompok</label>
  <div class="col-md-5">
    <input id="namakelompok" type="text" name=namakelompok class="form-control" readonly="" value="<?php echo set_value('namakelompok')  ?>" required>
  </div>
</div>


<div class="form-group">
  <label  class="col-md-2 control-label">Kategori Kelompok</label>
  <div class="col-md-5">
    <input id="kategori_kelompok" type="text" name=kategori_kelompok class="form-control" readonly="" value="<?php echo set_value('kategori_kelompok')  ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Pengajar</label>
  <div class="col-md-5">
    <input type="text" id="nama_pengajar" name=idpengajar class="form-control" readonly="" value="<?php echo set_value('idpengajar') ?>" required>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
        <button class="btn btn-success btn-xm" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-xm" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>
<script>
function changeSantri(value) {
    console.log(value);
    var dataSantri = <?php echo $santri_json; ?>;
    for (i in dataSantri) {
        var idsantri = dataSantri[i].idsantri;
        if(idsantri == value) {
            var jenis_kelamin = dataSantri[i].jenis_kelamin;

            $("#jenis_kelamin").val(jenis_kelamin);
        }
    }
}
</script>
<script>
function changeKelompok(value) {
    console.log(value);
    var dataKelompok = <?php echo $kelompok_json; ?>;
    for (i in dataKelompok) {
        var idkelompok = dataKelompok[i].idkelompok;
        if(idkelompok == value) {
            var namakelompok = dataKelompok[i].namakelompok;
            var kategori_kelompok = dataKelompok[i].kategori_kelompok;
            var namaPengajar = dataKelompok[i].nama;
            console.log(namaPengajar);
            $("#namakelompok").val(namakelompok);
            $("#kategori_kelompok").val(kategori_kelompok);
            $("#nama_pengajar").val(namaPengajar);
        }
    }
}
</script>
<?php echo form_close(); ?>