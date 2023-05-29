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
  <hr><h4 align="center">LAPORAN DATA SELURUH SISWA SMP</h4><br>
     
<table>
     <thead>
            <tr>
              <th  class="text-center">No</th>
              <th>Kode Siswa</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Agama</th>
              <th>Jenjang</th>
              <th>Kelas</th>
              <th>Sekolah</th>
              <th>Alamat</th>
              <th>Nama Ibu </th>
              <th>Telp Ibu</th>
              <th>Pekerjaan Ibu</th>
              <th>Nama Ayah </th>
              <th>Telp Ayah</th>
              <th>Pekerjaan Ayah</th>
              <th>tgl daftar</th>
             
            </tr>
          </thead>
          <tbody>
          <?php $no=0; foreach ($data_siswa as $ds) { ?>
            <tr>
                
                <td class="text-center"><?= ++$no; ?></td>
                <td><?= $ds['kd_siswa']; ?></td>
                <td><?= $ds['nama_lengkap']; ?></td>
                <td><img width="50" src="<?= base_url('assets/photo/') . $ds['photo'];  ?> "></td>
                <td><?= $ds['jenis_kelamin']; ?></td>
                <td><?= $ds['tempat_lahir']; ?>, <?= $ds['tgl_lahir']; ?></td>
                <td><?= $ds['agama']; ?></td>
                <td><?= $ds['jenjang']; ?></td>
                <td><?= $ds['kelas']; ?></td>
                <td><?= $ds['sekolah']; ?></td>
                <td><?= $ds['alamat']; ?></td>
                <td><?= $ds['nama_ibu']; ?></td>
                <td><?= $ds['telp_ibu']; ?></td>
                <td><?= $ds['pekerjaan_ibu']; ?></td>
                <td><?= $ds['nama_ayah']; ?></td>
                <td><?= $ds['telp_ayah']; ?></td>
                <td><?= $ds['pekerjaan_ayah']; ?></td>
                <td><?php $tgl = date_create($ds['tgl_daftar']); echo date_format($tgl, 'd-m-Y'); ?></td>
            </tr>
            <?php } ?>
          </tbody>
</table>
<p>Dicetak Pada Tanggal: <?= $waktu; ?></p>
<p>Dicetak Oleh: <?= $username; ?></p>

</body>
</html>