<?php 

Class Auth Extends CI_Controller{


	public function index()
	{
		if ($this->session->userdata('level') == 'user' && $this->session->userdata('kd_siswa')) {
			redirect('userhome/index');
		}elseif ($this->session->userdata('level') == 'user') {
			redirect('user/user_in');
		}elseif ($this->session->userdata('level') == 'bendahara') {
			redirect('bendahara/dashboard');
		}elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
		}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
		 		'required' => 'E-mail belum di isi'
		 ]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
		 		'required' => 'Password belum di isi'
		]);

		if ($this->form_validation->run() ==  false) {
			$data['judul'] = 'login';
			// var_dump($this->session->userdata('kd_user'));
			// $this->load->view('templates/header', $data);
			$this->load->view('auth/login', $data);
			// $this->load->view('templates/footer');
		}else{
			$this->_login();
		}
	}

	public function _login()
	{
		if ($this->session->userdata('level') == 'user' && $this->session->serdata('kd_siswa')) {
			redirect('userhome/index');
		}elseif ($this->session->userdata('level') == 'user') {
			redirect('user/user_in');
		}elseif ($this->session->userdata('level') == 'bendahara') {
			redirect('bendahara/dashboard');
		}elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
		}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		
		$user = $this->db->query("SELECT * FROM t_user WHERE email = '$email'")->row_array();
		$kd_user = $user['kd_user'];
		$siswa = $this->db->get_where('t_siswa', ['kd_user' => $user['kd_user']])->row_array();
		$kd_tp = $this->db->query("SELECT * FROM t_detail_transaksi_pendaftaran WHERE t_detail_transaksi_pendaftaran.kd_user = '$kd_user'")->row_array();
		
	
		if ($user['kd_user']) {
			if ($user['email'] === $email) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'kd_user' => $user['kd_user'],
						'username' => $user['username'],
						'email' => $user['email'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					if ($user['level'] == "user") {
							$data = [
							'kd_siswa' => $siswa['kd_siswa'],
							'jenjang' => $siswa['jenjang'],
							'kd_transaksi_pendaftaran' => $kd_tp['kd_transaksi_pendaftaran']
						];
						$this->session->set_userdata($data);
						// var_dump($user); var_dump($siswa); var_dump($kd_tp); die; 
						if ($siswa && $kd_tp){
							redirect('User/user_in');
						}else{
							redirect('userhome');
						}
					}elseif ($user['level'] == "admin") {
						redirect('admin/dashboard');
					}elseif ($user['level'] == "bendahara") {
						redirect('bendahara/dashboard');
						// redirect('bendahara/dashboard');
					}elseif ($user['level'] == "pimpinan") {
						redirect('pimpinan/dashboard');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">Password yang anda masukan salah.</div>');
				redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">Email yang anda masukan salah.</div>');
				redirect('auth');
			}
		}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">Email yang anda masukan tidak ditemukan.</div>');
				redirect('auth');
		}
	}

	public function Daftar(){
		if ($this->session->userdata('level') == 'user' && $this->session->userdata('kd_siswa')) {
			redirect('userhome/index');
		}elseif ($this->session->userdata('level') == 'user') {
			redirect('user/user_in');
		}elseif ($this->session->userdata('level') == 'bendahara') {
			redirect('bendahara/dashboard');
		}elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
		}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim',[
				'required' => 'Username belum di isi'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[t_user.email]', [
			'required' => 'Email belum di isi',
				'is_unique' => 'email ini sudah terdaftar',
				'valid_email' => 'email tidak valid',
				'required' => 'email belum di isi'
		]);
		$this->form_validation->set_rules('password1', 'paswword', 'required|trim|min_length[6]|matches[password2]', [
		 		'matches' => 'password tidak sama!',
		 		'required' => 'Password belum di isi',
				'min_length' => 'Password min 6 karakter!'
		]);
		$this->form_validation->set_rules('password2', 'paswword', 'required|trim|min_length[6]|matches[password1]', [
		 		'matches' => 'password tidak sama!',
		 		'required' => 'Password belum di isi',
				'min_length' => 'Password min 6 karakter!'
		]);
		if ($this->form_validation->run() ==  false) {
			$this->load->model('Kd_otomatis_model', 'kd_otomatis');
					$table = "t_user";
				 	$field = "kd_user";
					$lastkode = $this->kd_otomatis->kode_otomatis($table, $field);
					$noUrut = substr($lastkode, 1, 3);
					$noUrut+=1;
					$str = 'U';
					$data['newkode'] = $str . sprintf('%03s', $noUrut);	
					
			$data['judul'] = 'registrasi - ruberi';		
			$this->load->view('auth/registrasi', $data);
		}else{
			$data = [
			"kd_user" => $this->input->post('kd_user', true),
	        "username" => htmlspecialchars($this->input->post('username', true)),
	        "email" => htmlspecialchars($this->input->post('email', true)),
	        "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
	        "token" => "TIDAK ADA",
	        "photo" => "default.png",
	        "level" => "user"
			];

			$this->db->insert('t_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" align="center">Selamat! Akun anda sudah terdaftar. Silahkan login!</div>');
				redirect('auth');
		}	
	}

	public function lupa_password(){
		if ($this->session->userdata('level') == 'user' && $this->session->userdata('kd_siswa')) {
			redirect('userhome/index');
		}elseif ($this->session->userdata('level') == 'user') {
			redirect('user/user_in');
		}elseif ($this->session->userdata('level') == 'bendahara') {
			redirect('bendahara/dashboard');
		}elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
		}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run() ==  false) {
			$data['judul'] =  "Lupa Password - RUBERI";
			$this->load->view('auth/lupa_password', $data);
		}else{
			$email = $this->input->post('email');
			$query = $this->db->query("select email, password from t_user where email ='$email'")->row_array();
			$user_email = $query['email'];
			
			if($email = $user_email){
				$token = base64_encode(random_bytes(32));
				
				$this->db->query("UPDATE t_user SET token = '$token' WHERE email = '$email'");
				// $this->send_email($token, 'forgot');
				$config = [
					'protocol'  => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_user' => 'rumahbelajarmekarsari@gmail.com',
					'smtp_pass' => '#Konstatinopel1543',
					'smtp_port' => 465,
					'mailtype'  => 'html',
					'charset'   => 'utf-8',
					'newline'   => "\r\n"
					];
						$this->load->library('email',$config);  
						$this->email->initialize($config);  //tambahkan baris ini

						$this->email->from('rumahbelajarmekarsari@gmail.com', 'RUBERI');
						$this->email->to($email);
						
						$this->email->subject('Reset Password');
						$this->email->message('Klik link ini untuk mereset password: <a href="'. base_url() .'auth/reset_password?email='. $email .'&token='. urlencode($token) .'">Reset Password</a>');
						
						$this->email->send();

						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" align="center">Silahkan cek email untuk mereset password!</div>');
						redirect('auth/lupa_password');

						}else{

						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">Email tidak terdaftar!</div>');
						redirect('auth/lupa_password');
			}	
		}
	}

	public function reset_password(){

		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->query("SELECT * FROM t_user WHERE email = '$email'")->row_array();
		if ($email == $user['email']) {
			if ($token == $user['token']) {
				$this->session->set_userdata('reset_email', $email);
				$this->ubah_password();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">Reset password gagal! Token salah!</div>');
				redirect('auth/lupa_password');
			}
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">Reset password gagal! Email tidak terdaftar.</div>');
				redirect('auth/lupa_password');
		}
		
	}

	public function ubah_password(){
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'paswword', 'required|trim|min_length[6]|matches[password2]', [
		 		'matches' => 'password tidak sama!',
		 		'required' => 'Password belum di isi',
				'min_length' => 'Password min 6 karakter!'
		]);
		$this->form_validation->set_rules('password2', 'paswword', 'required|trim|min_length[6]|matches[password1]', [
		 		'matches' => 'password tidak sama!',
		 		'required' => 'Password belum di isi',
				'min_length' => 'Password min 6 karakter!'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] =  "Ubah Password - RUBERI";
			$this->load->view('auth/ubah_password', $data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);			
			$email = $this->session->userdata('reset_email');
			
			$this->db->query("UPDATE t_user SET password = '$password' WHERE email = '$email'");

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" align="center">Password berhasil di ubah! silahkan login.</div>');
				redirect('auth');
		}
	}

	public function logout(){
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('kd_siswa');
		$this->session->unset_userdata('kd_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('tgl_lahir');
		$this->session->unset_userdata('bulan_lahir');
		$this->session->unset_userdata('tahun_lahir');
		$this->session->unset_userdata('tempat_lahir');
		$this->session->unset_userdata('jk');
		$this->session->unset_userdata('agama');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('kelas');
		$this->session->unset_userdata('jenjang');
		$this->session->unset_userdata('sekolah');
		$this->session->unset_userdata('alamat');
		$this->session->unset_userdata('nama_ortu');
		$this->session->unset_userdata('telp');
		$this->session->unset_userdata('pekerjaan');
		$this->session->unset_userdata('tgl_daftar');
		$this->session->unset_userdata('kd_jenis_daftar');
		$this->session->unset_userdata('biaya');
		$this->session->unset_userdata('search_tspp');
		$this->session->unset_userdata('search_tp');
		$this->session->unset_userdata('search_siswa');
		$this->session->unset_userdata('search_user');
		$this->session->unset_userdata('kd_transaksi_pendaftaran');

		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" align="center">you have been logged out!</div>');
		redirect('home');
	}

}