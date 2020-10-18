<table class="table table-striped">

  <tbody>
  
    <tr>
      <th scope="row">Nama Santri</th>
     <td><?php echo $pendaftaran->nama_santri ?></td>
      <td>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$pendaftaran->foto) ?>" class="img img-responsive img-thumbnail" width="60">
    </td>
      <tr>
      <th scope="row"> Tempat Lahir</th>
     <td><?php echo $pendaftaran->tempat_lahir ?></td>
    </tr>
      <tr>
    <th scope="row">Tanggal Lahir</th>
     <td><?php echo $pendaftaran->tgl_lahir ?></td>
    </tr>
    <tr>
     <th scope="row">Jenis Kelamin</th>
     <td><?php echo $pendaftaran->jenis_kelamin ?></td>
    </tr>
    <tr>
      <th scope="row">Pendidikan</th>
       <td><?php echo $pendaftaran->pendidikan ?></td>
    
      <tr>
      <th scope="row">Kelas</th>
     <td><?php echo $pendaftaran->kelas ?></td>
    </tr>


     <tr>
      <th scope="row">Nama Ayah</th>
     <td><?php echo $pendaftaran->nama_ayah ?></td>
    </tr>

  
    <tr>
      <th scope="row">Nama Ibu</th>
     <td><?php echo $pendaftaran->nama_ibu ?></td>
    </tr>

     <tr>
      <th scope="row">No Hp</th>
     <td><?php echo $pendaftaran->nohp ?></td>
    </tr>

      <tr>
      <th scope="row">Tanggal Daftar</th>
     <td><?php echo $pendaftaran->tgl_daftar ?></td>
    </tr>

    <tr>
         <td>
      <a href="<?php echo base_url('admin/pendaftaran') ?>" class="btn btn-success btn-xs"> Kembali</a></td>
    </tr>
  </tbody>
</table>
