<div class="breadcrumbs">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                     <div class="col-md-12">
                       
                             <!-- page content -->
                    <div class="right_col" role="main">
                         <div class="card-header bg-danger" >
                               <center> <strong class="card-title text-white"> <h3>Laporan Hafalan</h3></strong></center>
                         </div>
                     <div class="card-body">
                    <div id="body">
                        <form action="<?php echo site_url('laporan_hafalan/filter_date') ?>" method="POST" target="_blank">
                        <div class="form-group row">
                    <div class="col-md-5">
                    <label>Pilih Santri</label>
                      <select  name="kode_santri" class="select2_single form-control selectpicker" data-live-search="true">
                         <option>Pilih Santri</option>                
                             <?php foreach ($santri as $key => $s) { ?>
                                 <option value="<?php echo $s->idsantri; ?>"><?php echo $s->nama_santri; ?></option>
                             <?php } ?>
                           
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