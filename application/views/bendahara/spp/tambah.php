<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('bendahara/spp/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Bulan</label>
  <div class="col-md-5">
    <select name="bulan" class="form-control">
      <option value="Januari">Januari</option>
      <option value="Februari">Februari</option>
      <option value="Maret">Maret</option>
      <option value="April">April</option>
      <option value="Mei">Mei</option>
      <option value="Juni">Juni</option>
      <option value="Juli">Juli</option>
      <option value="Agustus">Agustus</option>
      <option value="September">September</option>
      <option value="Oktober">Oktober</option>
      <option value="November">November</option>
      <option value="Desember">Desember</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Santri</label>
  <div class="col-md-5">
    <select required="" name="idsantri"  class="form-control selectpicker" data-live-search="true">
       <option>---</option>
       <?php foreach($santri as $santri){
            $this->db->select('*');
            $db = $this->db->get_where('santri', array('idsantri' => $idsantri))->row();
             if($santri->idsantri==$idsantri){?>
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
  <label  class="col-md-2 control-label">Tanggal Bayar</label>
  <div class="col-md-5">
     <input type="date" name=tgl_bayar class="form-control"   value="<?php echo set_value('tgl_bayar') ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nominal</label>
  <div class="col-md-5">
     <input type="nominal" name=nominal class="form-control"   value="<?php echo set_value('nominal') ?>" onkeyup="nominalStatus(this.value)" required>
  </div>
</div>



<div class="form-group">
  <label  class="col-md-2 control-label">Status</label>
  <div class="col-md-5">
     <input id="status_pembayaran" type="text" name=status class="form-control" readonly="" value="<?php echo set_value('status') ?>" required>
  </div>
</div>


<div class="form-group">
  <label  class="col-md-2 control-label">Tunggakan</label>
  <div class="col-md-5">
     <input type="text" id="tunggakan" name=tunggakan class="form-control" readonly="" value="<?php echo set_value('tunggakan') ?>" required>
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
 function nominalStatus(value) {
  console.log(value);
  if(value >= 150000) {
    $("#status_pembayaran").val("Lunas");
    $("#tunggakan").val("0");
  } else {
    var total_tunggakan = 150000 - value;
    $("#status_pembayaran").val("Belum Lunas");
    $("#tunggakan").val(total_tunggakan);
  }
 } 
</script>

<?php echo form_close(); ?>