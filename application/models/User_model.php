<?php 
/**
 * 
 */
class User_model extends CI_Model
{
	 
	public function tambahsiswaSD()
	{

		$kd_siswa = $this->input->post('kd_siswa'); 
		$kd_user = $this->input->post('kd_user'); 
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tanggal');
		$jk = $this->input->post('jk');
		$agama = $this->input->post('agama');
		$jenjang = $this->input->post('jenjang');
		$kelas = $this->input->post('kelas');
		$sekolah = $this->input->post('sekolah');
		$alamat = $this->input->post('alamat');
		$nama_ayah = $this->input->post('nama_ayah');
		$telp_ayah = $this->input->post('telp_ayah');
		$pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
		$nama_ibu =  $this->input->post('nama_ibu');
		$telp_ibu =  $this->input->post('telp_ibu');
		$pekerjaan_ibu =  $this->input->post('pekerjaan_ibu');
		$photo = $_FILES['photo'];

        if ($photo) {
	        	$config['allowed_types'] = 'gip|jpg|png';
	        	$config['max_size']      = '2048';
	        	$config['remmove_space'] = TRUE;
				$config['overwrite']     = TRUE;
				$config['max_width']     = 113.386;
	            $config['max_height']    = 151.181;
				$config['upload_path']   = FCPATH.'image';
	        	$config['upload_path']   = './assets/photo/';
	        	
	        	$this->load->library('upload');
	   			$this->upload->initialize($config);
	   			if ($this->upload->do_upload('photo')) {
	   			
	   			$image = $this->upload->data('file_name');

	   		}else{
	   			$this->session->set_flashdata('msg', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Upload pas foto gagal! dimensi ukuran (lebar dan tinggi) pas foto tidak sesuai yang ditentukan atau ukuran file pas foto melebihi 2MB atau format tidak sesuai yang di tentukan, Silahkan upload ulang pas photo dan mengisi ulang formulir.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pendaftaran/SD');
	   		}	
   		}   				
	
		$datasiswa = [
        "kd_siswa" => $kd_siswa,
        "kd_user" => $kd_user,
        "nama_lengkap" => $nama,
        'photo' => $image,
        "jenis_kelamin" => $jk,
        "tgl_lahir" => $tgl_lahir,
        "tempat_lahir" => $tempat_lahir,
        "agama" => $agama,
        "jenjang" => $jenjang,
        "kelas" => $kelas,
        "sekolah" => $sekolah,
        "alamat" => $alamat,
        "nama_ayah" => $nama_ayah,
        "telp_ayah" => $telp_ayah,
        "pekerjaan_ayah" => $pekerjaan_ayah,
        "nama_ibu" => $nama_ibu,
        "telp_ibu" => $telp_ibu,
        "pekerjaan_ibu" => $pekerjaan_ibu,
        "tgl_daftar" => date("Y-m-d")
		];

		$this->db->insert('t_siswa', $datasiswa);
	    
	}

	public function tambahsiswaSMP()
	{

		$kd_siswa = $this->input->post('kd_siswa'); 
		$kd_user = $this->input->post('kd_user'); 
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tanggal');
		$jk = $this->input->post('jk');
		$agama = $this->input->post('agama');
		$jenjang = $this->input->post('jenjang');
		$kelas = $this->input->post('kelas');
		$sekolah = $this->input->post('sekolah');
		$alamat = $this->input->post('alamat');
		$nama_ayah = $this->input->post('nama_ayah');
		$telp_ayah = $this->input->post('telp_ayah');
		$pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
		$nama_ibu =  $this->input->post('nama_ibu');
		$telp_ibu =  $this->input->post('telp_ibu');
		$pekerjaan_ibu =  $this->input->post('pekerjaan_ibu');
		$photo = $_FILES['photo'];

        if ($photo) {
	        	$config['allowed_types'] = 'gip|jpg|png';
	        	$config['max_size']      = '2048';
	        	$confg['remmove_space']  = TRUE;
				$confg['overwrite']      = TRUE;
				$config['max_width']     = 113.386;
	            $config['max_height']    = 151.181;
				$config['upload_path']   = FCPATH.'image';
	        	$config['upload_path']   = './assets/photo/';
	        	
	        	$this->load->library('upload');
	   			$this->upload->initialize($config);
	   			if ($this->upload->do_upload('photo')) {
	   			
	   			$image = $this->upload->data('file_name');

	   		}else{
	   			$this->session->set_flashdata('msg', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Upload pas foto gagal! dimensi ukuran (lebar dan tinggi) pas foto tidak sesuai yang ditentukan atau ukuran file pas foto melebihi 2MB atau format tidak sesuai yang di tentukan, Silahkan upload ulang pas photo dan mengisi ulang formulir.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pendaftaran/SMP');
	   		}	
   		}   				
	
		$datasiswa = [
        "kd_siswa" => $kd_siswa,
        "kd_user" => $kd_user,
        "nama_lengkap" => $nama,
        'photo' => $image,
        "jenis_kelamin" => $jk,
        "tgl_lahir" => $tgl_lahir,
        "tempat_lahir" => $tempat_lahir,
        "agama" => $agama,
        "jenjang" => $jenjang,
        "kelas" => $kelas,
        "sekolah" => $sekolah,
        "alamat" => $alamat,
        "nama_ayah" => $nama_ayah,
        "telp_ayah" => $telp_ayah,
        "pekerjaan_ayah" => $pekerjaan_ayah,
        "nama_ibu" => $nama_ibu,
        "telp_ibu" => $telp_ibu,
        "pekerjaan_ibu" => $pekerjaan_ibu,
        "tgl_daftar" => date("Y-m-d")
		];

		$this->db->insert('t_siswa', $datasiswa);
	    
	}

	public function tambahsiswaSMA()
	{

		$kd_siswa = $this->input->post('kd_siswa'); 
		$kd_user = $this->input->post('kd_user'); 
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tanggal');
		$jk = $this->input->post('jk');
		$agama = $this->input->post('agama');
		$jenjang = $this->input->post('jenjang');
		$kelas = $this->input->post('kelas');
		$sekolah = $this->input->post('sekolah');
		$alamat = $this->input->post('alamat');
		$nama_ayah = $this->input->post('nama_ayah');
		$telp_ayah = $this->input->post('telp_ayah');
		$pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
		$nama_ibu =  $this->input->post('nama_ibu');
		$telp_ibu =  $this->input->post('telp_ibu');
		$pekerjaan_ibu =  $this->input->post('pekerjaan_ibu');
		$photo = $_FILES['photo'];

        if ($photo) {
	        	$config['allowed_types'] = 'gip|jpg|png';
	        	$config['max_size']      = '2048';
	        	$confg['remmove_space']  = TRUE;
				$confg['overwrite']      = TRUE;
				$config['max_width']     = 113.386;
	            $config['max_height']    = 151.181;
				$config['upload_path']   = FCPATH.'image';
	        	$config['upload_path']   = './assets/photo/';
	        	
	        	$this->load->library('upload');
	   			$this->upload->initialize($config);
	   			if ($this->upload->do_upload('photo')) {
	   			
	   			$image = $this->upload->data('file_name');

	   		}else{
	   			$this->session->set_flashdata('msg', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Upload pas foto gagal! dimensi ukuran (lebar dan tinggi) pas foto tidak sesuai yang ditentukan atau ukuran file pas foto melebihi 2MB atau format tidak sesuai yang di tentukan, Silahkan upload ulang pas photo dan mengisi ulang formulir.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pendaftaran/SMA');
	   		}	
   		}   				
	
		$datasiswa = [
        "kd_siswa" => $kd_siswa,
        "kd_user" => $kd_user,
        "nama_lengkap" => $nama,
        'photo' => $image,
        "jenis_kelamin" => $jk,
        "tgl_lahir" => $tgl_lahir,
        "tempat_lahir" => $tempat_lahir,
        "agama" => $agama,
        "jenjang" => $jenjang,
        "kelas" => $kelas,
        "sekolah" => $sekolah,
        "alamat" => $alamat,
        "nama_ayah" => $nama_ayah,
        "telp_ayah" => $telp_ayah,
        "pekerjaan_ayah" => $pekerjaan_ayah,
        "nama_ibu" => $nama_ibu,
        "telp_ibu" => $telp_ibu,
        "pekerjaan_ibu" => $pekerjaan_ibu,
        "tgl_daftar" => date("Y-m-d")
		];

		$this->db->insert('t_siswa', $datasiswa);
	    
	}


	public function transaksi_pendaftaran_transfer(){
		$kd_transaksi_daftar = $this->input->post('kd_transaksi_daftar');
		$kd_jenis_pendaftaran =  $this->input->post('kd_jenis_pendaftaran');
		$kd_user = $this->input->post('kd_user'); 
		$metode_pembayaran = "Transfer";
		$nama_bank = $this->input->post('nama_bank'); 
		$pemilik_rek =  $this->input->post('pemilik_rek'); 
		$no_rek =  $this->input->post('no_rek'); 
		$file_transfer = $_FILES['file_transfer'];
 
		  if ($file_transfer) {
	        	$config['allowed_types'] = 'gip|jpg|png';
	        	$config['max_size']      = '2048';
	        	$config['remmove_space']  = TRUE;
				$config['overwrite']      = TRUE;
	        	$config['upload_path']   = './assets/bukti_transfer_pendaftaran/';
	        	
	        	$this->load->library('upload');
	   			$this->upload->initialize($config);
	   			if ($this->upload->do_upload('file_transfer')) {
	   			
	   			$image = $this->upload->data('file_name');

	   		}else{
	   			$this->session->set_flashdata('message', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Upload bukti transfer gagal! ukuran file bukti transfer melebihi 2MB atau format gambar tidak sesuai yang ditentukan, Silahkan mengisi ulang form pembayaran pendaftaran.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pembayaran_pendaftaran/transfer');
	   		}	
   		}   				


     	$datatransaksipendaftaran = [
        "kd_transaksi_pendaftaran" => $kd_transaksi_daftar,
        "kd_jenis_pendaftaran" => $kd_jenis_pendaftaran,
        "kd_user" => $kd_user,
        "tgl_bayar" => date("Y-m-d"),
        "metode_pembayaran" => $metode_pembayaran,
        "nama_bank" => $nama_bank,
        "pemilik_rekening" => $pemilik_rek,
        "no_rekening" => $no_rek,
        "file_transfer" => $image,
        "status" => 'diterima'
		];
		// $this->db->query("INSERT INTO t_detail_transaksi_pendaftaran (kd_transaksi_pendaftaran, kd_jenis_pendaftaran, kd_user, tgl_bayar, metode_pembayaran, nama_bank, pemilik_rekening, no_rekening, file_transfer, status) VALUES ('$kd_transaksi_daftar', '$kd_jenis_pendaftaran', '$kd_user', '$metode_pembayaran', '$nama_bank', '$pemilik_rek', '$no_rek', '$image', '$status')");
		$this->db->insert('t_detail_transaksi_pendaftaran', $datatransaksipendaftaran);		
	}

	public function transaksi_pendaftaran_nontransfer(){
		$kd_transaksi_daftar = $this->input->post('kd_transaksi_pendaftaran');
		$kd_jenis_daftar = $this->input->post('kd_jenis_pendaftaran');
		$kd_user = $this->session->userdata('kd_user'); 
		$metode_pembayaran = "Non Transfer";
		$nama_bank = "TIDAK ADA";
		$pemilik_rek = "TIDAK ADA";
		$no_rek = "TIDAK ADA";
		$file_transfer = "TIDAK ADA";

		$datatransaksipendaftaran = [
        "kd_transaksi_pendaftaran" => $kd_transaksi_daftar,
        "kd_jenis_pendaftaran" => $kd_jenis_daftar,
        "kd_user" => $kd_user,
        "tgl_bayar" => date("Y-m-d"),
        "metode_pembayaran" => $metode_pembayaran,
        "nama_bank" => $nama_bank ,
        "pemilik_rekening" => $pemilik_rek,
        "no_rekening" => $no_rek,
        "file_transfer" => $file_transfer,
        "status" => 'diproses'
		];

 		$this->db->insert('t_detail_transaksi_pendaftaran', $datatransaksipendaftaran);
	}


	 public function transaksi_spp(){
	 	$kd_transaksi_spp = $this->input->post('kd_transaksi_spp');
		$kd_jenis_spp =  $this->input->post('kd_jenis_spp');
		$kd_user = $this->session->userdata('kd_user'); 
		$bulan = $this->input->post('bulan');
		$metode_pembayaran = "Transfer";
		$nama_bank = $this->input->post('nama_bank'); 
		$pemilik_rek =  $this->input->post('pemilik_rek'); 
		$no_rek =  $this->input->post('no_rek'); 
		$file_transfer = $_FILES['file_transfer'];

	   		 if ($file_transfer) {
	        	$config['allowed_types'] = 'gip|jpg|png';
	        	$config['max_size']      = '2048';
	        	$confg['remmove_space']  = TRUE;
				$confg['overwrite']      = TRUE;
	        	$config['upload_path']   = './assets/bukti_transfer_spp/';
	        	
	        	$this->load->library('upload');
	   			$this->upload->initialize($config);
	   			if ($this->upload->do_upload('file_transfer')) {
	   			
	   			$image = $this->upload->data('file_name');	
	   		}else{
	   			$this->session->set_flashdata('message', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Upload bukti transfer gagal! ukuran file bukti transfer melebihi 2MB atau format gambar tidak sesuai yang ditentukan silahkan mengisi ulang form pembayaran SPP.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('user/pembayaran_spp');
	   		}	
   		} 
   
     	$datatransaksispp = [
	        "kd_transaksi_SPP " => $kd_transaksi_spp,
	        "kd_jenis_SPP" => $kd_jenis_spp,
	        "kd_user" => $kd_user,
	        "tgl_bayar" => date("Y-m-d"),
	        "bulan" => $bulan,
	        "metode_pembayaran" => $metode_pembayaran,
	        "nama_bank" => $nama_bank ,
	        "pemilik_rekening" => $pemilik_rek,
	        "no_rekening" => $no_rek,
	        "file_transfer" => $image,
	        "status" => 'diterima'
		];

		$this->db->insert('t_detail_transaksi_spp', $datatransaksispp);
	 }

	 public function proses_edit_data_diri(){
	 	$kd_siswa = $this->input->post('kd_siswa');
	 	$nama_lengkap = $this->input->post('nama_lengkap'); 
	 	$jk = $this->input->post('jk');
	 	$tempat_lahir = $this->input->post('tempat_lahir');
	 	$tgl_lahir = $this->input->post('tgl_lahir'); 
	 	$agama = $this->input->post('agama'); 
	 	$sekolah = $this->input->post('sekolah'); 
	 	$alamat = $this->input->post('alamat'); 
	 	$nama_ibu = $this->input->post('nama_ibu'); 
	 	$telp_ibu = $this->input->post('telp_ibu'); 
	 	$pekerjaan_ibu = $this->input->post('pekerjaan_ibu'); 
	 	$nama_ayah = $this->input->post('nama_ayah'); 
	 	$telp_ayah = $this->input->post('telp_ayah'); 
	 	$pekerjaan_ayah = $this->input->post('pekerjaan_ayah'); 

	 	$this->db->set('nama_lengkap', $nama_lengkap);
	 	$this->db->set('tgl_lahir', $tgl_lahir);
	 	$this->db->set('tempat_lahir', $tempat_lahir);
	 	$this->db->set('agama', $agama);
	 	$this->db->set('sekolah', $sekolah);
	 	$this->db->set('alamat', $alamat);  
	 	$this->db->set('jenis_kelamin', $jk);
	 	$this->db->set('nama_ibu', $nama_ibu);
	 	$this->db->set('telp_ibu', $telp_ibu);
	 	$this->db->set('pekerjaan_ibu', $pekerjaan_ibu);
	 	$this->db->set('nama_ayah', $nama_ayah);
	 	$this->db->set('telp_ayah', $telp_ayah);
	 	$this->db->set('pekerjaan_ayah', $pekerjaan_ayah);

	 	$this->db->where('kd_siswa', $kd_siswa);
	 	$this->db->update('t_siswa');
	 }

	 public function info_data_transaksi_spp(){

		$kd_user = $this->session->userdata('kd_user');
		return $this->db->query("SELECT t_jenis_spp.kd_jenis_SPP, 
			t_jenis_spp.biaya, 
			t_detail_transaksi_spp.kd_jenis_spp, 
			t_detail_transaksi_spp.kd_transaksi_spp, 
			t_detail_transaksi_spp.tgl_bayar, 
			t_detail_transaksi_spp.bulan, 
			t_detail_transaksi_spp.metode_pembayaran, 
			t_detail_transaksi_spp.nama_bank, 
			t_detail_transaksi_spp.pemilik_rekening, 
			t_detail_transaksi_spp.no_rekening
			FROM t_detail_transaksi_spp 
			JOIN t_jenis_spp ON t_jenis_spp.kd_jenis_SPP = t_detail_transaksi_spp.kd_jenis_spp 
			WHERE kd_user = '$kd_user'")->result_array();
	 }

	 public function ubah_password(){
	 	$password_baru = $this->input->post('password_baru');
	 	$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
	 	$this->db->set('password', $password_hash);

	 	$this->db->where('email', $this->session->userdata('email'));
	 	$this->db->update('t_user');
	 }

	 public function akun_saya($id){
	 	return $this->db->query("SELECT * FROM t_user WHERE kd_user = '$id'")->row_array();
	 }

	 public function edit_akun_saya()
	 {
	 	$kd_user = $this->input->post('kd_user');
	 	$username = $this->input->post('username');
	 	$email = $this->input->post('email');
    
    	$this->db->query("UPDATE t_user SET username = '$username', email = '$email' WHERE kd_user = '$kd_user'");
	 }

	 public function detail_spp($id)
	 {
	 return $this->db->query("SELECT 
			t_detail_transaksi_spp.kd_transaksi_spp,
			t_jenis_spp.kd_jenis_spp, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_siswa.kd_user,  
			t_jenis_spp.biaya, 
			t_detail_transaksi_spp.bulan,
			t_detail_transaksi_spp.metode_pembayaran,
			t_detail_transaksi_spp.nama_bank,
			t_detail_transaksi_spp.pemilik_rekening,
			t_detail_transaksi_spp.no_rekening,
			t_detail_transaksi_spp.file_transfer,
			t_detail_transaksi_spp.tgl_bayar,
			t_detail_transaksi_spp.status FROM t_detail_transaksi_spp 
			JOIN t_siswa ON t_detail_transaksi_spp.kd_user = t_siswa.kd_user 
			JOIN t_jenis_spp ON t_detail_transaksi_spp.kd_jenis_spp = t_jenis_spp.kd_jenis_spp WHERE t_detail_transaksi_spp.kd_transaksi_spp =  '$id'")->row_array();
	 }
}