


<table class="table table-bordered" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>NO</th>

			<th>Tanggal</th>
			<th>Dari Surat</th>
			<th>Dari Ayat</th>
			<th>Sampai Surat</th>
			<th>Sampai Ayat</th>
			<th>Hafalan Terakhir</th>
			<!-- <th>Jumlah Hafalan</th> -->

		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($hafalan as $hafalan) {
			 $ds = $this->hafalan_model->getSuratby($hafalan['dari_surat']);
			 
			  $ss = $this->hafalan_model->getSuratby($hafalan['sampai_surat']);
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $hafalan['tanggal'] ?></td>
			<td><?php echo $ds->nama_surat ?></td>
			<td><?php echo $hafalan['dari_ayat'] ?></td>
			<td><?php echo $ss->nama_surat ?></td>
			<td><?php echo $hafalan['sampai_ayat'] ?></td>
			<td><?php echo $ss->nama_surat." "."Ayat"." ".$hafalan['sampai_ayat'] ?></td>
			<!-- <td><?php echo $hafalan->jml_hafalan ?></td> -->
		</tr>
		<?php } ?>

		
	</tbody>
</table>
