<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('bendahara/spp/edit/'.$spp->idspp), ' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Bulan</label>
  <div class="col-md-5">
   <select name="bulan" class="form-control">
      <option value="Januari">Januari</option>
      <option value="Februari" <?php if($spp->bulan=="Februari") {echo "selected";} ?>>Februari</option>
      <option value="Maret" <?php if($spp->bulan=="Maret") {echo "selected";} ?>>Maret</option>
      <option value="April" <?php if($spp->bulan=="April") {echo "selected";} ?>>April</option>
      <option value="Mei" <?php if($spp->bulan=="Mei") {echo "selected";} ?>>Mei</option>
      <option value="Juni" <?php if($spp->bulan=="Juni") {echo "selected";} ?>>Juni</option>
      <option value="Juli" <?php if($spp->bulan=="Juli") {echo "selected";} ?>>Juli</option>
      <option value="Agustus" <?php if($spp->bulan=="Agustus") {echo "selected";} ?>>Agustus</option>
      <option value="September" <?php if($spp->bulan=="September") {echo "selected";} ?>>September</option>
      <option value="Oktober" <?php if($spp->bulan=="Oktober") {echo "selected";} ?>>Oktober</option>
      <option value="November" <?php if($spp->bulan=="November") {echo "selected";} ?>>November</option>
      <option value="Desember" <?php if($spp->bulan=="Desember") {echo "selected";} ?>>Desember</option>
    </select>
</div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Santri</label>
  <div class="col-md-5">
     <select name="idsantri" class="form-control">
   <?php foreach ($santri as $santri) {
    ?>

   }
     <option value="<?php echo $santri->idsantri?>"
     <?php if($spp->idsantri==$santri->idsantri){
      echo "selected"; } ?>>
        <?php echo $santri->nama_santri ?>
      </option>
     
     <?php }
     ?>
   </select>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Tanggal Bayar</label>
  <div class="col-md-5">
     <input type="date" name=tgl_bayar class="form-control" value="<?php echo $spp->tgl_bayar ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Nominal</label>
  <div class="col-md-5">
    <input type="hidden" name="nominal_value" value="<?=$spp->nominal?>">
    <input type="nominal" name=nominal class="form-control" value="0" onkeyup="nominalStatus(this.value)" required>
  </div>
</div>


<div class="form-group">
  <label  class="col-md-2 control-label">Status</label>
  <div class="col-md-5">
     <input id="status_pembayaran" type="text" name=status class="form-control"   value="<?php echo $spp->status ?>" required>
  </div>
</div>


<div class="form-group">
  <label  class="col-md-2 control-label">Tunggakan</label>
  <div class="col-md-5">
     <input type="text" id="tunggakan" name=tunggakan class="form-control"  value="<?php echo $spp->tunggakan ?>" required>
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
  if(value >= <?=$spp->tunggakan?>) {
    $("#status_pembayaran").val("Lunas");
    $("#tunggakan").val("0");
  } else {
    var total_tunggakan = <?=$spp->tunggakan?> - value;
    $("#status_pembayaran").val("Belum Lunas");
    $("#tunggakan").val(total_tunggakan);
  }
 } 
</script>

<!-- <script>
 function nominalStatus(value) {
  console.log(value);
  if(value >= total_tunggakan) {
    $("#status_pembayaran").val("Lunas");
    $("#tunggakan").val("0");
  } else {
    var total_tunggakan = tunggakan - value;
    $("#status_pembayaran").val("Belum Lunas");
    $("#tunggakan").val(total_tunggakan);
  }
 } 
</script>
 -->
<?php echo form_close(); ?>

