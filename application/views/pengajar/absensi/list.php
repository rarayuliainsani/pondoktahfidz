<p>
	<a href="<?php echo base_url('pengajar/absensi/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>Pertemuan ke</th>
			<th>Tanggal</th>
			<th>Pengajar</th>
			<th>Nama Santri</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	
		<?php $no=1; foreach($absensi as $absensi) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $absensi->pertemuanke ?></td>
			<td><?php echo $absensi->tanggal ?></td>
			<td><?php echo $absensi->nama ?></td>
			<td><?php echo $absensi->nama_santri ?></td>
			<td><?php echo $absensi->keterangan ?></td>

			<td><a href="<?php echo base_url('pengajar/absensi/edit/'.$absensi->idabsensi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?php echo base_url('pengajar/absensi/delete/'.$absensi->idabsensi) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
