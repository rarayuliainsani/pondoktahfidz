<div class="breadcrumbs">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                     <div class="col-md-12">
                       
                             <!-- page content -->
                    <div class="right_col" role="main">
                         <div class="card-header bg-danger" >
                               <center> <strong class="card-title text-white"> <h3>Laporan Pendaftaran Pertahun</h3></strong></center>
                         </div>
                     <div class="card-body">
                    <div id="body">
                        <form action="<?php echo site_url('laporan_pendaftaran_pertahun/filter_date') ?>" method="POST" target=_blank>
                           <div class="form-group row">
                                <div class="col-md-5">
                                    <label>Pilih Tahun</label>
                                    
                                      <select class="select2_single form-control" name="tahun">
                                         <option value="" disabled selected>- Pilih Tahun -</option>
                                        <?php
                                            $tahun = date('Y');
                                            for($x = $tahun; $x >= 2000; $x--){
                                              ?>
                                              <option name="tahun" value="<?php echo $x?>"><?php echo $x ?></option>
                                            <?php } ?>
                                        }
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