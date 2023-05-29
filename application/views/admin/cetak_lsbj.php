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
        <hr><h4 align="center">LAPORAN DATA SISWA BERDASARKAN JENJANG</h4><br>
     
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
          <?php $no=0; foreach ($data_siswa_SD as $dsd) { ?>
            <tr>
                
                <td class="text-center"><?= ++$no; ?></td>
                <td><?= $dsd['kd_siswa']; ?></td>
                <td><?= $dsd['nama_lengkap']; ?></td>
                <td><img width="50" src="<?= base_url('assets/photo/') . $dsd['photo'];  ?> "></td>
                <td><?= $dsd['jenis_kelamin']; ?></td>
                <td><?= $dsd['tempat_lahir']; ?>, <?= $dsd['tgl_lahir']; ?></td>
                <td><?= $dsd['agama']; ?></td>
                <td><?= $dsd['jenjang']; ?></td>
                <td><?= $dsd['kelas']; ?></td>
                <td><?= $dsd['sekolah']; ?></td>
                <td><?= $dsd['alamat']; ?></td>
                <td><?= $dsd['nama_ibu']; ?></td>
                <td><?= $dsd['telp_ibu']; ?></td>
                <td><?= $dsd['pekerjaan_ibu']; ?></td>
                <td><?= $dsd['nama_ayah']; ?></td>
                <td><?= $dsd['telp_ayah']; ?></td>
                <td><?= $dsd['pekerjaan_ayah']; ?></td>
               <td><?php $tgl = date_create($dsd['tgl_daftar']); echo date_format($tgl, 'd-m-Y'); ?></td>
               
            </tr>
            <?php } ?>

            <?php foreach ($data_siswa_SMP as $dsmp) { ?>
            <tr>
                
                <td class="text-center"><?= ++$no; ?></td>
                <td><?= $dsmp['kd_siswa']; ?></td>
                <td><?= $dsmp['nama_lengkap']; ?></td>
                <td><img width="50" src="<?= base_url('assets/photo/') . $dsmp['photo'];  ?> "></td>
                <td><?= $dsmp['jenis_kelamin']; ?></td>
                <td><?= $dsmp['tempat_lahir']; ?>, <?= $dsmp['tgl_lahir']; ?></td>
                <td><?= $dsmp['agama']; ?></td>
                <td><?= $dsmp['jenjang']; ?></td>
                <td><?= $dsmp['kelas']; ?></td>
                <td><?= $dsmp['sekolah']; ?></td>
                <td><?= $dsmp['alamat']; ?></td>
                <td><?= $dsmp['nama_ibu']; ?></td>
                <td><?= $dsmp['telp_ibu']; ?></td>
                <td><?= $dsmp['pekerjaan_ibu']; ?></td>
                <td><?= $dsmp['nama_ayah']; ?></td>
                <td><?= $dsmp['telp_ayah']; ?></td>
                <td><?= $dsmp['pekerjaan_ayah']; ?></td>
               <td><?php $tgl = date_create($dsmp['tgl_daftar']); echo date_format($tgl, 'd-m-Y'); ?></td>
               
            </tr>
            <?php } ?>

             <?php foreach ($data_siswa_SMA as $dsma) { ?>
            <tr>
                
                <td class="text-center"><?= ++$no; ?></td>
                <td><?= $dsma['kd_siswa']; ?></td>
                <td><?= $dsma['nama_lengkap']; ?></td>
                <td><img width="50" src="<?= base_url('assets/photo/') . $dsma['photo'];  ?> "></td>
                <td><?= $dsma['jenis_kelamin']; ?></td>
                <td><?= $dsma['tempat_lahir']; ?>, <?= $dsma['tgl_lahir']; ?></td>
                <td><?= $dsma['agama']; ?></td>
                <td><?= $dsma['jenjang']; ?></td>
                <td><?= $dsma['kelas']; ?></td>
                <td><?= $dsma['sekolah']; ?></td>
                <td><?= $dsma['alamat']; ?></td>
                <td><?= $dsma['nama_ibu']; ?></td>
                <td><?= $dsma['telp_ibu']; ?></td>
                <td><?= $dsma['pekerjaan_ibu']; ?></td>
                <td><?= $dsma['nama_ayah']; ?></td>
                <td><?= $dsma['telp_ayah']; ?></td>
                <td><?= $dsma['pekerjaan_ayah']; ?></td>
                <td><?php $tgl = date_create($dsma['tgl_daftar']); echo date_format($tgl, 'd-m-Y'); ?></td>
               
            </tr>
            <?php } ?>
          </tbody>
</table>
<p>Dicetak Pada Tanggal: <?= $waktu; ?></p>
<p>Dicetak Oleh: <?= $username; ?></p>

</body>
</html>