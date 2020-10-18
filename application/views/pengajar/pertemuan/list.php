<p>
	<a href="<?php echo base_url('pengajar/pertemuan/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>pertemuan Ke</th>
			<th>Tempat</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($pertemuan as $pertemuan) { ?>
		<tr>
			<td><?php echo $no++ ?></td>

			<td><?php echo $pertemuan->pertemuanke ?></td>
			<td><?php echo $pertemuan->tempat ?></td>
			<td><?php echo $pertemuan->tanggal ?></td>
			<td><a href="<?php echo base_url('pengajar/pertemuan/edit/'.$pertemuan->idpertemuan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?php echo base_url('pengajar/pertemuan/delete/'.$pertemuan->idpertemuan) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
