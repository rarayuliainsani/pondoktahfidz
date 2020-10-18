<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Hafalan</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head><body>
  
<table style="width: 100%;">
    <tr>
    <td><img src="assets/images/logo.JPG" style="; width: 90px; height: auto;"></td>
        <td align="center">
            <span style="font-size: 25px; line-height: 1.3; font-weight: bold;">
                Pondok Tahfidz Majelis Tazkiyah</span>
            <span style="font-size: 20px; line-height: 1.3;">
         
            <br>Lubuk Begalung</span>
                 <span style="font-size: 20px; line-height: 1.3;">
                <br>Kota Padang, Sumatera Barat 25213</span>
                 <span style="font-size: 20px; line-height: 1.3;">
                <br>Telp: (0751) 27939</span>
          </td>
         
        </tr>
  </table>
  
  <hr class="line-title">
     <center><p><span style="font-size: 16px;  font-weight: bold;">LAPORAN HAFALAN</span></p>
     </center><br><br>
<table>


</table>
<br><br>
  <table class="table table-bordered" border="1" width="100%">
    <tr>
               
                <th>No</th>
                <th>Tanggal</th>
               <!--  <th>Tanggal </th> -->
                <th>Dari Surat</th>
                <th>Dari Ayat</th>
                <th>Sampai Surat</th>
                <th>Sampai Ayat</th>
                <th>Hafalan Terakhir</th>
                
              <!--   <th>Status Pembayaran</th> -->
                
                
    </tr>

 <?php foreach($detail as $key => $result) { ?>
    <tr>
                <td><?php echo $key + 1;?></td>
                <td><?php echo $result['tanggal'];?></td>
                <td><?php echo $result['ds'];?></td>
                <td><?php echo $result['dari_ayat'];?></td>
                <td><?php echo $result['ss'];?></td>
                <td><?php echo $result['sampai_ayat'];?></td>
                <td><?php echo $result['ss']." ". "Ayat"." " .$result['sampai_ayat'];?></td>             
  </tr>
  <?php } ?>

   

  </table>
  <table style="font-weight: bold;" align="right">
        <tr><td><br><br><br><br><br><br></td>
          <td>Padang, <br><br>Kepala Pondok<br></td>
        </tr>
        <tr>
          <td><br><br><br><br><br><br><br><br></td>
          <td height="100">(Ustadz Yandi) <br><br>Nip. 19590919 198003 2 005</td>
          
        </tr>
    </table>
<br><br><br><br><br><br><br><br><br><br><br>
</body></html>