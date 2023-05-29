<?php 

Class User Extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">maaf anda belum login!</div>');
			redirect('auth');
		 	
			}elseif (!$this->session->userdata('kd_siswa') && !$this->session->userdata('kd_transaksi_pendaftaran')) {
				redirect('userhome/index');
			}elseif ($this->session->userdata('level') == 'bendahara') {
			redirect('bendahara/dashboard');
			}	elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
			}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}		
	}

	public function user_in()
	{
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$data['judul'] = "Home - RUBERI";
		$data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/user_in', $data);
	}

	public function akun_saya(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		// mengambil data user dari session saat login berdasarkan email
		$data['user'] = $this->db->get_where('t_user', ['kd_user' => $this->session->userdata('kd_user')])->row_array();
		
		$data['judul'] = "Akun Saya - RUBERI";
		$this->load->view('user/akun_saya', $data);
	}

	public function edit_akun($id){
	$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('User_model');
		$data['akun_saya'] = $this->User_model->akun_saya($id);

		$data['judul'] = "Edit Akun - RUBERI";
		$this->load->view('user/edit_akun_saya', $data);

		if (isset($_POST['submit'])) {
		$kd_user = $this->input->post('kd_user');
		$username = $this->input->post('username');
		$photo = $_FILES['photo'];
		$email = $this->input->post('email');

		if ($photo){
        		$config['allowed_types'] = 'gip|jpg|png';
        		$config['max_size'] = '2048';
        		$config['upload_path'] = './assets/foto_user/';
   				$this->load->library('upload');
   				$this->upload->initialize($config);

   				if ($this->upload->do_upload('photo')) {
   					$old_image = $data['akun']['photo'];

   					if ($old_image != 'default.png') {
   						unlink(FCPATH . 'assets/foto_user/'. $old_image);
   					}
   					
   					$image = $this->upload->data('file_name');
   					$this->db->set('photo', $image);
    			}else{
    				$image_old = $data['akun_saya']['photo'];
    				$this->db->set('photo', $image_old);
    			}		
     		}

     		$this->db->set('email', $email);
     		$this->db->set('username', $username);
     		$this->db->where('kd_user', $kd_user);
     		$this->db->update('t_user');

			$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Akun berhasil di edit. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/user_in'); 
		}
	}

	public function info_data_diri()
	{
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		// mengambil data siswa berdasarkan kode user yg ada di session saat login
		$data['siswa'] = $this->db->get_where('t_siswa', ['kd_user' => $this->session->userdata('kd_user')])->row_array();

		$data['judul'] = "Info Data Diri - RUBERI";
		$this->load->view('user/info_data_diri', $data);
	}

	public function edit_data_diri(){
	$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$data['siswa'] = $this->db->get_where('t_siswa', ['kd_user' => $this->session->userdata('kd_user')])->row_array();
		$data['judul'] = "Edit Data Diri - RUBERI";
		$this->load->view('user/edit_data_diri', $data);
	}

	public function proses_edit_datadiri(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('User_model');
		$this->User_model->proses_edit_data_diri();
		
		$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Data diri berhasil di edit. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/info_data_diri'); 
	}

	public function detail_transaksi_spp($id){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('User_model');
		$data['detail_spp'] = $this->User_model->detail_spp($id);
		// var_dump($data['detail_spp']); die;

		$data['judul'] = "Detail Transakasi SPP - RUBERI";
		$this->load->view('user/detail_spp', $data);
	}

	public function pembayaran_spp()
	{
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		

		$kd_user = $this->session->userdata('kd_user');
		$data['data'] = $this->db->query("SELECT t_siswa.kd_user, t_user.kd_user, t_jenis_spp.kd_jenis_spp, t_jenis_spp.jenjang, t_jenis_spp.biaya FROM t_siswa JOIN t_user ON t_siswa.kd_user = t_user.kd_user JOIN t_jenis_spp ON t_jenis_spp.jenjang = t_siswa.jenjang WHERE t_siswa.kd_user = '$kd_user'")->row_array();
	
		
		// kode otomatis detail transaksi pendaftaran
		$this->load->model('Kd_otomatis_model', 'kd_otomatis_trs');
		$table = "t_detail_transaksi_spp";
		$field = "kd_transaksi_spp";
		$lastkode_trs = $this->kd_otomatis_trs->kode_otomatis_trs($table, $field);
		$noUrut_trs = substr($lastkode_trs, 3, 9);
		$noUrut_trs +=1;
		$str_trs = 'TRS';
		$data['newkode_trs'] = $str_trs . sprintf('%04s', $noUrut_trs);	

		$data['judul'] = "pembayaran SPP - RUBERI";
		$this->load->view('user/pembayaran_spp', $data);
	} 

	public function transaksi_spp(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		

		$this->load->model('User_model');
		$this->User_model->transaksi_spp();
		
		$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Terima kasih sudah membayar SPP bulan ini, silahkan mengambil kwitansi di bagian administrasi. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/info_pembayaran_spp'); 
	}
 

	public function info_pembayaran_spp(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		

		$this->load->model('User_model');
		$data['data_transaksi_spp'] = $this->User_model->info_data_transaksi_spp();
		// var_dump($data['data_transaksi_spp']); die;
		$data['judul'] = "Info pembayaran SPP - RUBERI";
		$this->load->view('user/info_pembayaran_spp', $data);
	}

	public function ganti_password(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		

		$user = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('password_lama', 'Password lama', 'required|trim', 
			['required' => 'password lama tidak boleh kosong']);
		$this->form_validation->set_rules('password_baru', 'Password baru', 'required|trim|min_length[6]|matches[konfirmasi_password]', 
			['required' => 'password baru tidak boleh kosong',
			'min_length' => 'minimal password 6 karakter',
			'matches' => 'password baru tidak sama dengan konfirmasi password'
			]);
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[password_baru]', 
			['required' => 'konfirmasi password tidak boleh kosong',
			'min_length' => 'minimal password 6 karakter',
			'matches' => 'konfirmasi password tidak sama dengan password baru']);
		
		if ($this->form_validation->run() ==  false) {
			$data['judul'] = "Ganti password";
			$this->load->view('user/ubah_password', $data);
		}else{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			// var_dump($password_lama); var_dump($password_baru); die;
			if (!password_verify($password_lama, $user['password'])) {
				$this->session->set_flashdata('message', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Password lama salah. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/ganti_password'); 
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Password baru tidak boleh sama dengan password lama. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('user/ganti_password'); 
				} else {
				
						$this->load->model('User_model');
						$this->User_model->ubah_password();
						$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Password berhasil diganti. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('user/ganti_password');				
				}
			  }	
		}
	}

	public function cpb(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		
		$this->load->model('Admin_model');
		$data['data_jenis_pendaftaran'] = $this->Admin_model->data_jenis_pendaftaran();
		$data['judul'] = "Cara pendaftaran Bimbel - RUBERI";
		$this->load->view('user/bantuan/cpb', $data);
	}

	public function cpspp(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		

		$this->load->model('Admin_model');
		$data['data_jenis_SPP'] = $this->Admin_model->data_jenis_SPP();

		$data['judul'] = "Cara pembayaran SPP - RUBERI";
		$this->load->view('user/bantuan/cpspp', $data);
	}

	public function tentang_kami(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		

		$data['judul'] = "Tentang Kami - RUBERI";
		$this->load->view('user/bantuan/kontak_kami', $data);
	}
}