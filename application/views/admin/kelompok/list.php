<p>
	<a href="<?php echo base_url('admin/kelompok/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>Kode Kelompok</th>
			<th>Nama Kelompok</th>
			<th>Kategori Kelompok</th>
			<th>Pengajar</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($kelompok as $kelompok) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $kelompok->kdkelompok ?></td>
			<td><?php echo $kelompok->namakelompok ?></td>
			<td><?php echo $kelompok->kategori_kelompok?></td>
			<td><?php echo $kelompok->nama ?></td>
			<td><a href="<?php echo base_url('admin/kelompok/edit/'.$kelompok->idkelompok) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?php echo base_url('admin/kelompok/delete/'.$kelompok->idkelompok) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
