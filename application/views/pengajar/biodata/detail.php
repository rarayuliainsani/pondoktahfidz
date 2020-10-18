<table class="table table-striped">

<?php 
  foreach ($pengajar as $luffy) {
    
  }
 ?>
  <tbody>
  <tr>
      <th scope="row">NIP</th>
     <td><?php echo $pengajar->nip ?></td>

      <td>
     <img src="<?php echo base_url('assets/upload/image/thumbs/'.$pengajar->foto) ?>" class="img img-responsive img-thumbnail" width="60">
     </td>
    </tr>
    <tr>
      <th scope="row">Nama</th>
     <td><?php echo $pengajar->nama ?></td>
    </tr>
      <tr>
      <th scope="row"> Tempat Lahir</th>
     <td><?php echo $pengajar->tempat_lahir ?></td>
    </tr>
      <tr>
    <th scope="row">Tanggal Lahir</th>
     <td><?php echo $pengajar->tgl_lahir ?></td>
    </tr>
    <tr>
     <th scope="row">Jenis Kelamin</th>
     <td><?php echo $pengajar->jk ?></td>
    </tr>
       <tr>
      <th scope="row">Alamat</th>
     <td><?php echo $pengajar->alamat ?></td>
    </tr>

     <tr>
      <th scope="row">No Hp</th>
     <td><?php echo $pengajar->nohp ?></td>
    </tr>

      <tr>
      <th scope="row">Jumlah Hafalan</th>
     <td><?php echo $pengajar->jml_hafalan ?></td>
    </tr>

      <tr>
      <th scope="row">Alumni</th>
     <td><?php echo $pengajar->alumni ?></td>
    </tr>

      <tr>
      <th scope="row">Nama Orang Tua</th>
     <td><?php echo $pengajar->nama_ortu ?></td>
    </tr>

      <tr>
      <th scope="row">Alamat Orang tua</th>
     <td><?php echo $pengajar->alamat_ortu ?></td>
    </tr>

    <tr>
         <td>
      <a href="<?php echo base_url('pengajar/biodata/edit/'."$this->username") ?>" class="btn btn-success btn-xs"> Edit</a></td>
    </tr>

    
  </tbody>
</table>
