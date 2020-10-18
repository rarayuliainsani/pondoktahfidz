<p>
	<a href="<?php echo base_url('admin/pendaftaran/tambah') ?>" class="btn btn-success btn-lg">
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
<table class="table table-bordered" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>nohp</th>			
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($pendaftaran as $pendaftaran) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pendaftaran->nama_santri ?></td>
			<td><?php echo $pendaftaran->tempat_lahir ?></td>
			<td><?php echo $pendaftaran->tgl_lahir ?></td>
			<td><?php echo $pendaftaran->jenis_kelamin?></td>
			<td><?php echo $pendaftaran->nohp?></td>
			<td>
				<a href="<?php echo base_url('admin/pendaftaran/edit/'.$pendaftaran->idpendaftaran) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?php echo base_url('admin/pendaftaran/delete/'.$pendaftaran->idpendaftaran) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
				<a href="<?php echo base_url('admin/pendaftaran/detail/' .$pendaftaran->idpendaftaran) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Detail</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
