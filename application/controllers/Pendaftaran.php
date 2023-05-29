<?php 

Class Pendaftaran Extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">Mohon maaf, silahkan login terlebih dahulu!</div>');
			redirect('auth');
		}elseif ($this->session->userdata('email') && $this->session->userdata('kd_siswa') && $this->session->userdata('kd_transaksi_pendaftaran') ) {
			redirect('user/user_in');
		}elseif (!$this->session->userdata('kd_transaksi_pendaftaran') && $this->session->userdata('email') && $this->session->userdata('kd_siswa') || $this->session->userdata('jenjang')) {
			$this->session->set_flashdata('message', '<div class=" alert alert-danger alert-dismissible fade show" role="alert" align="center">Maaf anda sudah daftar bimbel, silahkan melakukan pembayaran pendaftaran. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pembayaran_pendaftaran/transaksi');
		}elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
		}elseif ($this->session->userdata('level') == 'bendahara') {
			redirect('bendahara/dashboard');
		}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}			
	}
 
	public function pj(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

		// mengambil semua data jenis pendaftaran
		$this->load->model('Pendaftaran_model');
		$data['jenis'] = $this->Pendaftaran_model->jenistransaksi();

		$data['judul'] = "pilihan pendaftaran";
		// $this->load->view('templates/header', $data);
		$this->load->view('pendaftaran/pj', $data);
		// $this->load->view('templates/footer');
	}

	public function SD(){

					$kd_user = $this->session->userdata('kd_user');
					$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();	
						
					#kode siswa otomatis 
					$this->load->model('Kd_otomatis_model', 'kd_otomatis_siswa');
					$table = "t_siswa";
					$field = "kd_siswa";
					$lastkodes = $this->kd_otomatis_siswa->kode_otomatis_siswa($table, $field);		
					$noUruts = substr($lastkodes, 1, 3);				
					$noUruts +=1;						
					$strs = 'R';
					$data['newkodes'] = $strs . sprintf('%03s', $noUruts);
						
					// mengambil data user dari session saat login berdasarkan email
					$data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
					$data['jenis'] = "SD";

					$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Silahkan mengisi Formulir Pendaftaran Siswa Baru dengan data yang sebenar-benarnya.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					$data['judul'] = "pendaftaran SD";
					$this->load->view('pendaftaran/SD', $data);

			if (isset($_POST['submit'])) {
				$this->load->model('User_model');
				 	$this->User_model->tambahsiswaSD();

				 	$data = ['jenjang' => $this->input->post('jenjang'),
							'kd_siswa' => $this->input->post('kd_siswa')];
					$this->session->set_userdata($data);

					$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Terima kasih sudah mendaftar di Rumah Belajar Mekarsari, silahkan melakukan pembayaran pendaftaran.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pembayaran_pendaftaran/transaksi');
			}
					
	}

		public function SMP(){
			
					$kd_user = $this->session->userdata('kd_user');
					$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();		
					#kode siswa otomatis 
					$this->load->model('Kd_otomatis_model', 'kd_otomatis_siswa');
					$table = "t_siswa";
					$field = "kd_siswa";
					$lastkodes = $this->kd_otomatis_siswa->kode_otomatis_siswa($table, $field);		
					$noUruts = substr($lastkodes, 1, 3);				
					$noUruts +=1;						
					$strs = 'R';
					$data['newkodes'] = $strs . sprintf('%03s', $noUruts);
						
					// mengambil data user dari session saat login berdasarkan email
					$data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
					$data['jenis'] = "SMP";

					$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Silahkan mengisi Formulir Pendaftaran Siswa Baru dengan data yang sebenar-benarnya.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					$data['judul'] = "pendaftaran SMP";
					$this->load->view('pendaftaran/SMP', $data);

			if (isset($_POST['submit'])) {
				$this->load->model('User_model');
				 	$this->User_model->tambahsiswaSMP();

				 	$data = ['jenjang' => $this->input->post('jenjang'),
							'kd_siswa' => $this->input->post('kd_siswa')];
					$this->session->set_userdata($data);

					$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Terima kasih sudah mendaftar di Rumah Belajar Mekarsari, silahkan melakukan pembayaran pendaftaran.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pembayaran_pendaftaran/transaksi');
			}
					
	}

	public function SMA(){
				$kd_user = $this->session->userdata('kd_user');
					$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();		
					#kode siswa otomatis 
					$this->load->model('Kd_otomatis_model', 'kd_otomatis_siswa');
					$table = "t_siswa";
					$field = "kd_siswa";
					$lastkodes = $this->kd_otomatis_siswa->kode_otomatis_siswa($table, $field);		
					$noUruts = substr($lastkodes, 1, 3);				
					$noUruts +=1;						
					$strs = 'R';
					$data['newkodes'] = $strs . sprintf('%03s', $noUruts);
						
					// mengambil data user dari session saat login berdasarkan email
					$data['user'] = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
					$data['jenis'] = "SMA";

					$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Silahkan mengisi Formulir Pendaftaran Siswa Baru dengan data yang sebenar-benarnya.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					$data['judul'] = "pendaftaran SMA";
					$this->load->view('pendaftaran/SMA', $data);

			if (isset($_POST['submit'])) {
				$this->load->model('User_model');
				 	$this->User_model->tambahsiswaSMA();

				 	$data = ['jenjang' => $this->input->post('jenjang'),
							'kd_siswa' => $this->input->post('kd_siswa')];
					$this->session->set_userdata($data);

					$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Terima kasih sudah mendaftar di Rumah Belajar Mekarsari, silahkan melakukan pembayaran pendaftaran.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pembayaran_pendaftaran/transaksi');
			}
	}
}