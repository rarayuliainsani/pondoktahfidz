

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
			<th>Nama Santri</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
	
		<?php $no=1; foreach($absensi as $absensi) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $absensi->pertemuanke ?></td>
			<td><?php echo $absensi->tanggal ?></td>
			<td><?php echo $absensi->nama_santri ?></td>
			<td><?php echo $absensi->keterangan ?></td>

			
		</tr>
		<?php } ?>
		
	</tbody>
</table>
