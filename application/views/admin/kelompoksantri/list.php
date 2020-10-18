<p>
	<a href="<?php echo base_url('admin/kelompoksantri/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>Nama Santri</th>
			<th>Jenis Kelamin</th>
			<th>Kode Kelompok</th>
			<th>Nama Kelompok</th>
			<th>Kategori Kelompok</th>
			<th>Nama Pengajar</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	
		<?php $no=1; foreach($kelompoksantri as $kelompoksantri) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $kelompoksantri->nama_santri ?></td>
			<td><?php echo $kelompoksantri->jenis_kelamin ?></td>
			<td><?php echo $kelompoksantri->kdkelompok ?></td>
			<td><?php echo $kelompoksantri->namakelompok ?></td>
			<td><?php echo $kelompoksantri->kategori_kelompok ?></td>
			<td><?php echo $kelompoksantri->nama ?></td>
			<td>

				<a href="<?php echo base_url('admin/kelompoksantri/delete/'.$kelompoksantri->idkelompoksantri) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
