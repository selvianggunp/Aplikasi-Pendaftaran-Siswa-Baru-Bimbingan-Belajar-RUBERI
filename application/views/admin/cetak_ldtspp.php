<!DOCTYPE html>
<html>
<head>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}
</style>
  <title><?= $judul; ?></title>
</head>

<body>
   
  <div class="row">
     <img src="assets/kop.png" width="100%">   
  </div>
        <hr><h4 align="center">LAPORAN DATA TRANSAKSI SPP</h4><br>
     
<table>
   <thead>
          <tr>
          <th align="center">No</th>
                <th>Kode Transaksi Pendaftaran</th>
                <th>Kode Siswa</th> 
                <th>Nama</th> 
                <th>Kelas</th> 
                <th>Sekolah</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Nama Bank</th>
                <th>Pemilik Rekening</th>
                <th>No Rekening</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
      
         </tr>
          </thead>
          <tbody>
              <?php $no = 1;  $total = 0; ?> 
           <?php foreach ($data_tspp as $dtspp) { ?> 
           
               <tr>
                 <td align="center"><?= $no++; ?></td>
                 <td><?= $dtspp['kd_transaksi_spp']; ?></td>
                 <td><?= $dtspp['kd_siswa']; ?></td>
                 <td><?= $dtspp['nama_lengkap']; ?></td>
                 <td align="center"><?= $dtspp['kelas']; ?></td>
                 <td align="center"><?= $dtspp['sekolah']; ?></td>'.
                 <td>Rp. <?= number_format($dtspp['biaya'], 0, ',', '.'); ?></td>
                 <td><?= $dtspp['metode_pembayaran']; ?></td>
                 <td><?= $dtspp['nama_bank']; ?></td>
                 <td><?= $dtspp['pemilik_rekening']; ?></td>
                 <td><?= $dtspp['no_rekening']; ?></td>
                <td><?php $tgl = date_create($dtspp['tgl_bayar']); echo date_format($tgl, 'd-m-Y'); ?></td>
                <td><?= $dtspp['status']; ?></td>
              </tr>
          
            <?php } ?>
          </tbody>
</table>
<p>Dicetak Pada Tanggal: <?= $waktu; ?></p>
<p>Dicetak Oleh: <?= $username; ?></p>

</body>
</html>