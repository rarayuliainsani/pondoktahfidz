<p>
	<a href="<?php echo base_url('pengajar/hafalan/tambah') ?>" class="btn btn-success btn-lg">
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
			<th>Nama Pengajar</th>
			<th>Tanggal</th>
			<th>Dari Surat</th>
			<th>Dari Ayat</th>
			<th>Sampai SUrat</th>
			<th>Sampai Ayat</th>
			<th>Hafalan Terakhir</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($hafalan as $hafalan) {
			  $ds = $this->hafalan_model->getSuratby($hafalan->dari_surat);
			 
			  $ss = $this->hafalan_model->getSuratby($hafalan->sampai_surat);
			
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $hafalan->nama_santri ?></td>
			<td><?php echo $hafalan->nama ?></td>
			<td><?php echo $hafalan->tanggal ?></td>
			<td><?php echo $ds->nama_surat ?></td>
			<td><?php echo $hafalan->dari_ayat ?></td>
			<td><?php echo $ss->nama_surat ?></td>
			<td><?php echo $hafalan->sampai_ayat ?></td>
			<td><?php echo $ss->nama_surat. " "."Ayat"." "  .$hafalan->sampai_ayat ?></td>
			<td>
				<a href="<?php echo base_url('pengajar/hafalan/delete/'.$hafalan->idhafalan) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
