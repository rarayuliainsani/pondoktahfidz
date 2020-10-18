
<table class="table table-bordered" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>NO</th>
			<th>Bulan</th>
			<th>Tanggal Bayar</th>
			<th>Pembayaran</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($spp as $detail_spp) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $detail_spp->bulan ?></td>
			<td><?php echo $detail_spp->tgl_bayar ?></td>
			<td><?php echo $detail_spp->pembayaran ?></td>
			
		</tr>
		<?php } ?>
		
	</tbody>
</table>
