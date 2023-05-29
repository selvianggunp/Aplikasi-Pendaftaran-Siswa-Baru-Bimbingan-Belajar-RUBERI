<?php 
/**
 * 
 */
class Bendahara extends CI_Controller
{

	function __construct(){
	parent::__construct();
	
	if (!$this->session->userdata('email')){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">maaf anda belum login!</div>');
			redirect('auth');
		}elseif ($this->session->userdata('level') == 'user' && !$this->session->userdata('kd_siswa')) {
			redirect('userhome/index');
		}elseif ($this->session->userdata('level') == 'user') {
			redirect('user/user_in');
		}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
		}	
	}
	 
	public function dashboard()
	{
		$this->load->model('Admin_model');
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		$data['total_siswa'] = $this->Admin_model->hitung_seluruh_siswa();

		$data['SD'] = $this->Admin_model->hitung_siswa_SD();
		$data['SMP'] = $this->Admin_model->hitung_siswa_SMP();
		$data['SMA'] = $this->Admin_model->hitung_siswa_SMA();

		$data['judul'] = "Dashboard - RUBERI";
		$this->load->view('bendahara/dashboard', $data);
	}

	public function data_jenis_pendaftaran(){
	$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$data['judul'] = "Data jenis pendaftaran - RUBERI";
		$this->load->view('bendahara/data_jenis_pendaftaran', $data);
	}

	public function data_jenis_SPP(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$data['judul'] = "Data jenis SPP - RUBERI";
		$this->load->view('bendahara/data_jenis_SPP', $data);
	}

	public function data_user(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$data['judul'] = "Data User - RUBERI";
		$this->load->view('bendahara/data_user', $data);
	}

	public function data_siswa(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$data['judul'] = "Data Siswa - RUBERI";
		$this->load->view('bendahara/data_siswa', $data);
	}

	public function data_transaksi_pendaftaran(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		$this->load->model('Admin_model');
		$data['data_transaksi_pendaftaran'] = $this->Admin_model->data_transaksi_pendaftaran();

		$data['judul'] = "Data Transaksi Pendaftaran - RUBERI";
		$this->load->view('bendahara/data_transaksi_pendaftaran', $data);
	}

	public function transaksi_pendaftaran($kd){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		// mengambil data transaksi berdasarkan kode user dipilih
		$this->load->model('Admin_model');
		$data['data_transaksi_pendaftaran_bk'] = $this->Admin_model->data_transaksi_pendaftaran_bk($kd);

		// mengambil data siswa berdasarkan kode user
		$data_transaksi_pendaftaran_bk = $data['data_transaksi_pendaftaran_bk'];
		$data['data_siswa_bku'] = $this->db->get_where('t_siswa', ['kd_user' => $data_transaksi_pendaftaran_bk['kd_user']])->row_array();

		// mengambil data jenis pendaftaran berdasarkan jenjang dari data siswa
		$data_siswa_bku = $data['data_siswa_bku'];
		$data['data_jenis_pendaftaran_bkj'] = $this->db->get_where('t_jenis_pendaftaran', ['jenjang' => $data_siswa_bku['jenjang']])->row_array();

		$data['judul'] = "Transaksi Pendaftaran - RUBERI";
		$this->load->view('bendahara/transaksi_pendaftaran', $data);

		if (isset($_POST['submit'])) {
			$this->load->model('Admin_model');
			$this->Admin_model->update_dtp();

			$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Data transakasi berhasil di edit, silahkan cetak kwitansi! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('bendahara/data_transaksi_pendaftaran');
		} 
	}

	public function detail_transaksi_pendaftaran($id){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('Admin_model');
		$data['detail_pendaftaran'] = $this->Admin_model->detail_pendaftaran($id);
		// var_dump($data['detail_siswa']); die;

		$data['judul'] = "Detail Transaksi Pendaftaran - RUBERI";
		$this->load->view('bendahara/detail_transaksi_pendaftaran', $data);
	}

	public function tambah_dtspp_pks(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa();
		$data['judul'] = "Pilih Kode Siswa";
		$this->load->view('bendahara/tambah_dtspp_pks', $data);
	}

	public function tambah_dtspp($kd){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		$this->load->model('Kd_otomatis_model', 'kd_otomatis_trs');
		$table = "t_detail_transaksi_spp";
		$field = "kd_transaksi_spp";
		$lastkode_trs = $this->kd_otomatis_trs->kode_otomatis_trs($table, $field);
		$noUrut_trs = substr($lastkode_trs, 3, 9);
		$noUrut_trs +=1;
		$str_trs = 'TRS';
		$data['newkode_trs'] = $str_trs . sprintf('%04s', $noUrut_trs);	

		$this->load->model('Admin_model');
		$data['data'] = $this->Admin_model->data_siswa_n_djspp($kd);

		$data['judul'] = "Tambah Data Transaksi SPP";
		$this->load->view('bendahara/tambah_dtspp', $data);

		if (isset($_POST['submit'])) {
			$this->load->model('Admin_model');
			$this->Admin_model->tambah_dtspp();
			
			$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">silahkan cetak kwitansi transaksi SPP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('bendahara/data_transaksi_SPP'); 
		} 
	}
	
	public function data_transaksi_SPP(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('Admin_model');
		$data['data_transaksi_SPP'] = $this->Admin_model->data_transaksi_SPP();
		
		$data['judul'] = "Data Transaksi SPP - RUBERI";
		$this->load->view('bendahara/data_transaksi_spp', $data);
	}

	public function transaksi_SPP($kd){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		// mengambil data transaksi berdasarkan kode user dipilih
		$this->load->model('Admin_model');
		$data['data_transaksi_spp_bk'] = $this->Admin_model->data_transaksi_spp_bk($kd);
		
		// mengambil data siswa berdasarkan kode user
		$data_transaksi_spp_bk = $data['data_transaksi_spp_bk'];
		$data['data_siswa_bku'] = $this->db->get_where('t_siswa', ['kd_user' => $data_transaksi_spp_bk['kd_user']])->row_array();

		// mengambil data jenis pendafraran berdasarkan jenjang
		$data_siswa_bku = $data['data_siswa_bku'];
		$data['data_jenis_spp_bkj'] = $this->db->get_where('t_jenis_spp', ['jenjang' => $data_siswa_bku['jenjang']])->row_array();


		$data['judul'] = "Transaksi SPP - RUBERI";
		$this->load->view('admin/transaksi_SPP', $data);
		if (isset($_POST['submit'])) {
			$this->Admin_model->update_dtspp();

			$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">silahkan cetak kwitansi transaksi SPP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('bendahara/data_transaksi_SPP'); 
		} 
	
	}

	public function detail_transaksi_spp($id){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('Admin_model');
		$data['detail_spp'] = $this->Admin_model->detail_spp($id);
		// var_dump($data['detail_spp']); die;

		$data['judul'] = "Detail Transakasi SPP - RUBERI";
		$this->load->view('bendahara/detail_spp', $data);
	}

	public function total_jumlah_siswa(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa();

		$data['total_siswa'] = $this->Admin_model->hitung_seluruh_siswa();
		$data['SD'] = $this->Admin_model->hitung_siswa_SD();
		$data['SMP'] = $this->Admin_model->hitung_siswa_SMP();
		$data['SMA'] = $this->Admin_model->hitung_siswa_SMA();

		$data['judul'] = "Total Jumlah Siswa - RUBERI";
		$this->load->view('bendahara/total_jumlah_siswa', $data);
	}

	public function jumlah_siswa_sd(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa_SD();

		$data['total_siswa'] = $this->Admin_model->hitung_seluruh_siswa();
		$data['SD'] = $this->Admin_model->hitung_siswa_SD();
		$data['SMP'] = $this->Admin_model->hitung_siswa_SMP();
		$data['SMA'] = $this->Admin_model->hitung_siswa_SMA();

		$data['judul'] = "Jumlah Siswa SD- RUBERI";
		$this->load->view('bendahara/jumlah_siswa_sd', $data);
	}

	public function jumlah_siswa_smp(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa_SMP();

		$data['total_siswa'] = $this->Admin_model->hitung_seluruh_siswa();
		$data['SD'] = $this->Admin_model->hitung_siswa_SD();
		$data['SMP'] = $this->Admin_model->hitung_siswa_SMP();
		$data['SMA'] = $this->Admin_model->hitung_siswa_SMA();

		$data['judul'] = "Jumlah Siswa SMP- RUBERI";
		$this->load->view('bendahara/jumlah_siswa_smp', $data);
	}

	public function jumlah_siswa_sma(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa_SMA();

		$data['total_siswa'] = $this->Admin_model->hitung_seluruh_siswa();
		$data['SD'] = $this->Admin_model->hitung_siswa_SD();
		$data['SMP'] = $this->Admin_model->hitung_siswa_SMP();
		$data['SMA'] = $this->Admin_model->hitung_siswa_SMA();

		$data['judul'] = "Jumlah Siswa SMA- RUBERI";
		$this->load->view('bendahara/jumlah_siswa_sma', $data);
	}

		public function edit_akun($id){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		$this->load->model('Admin_model');
		$data['akun'] = $this->Admin_model->akun($id);

		$data['judul'] = "Edit Akun - RUBERI";
		$this->load->view('bendahara/edit_akun', $data);

		if (isset($_POST['submit'])) {
		$kd_user = $this->input->post('kd_user');
		$username = $this->input->post('username');
		$photo = $_FILES['photo'];
		$email = $this->input->post('email');
	
		if ($photo){
        		$config['allowed_types'] = 'gip|jpg|png';
        		$config['max_size'] = '1024';
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
    				$image_old = $data['akun']['photo'];
    				$this->db->set('photo', $image_old);
    			}		
     		}

     		$this->db->set('email', $email);
     		$this->db->set('username', $username);
     		$this->db->where('kd_user', $kd_user);
     		$this->db->update('t_user');

			$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Akun berhasil di edit. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('bendahara/dashboard'); 
		}
	}

	public function ganti_password(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		
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
			$this->load->view('bendahara/ganti_password', $data);
		}else{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			// var_dump($password_lama); var_dump($password_baru); die;
			if (!password_verify($password_lama, $data['data_user']['password'])) {
				$this->session->set_flashdata('message', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Password lama salah. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('bendahara/ganti_password'); 
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Password baru tidak boleh sama dengan password lama. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('bendahara/ganti_password'); 
				} else {
				
						$this->load->model('Admin_model');
						$this->Admin_model->ganti_password();
						$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Password berhasil diganti. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('bendahara/ganti_password');				
				}
			  }	
		}
	}
}