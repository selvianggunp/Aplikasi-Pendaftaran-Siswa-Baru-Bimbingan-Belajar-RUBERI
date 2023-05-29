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

     <hr><h3 align="center">LAPORAN DATA TRANSAKSI PENDAFTARAN</h3><br>
  
  <table>
	 <thead>
          <tr>
                <th align="center">No</th>
                <th>Kode Transaksi SPP</th>
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
          <?php $no=1; foreach ($data_tp as $dtp) { ?>
            <tr>'.
             '<td align="center"><?= $no++; ?></td>
             <td><?= $dtp['kd_transaksi_pendaftaran']; ?></td>
             <td><?= $dtp['kd_siswa']; ?></td>
             <td><?= $dtp['nama_lengkap']; ?></td>
             <td align="center"><?= $dtp['kelas']; ?></td>
             <td><?= $dtp['sekolah']; ?></td>
             <td>Rp. <?=  number_format($dtp['biaya'], 0, ',', '.')?></td>
             <td><?= $dtp['metode_pembayaran']; ?></td>
             <td><?= $dtp['nama_bank']; ?></td>
             <td><?= $dtp['pemilik_rekening']; ?></td>
             <td><?= $dtp['no_rekening']; ?></td>
             <td><?php $tgl = date_create($dtp['tgl_bayar']); echo date_format($tgl, 'd-m-Y'); ?></td>
             <td><?= $dtp['status']; ?></td>
           </tr>
            <?php } ?>
          </tbody>
</table>
<p>Dicetak Pada Tanggal: <?= $waktu; ?></p>
<p>Dicetak Oleh: <?= $username; ?></p>

</body>
</html>