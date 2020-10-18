
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
			<th>Bulan</th>
			<th>Tanggal Bayar</th>
			<th>Nominal</th>
			<th>Status Pembayaran</th>
			<th>Tunggakan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($spp as $spp) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $spp->nama_santri ?></td>
			<td><?php echo $spp->bulan ?></td>
			<td><?php echo $spp->tgl_bayar ?></td>
			<td><?php echo $spp->nominal ?></td>
			<td><?php echo $spp->status ?></td>
			<td><?php echo $spp->tunggakan ?></td>
			<td><!-- <a href="<?php echo base_url('bendahara/spp/edit/'.$spp->idspp) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a> -->
			<a href="<?php echo base_url('admin/spp/history/'.$spp->idspp) ?>" class="btn btn-success btn-xs" "><i class="fa fa-file"></i>History</a>
			<!-- <a href="<?php echo base_url('bendahara/spp/delete/'.$spp->idspp) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
 -->
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
