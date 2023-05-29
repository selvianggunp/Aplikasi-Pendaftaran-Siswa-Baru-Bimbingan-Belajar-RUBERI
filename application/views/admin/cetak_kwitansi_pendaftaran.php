<!DOCTYPE html>
<html>
<head>
	<title><?= $judul; ?></title>
</head>
<body>
	<table width="450px" cellpading= "10" width="100%">
		<tr>
			<th>
				<img src="assets/logo_ruberi.png" width="67px" height="76px">
			</th>
			<td align="center">
			  	<p><b>RUMAH BELAJAR MEKARSARI (RUBERI)</b><br>Jl. Mekarsari RT/RW 04/02 Desa Ciwareng Kec. Babakan cikao Kab. Purwakarta<br> Telp/Hp. 0813-2130-2470</p>
			</td>
		</tr>
		<tr>
			<td colspan="2"><hr></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><p><b>KWITANSI TRANSAKSI PENDAFTARAN</b></p></td>
		</tr>
		<br><br>
		<tr>
		    <td>
				Kode Transaksi    <br> 
				Kode Siswa        <br>
	 			Nama              <br>
				Nominal           <br>
				Metode Pembayaran <br>
				Tanggal Bayar     
			</td>
		    <td>: <?= $data_tp['kd_transaksi_pendaftaran']; ?><br>: <?= $data_tp['kd_siswa']; ?><br>: <?= $data_tp['nama_lengkap']; ?><br>: Rp. <?= number_format($data_tp['biaya'], 0, ',', '.'); ?><br>: <?= $data_tp['metode_pembayaran']; ?><br>: <?php $tgl = date_create($data_tp['tgl_bayar']); echo date_format($tgl, 'd-m-Y'); ?></td>
        </tr>
		<tr>
			<td colspan="2"><br></td>
		</tr>
		<tr>
		    <td colspan="2"><br></td>
		</tr>
		<tr>
		    <td colspan="2"><br></td>
		</tr>
		<tr>
		    <td>( Bendahara )</td>
		    <td align="right">(...............................)</td>
		</tr>'
	</table>
</body>
</html>