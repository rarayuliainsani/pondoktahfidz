<?php
// Notofication error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/kelompok/tambah'), ' class="form-horizontal"');
?>

<div class="form-group">
  <label  class="col-md-2 control-label">Kode Kelompok</label>
  <div class="col-md-5">
    <input type="text" name=kdkelompok class="form-control"  value="<?php echo set_value('kdkelompok') ?>" required>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-2 control-label">Nama Kelompok</label>
  <div class="col-md-5">
    <input type="text" name=namakelompok class="form-control"  value="<?php echo set_value('namakelompok') ?>" required>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-2 control-label">Kategori Kelompok</label>
  <div class="col-md-5">
    <select name="kategori_kelompok" class="form-control">
      <option value="Tahfidz">Tahfidz</option>
      <option value="Tahsin">Tahsin</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-2 control-label">Pengajar</label>
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