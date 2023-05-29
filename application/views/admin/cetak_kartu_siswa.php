<!DOCTYPE html>
<html>
<head>
	<title><?= $judul; ?></title>
</head>
<body>

<table bgcolor="rgb(255, 204, 97)" width="90px" height="90px" cellpading= "10" width="100%">
<tr>
	<th><img src="assets/logo_ruberi.png"></th>
	<th>
	  	<p> RUMAH BELAJAR MEKARSARI (RUBERI) <br> Jl. Mekarsari RT/RW 04/02 Desa Ciwareng Kec. Babakan cikao Kab. Purwakarta
 <br> Telp/Hp. 081321302470</p>
	</th>
</tr>
<tr>
    <th colspan="2" ><hr><br>
    	<h2>KARTU SISWA</h2><br><h2><?= $data_siswa['nama_lengkap'];?><br> <?= $data_siswa['kd_siswa']; ?>
    	</h2>
	</th>	
</tr>
</table>

</body>
</html>