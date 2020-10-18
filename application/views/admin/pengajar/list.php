<p>
	<a href="<?php echo base_url('admin/pengajar/tambah') ?>" class="btn btn-success btn-lg">
	<i class="fa fa-plus"></i>Tambah 
	</a>
</p>

<?php
// Notofikasi
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>
<table class="table table-bordered" idpengajar="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>NO</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>Foto</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>No Hp</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($pengajar as $pengajar) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pengajar->nip ?></td>
			<td><?php echo $pengajar->nama ?></td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$pengajar->foto) ?>" class="img img-responsive img-thumbnail" width="60">
			</td>
			<td><?php echo $pengajar->tempat_lahir ?></td>
			<td><?php echo $pengajar->tgl_lahir ?></td>
			<td><?php echo $pengajar->jk ?></td>
			<td><?php echo $pengajar->alamat?></td>
			<td><?php echo $pengajar->nohp?></td>
			<td>
				<a href="<?php echo base_url('admin/pengajar/edit/'.$pengajar->idpengajar) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?php echo base_url('admin/pengajar/delete/'.$pengajar->idpengajar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
				<a href="<?php echo base_url('admin/pengajar/detail/' .$pengajar->idpengajar) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Detail</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
