
    <table class="table table-striped">
  <tbody>
    <tr>
      <th scope="row">Kode Santri</th>
     <td><?php echo $santri->kode_santri ?></td>
   <td>
     <img src="<?php echo base_url('assets/upload/image/thumbs/'.$santri->foto) ?>" class="img img-responsive img-thumbnail" width="60">
     </td>
    </tr>
    <tr>
      <th scope="row">Nama Santri</th>
     <td><?php echo $santri->nama_santri ?></td>
    </tr>
      <tr>
      <th scope="row"> Tempat Lahir</th>
     <td><?php echo $santri->tempat_lahir ?></td>
    </tr>
      <tr>
    <th scope="row">Tanggal Lahir</th>
     <td><?php echo $santri->tgl_lahir ?></td>
    </tr>
    <tr>
     <th scope="row">Jenis Kelamin</th>
     <td><?php echo $santri->jenis_kelamin ?></td>
    </tr>
    <tr>
      <th scope="row">Pendidikan</th>
       <td><?php echo $santri->pendidikan ?></td>
    
    </tr>
     <tr>
      <th scope="row">Tanggal Masuk</th>
     <td><?php echo $santri->tanggal_masuk ?></td>
    </tr>
  
  
       <tr>
      <th scope="row">Alamat</th>
     <td><?php echo $santri->alamat ?></td>
    </tr>

       <tr>
      <th scope="row">Asal Sekolah</th>
     <td><?php echo $santri->asal_sekolah ?></td>
    </tr>

     <tr>
      <th scope="row">Nama Ayah</th>
     <td><?php echo $santri->nama_ayah ?></td>
    </tr>

     <tr>
      <th scope="row">Pekerjaan Ayah</th>
     <td><?php echo $santri->pekerjaan_ayah ?></td>
    </tr>

    <tr>
      <th scope="row">Nama Ibu</th>
     <td><?php echo $santri->nama_ibu ?></td>
    </tr>

     <tr>
      <th scope="row">Pekerjaan Ibu</th>
     <td><?php echo $santri->pekerjaan_ibu ?></td>
    </tr>


     <tr>
      <th scope="row">No Hp</th>
     <td><?php echo $santri->nohp ?></td>
    </tr>

    <tr>
      <th scope="row">Jumlah Hafalan</th>
     <td><?php echo $santri->jumlah_hafalan ?></td>
    </tr>
  </tbody>
</table>
<div class="form-group row">
                <div class="col-md-5">
                    <a href="<?php echo base_url('santri/biodata_santri/edit/'."$this->username") ?>"  type="submit" class="btn btn-success btn-xm"><i class="fa fa-edit"></i> Edit</a>
                </div>
            </div>
