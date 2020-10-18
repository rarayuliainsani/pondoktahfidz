<?php
 if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

 }
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('pengajar/absensi/tambah'), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label text-right">Pertemuan ke </label>
        <div class="col-md-5">
            <select name="idpertemuan" onchange="changePertemuan(this.value)" >
            <option value="" disabled selected>---</option>
            <?php foreach($pertemuan as $pertemuan){ 
                $this->db->select('*');
                
                $db = $this->db->get_where('pertemuan', array('idpertemuan'=>$idpertemuan))->row();
                
                if($pertemuan->idpertemuan == $idpertemuan){?>
                    <option value="<?php echo $db->idpertemuan?>" selected>
                            <?php echo $db->pertemuanke ?>
            </option>
            
            <?php }else{ ?>
                 <option value="<?php echo $pertemuan->idpertemuan?>">
                            <?php echo $pertemuan->pertemuanke ?>
           <?php }
        } ?>
            </select>
        </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Tanggal</label>
  <div class="col-md-5">
    <input id="tanggal" type="text" name=tanggal class="form-control" readonly="" value="<?php echo set_value('tanggal')  ?>" required>
  </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label text-right">Pengajar </label>
        <div class="col-md-5">
            <select required="" name="idpengajar" class="form-control selectpicker" data-live-search="true" >
            <option value="" disabled selected>---</option>
            <?php foreach($pengajar as $pengajar){ 
                $this->db->select('*');
                
                $db = $this->db->get_where('pengajar', array('idpengajar'=>$idpengajar))->row();
                
                if($pengajar->idpengajar == $idpengajar){?>
                    <option value="<?php echo $db->idpengajar?>" selected>
                            <?php echo $db->nama ?>
            </option>
            
            <?php }else{ ?>
                 <option value="<?php echo $pengajar->idpengajar?>">
                            <?php echo $pengajar->nama ?>
           <?php }
        } ?>
            </select>
        </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label text-right">Nama santri </label>
        <div class="col-md-5">
            <select required="" name="idsantri" class="form-control selectpicker" data-live-search="true" >
            <option value="" disabled selected>---</option>
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
     <label class="col-md-2 control-label">Keterangan</label>
      <div class="col-md-5">
          <input type="radio" name="keterangan" value="Hadir" >Hadir
          <input type="radio" name="keterangan" value="Sakit" >Sakit
          <input type="radio" name="keterangan" value="Izin" >Izin
          <input type="radio" name="keterangan" value="Alfa" >Alfa
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
function changePertemuan(value) {
    console.log(value);
    var dataPertemuan = <?php echo $pertemuan_json; ?>;
    for (i in dataPertemuan) {
        var idpertemuan = dataPertemuan[i].idpertemuan;
        if(idpertemuan == value) {
            var tanggal = dataPertemuan[i].tanggal;
            $("#tanggal").val(tanggal);
        }
    }
}
</script>

<?php echo form_close(); ?>