<p>
	<a href="<?php echo base_url('admin/santri/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>Kode Santri</th>
			<th>Foto</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Pendidikan</th>
			
			
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($santri as $santri) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $santri->nama_santri ?></td>
			<td><?php echo $santri->kode_santri ?></td>
			<td><?php echo $santri->foto ?></td>
			<td><?php echo $santri->tempat_lahir ?></td>
			<td><?php echo $santri->tgl_lahir ?></td>
			<td><?php echo $santri->jenis_kelamin?></td>
			<td><?php echo $santri->pendidikan?></td>
			
			<td>
				<a href="<?php echo base_url('admin/santri/edit/'.$santri->idsantri) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?php echo base_url('admin/santri/delete/'.$santri->idsantri) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
				<a href="<?php echo base_url('admin/santri/detail/' .$santri->idsantri) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Detail</a>
			</td>
		</tr>
		<?php
		} ?>
		
	</tbody>
</table>
