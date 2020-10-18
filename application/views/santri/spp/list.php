
<table class="table table-bordered" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>NO</th>
			<th>Bulan</th>
			<th>Tanggal Bayar</th>
			<th>Nominal</th>
			<th>Status Pembayaran</th>
			<th>Tunggakan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($spp as $spp) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $spp['bulan'] ?></td>
			<td><?php echo $spp['tgl_bayar'] ?></td>
			<td><?php echo $spp['nominal'] ?></td>
			<td><?php echo $spp['status'] ?></td>
			<td><?php echo $spp['tunggakan'] ?></td>
			
		</tr>
		<?php } ?>
		
	</tbody>
</table>
