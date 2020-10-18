<div class="breadcrumbs">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                     <div class="col-md-12">
                       
                             <!-- page content -->
                    <div class="right_col" role="main">
                         <div class="card-header bg-danger" >
                               <center> <strong class="card-title text-white"> <h3>Laporan Santri</h3></strong></center>
                         </div>
                     <div class="card-body">
                    <div id="body">
                        <form action="<?php echo site_url('laporan_santri/filter_date') ?>" method="POST" target="_blank">
                           <div class="form-group row">
                                

                <div class="col-md-5">
                    <label>Pilih Kategori Kelompok</label>                  
                    <select class="select2_single form-control" name="kategori_kelompok">
                         <option value="" disabled selected>- Pilih Kategori Kelompok -</option>
                        <option name="kategori_kelompok" value="Tahfidz" <?php echo set_select('kategori_kelompok', 'Laki-laki', $kategori_kelompok=='Laki-laki')?>>Tahfidz</option>
                        <option name="kategori_kelompok" value="Tahsin" <?php echo set_select('kategori_kelompok', 'Perempuan', $kategori_kelompok=='Perempuan')?>>Tahsin</option>
                      
                      
                </div>
                    </select>
                </div>


            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-success btn-xm"><i class="fa fa-print"></i> Eksport PDF</button>
                </div>
            </div>
        </form>
         
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- /page content -->