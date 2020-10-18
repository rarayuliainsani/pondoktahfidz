<p>
	<a href="<?php echo base_url('pengajar/surat/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>Nama Surat</th>
			<th>Jumlah Ayat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($surat as $surat) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $surat->nama_surat ?></td>
			<td><?php echo $surat->jumlah_ayat ?></td>
			<td><a href="<?php echo base_url('pengajar/surat/edit/'.$surat->idsurat) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?php echo base_url('pengajar/surat/delete/'.$surat->idsurat) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
