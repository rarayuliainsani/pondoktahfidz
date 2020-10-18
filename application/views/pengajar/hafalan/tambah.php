<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('pengajar/hafalan/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Nama Santri</label>
  <div class="col-md-5">
    <select required="" name="idsantri" class="form-control selectpicker" data-live-search="true">
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
  <label  class="col-md-2 control-label">Nama Pengajar</label>
  <div class="col-md-5">
    <select name="idpengajar" class="form-control">
       <option>---</option>
       <?php foreach($pengajar as $pengajar){
            $this->db->select('*');
            $db = $this->db->get_where('pengajar', array('idpengajar' => $idpengajar))->row();
             if($pengajar->idpengajar==$idpengajar){?>
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
  <label  class="col-md-2 control-label">Tanggal</label>
  <div class="col-md-5">
     <input type="date" name=tanggal class="form-control"   value="<?php echo set_value('tanggal') ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Dari Ayat</label>
  <div class="col-md-5">
     <input type="text" name=dari_ayat class="form-control"   value="<?php echo set_value('dari_ayat') ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Dari Surat</label>
  <div class="col-md-5">
    <select name="dari_surat" class="form-control">
       <option>---</option>
       <?php foreach($surat as $surat){
            $this->db->select('*');
            $db = $this->db->get_where('surat', array('idsurat' => $idsurat))->row();
             if($surat->idsurat==$idsurat){?>
            <option value="<?php echo $db->idsurat?>" selected>
            <?php echo $db->nama_surat ?>
        </option>

           <?php }else{ ?>
                <option value="<?php echo $surat->idsurat?>">
                      <?php echo $surat->nama_surat ?>
          <?php }
           } ?>
          
     </select>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">Sampai Ayat</label>
  <div class="col-md-5">
     <input type="text" name=sampai_ayat class="form-control"   value="<?php echo set_value('sampai_ayat') ?>" required>
  </div>
</div>

<div class="form-group">
  <label  class="col-md-2 control-label">sampai_surat</label>
  <div class="col-md-5">
    <select name="sampai_surat" class="form-control">
       <option>---</option>
       <?php foreach($surat2 as $surat){
          ?>
          <option value="<?php echo $surat->idsurat ?>"><?php echo $surat->nama_surat ?></option>
          <?php 
           } ?>
          
     </select>
  </div>
</div>

<!-- <div class="form-group">
  <label  class="col-md-2 control-label">Jumlah Hafalan</label>
  <div class="col-md-5">
     <input type="text" name=hafalan_terakhir class="form-control" readonly="" value="<?php echo set_value('hafalan_terakhir') ?>" >
  </div>
</div> -->

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