<?php 

/** 
 * 
 */
class Home extends CI_Controller
{
	function __construct(){
	parent::__construct();
	
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
	}
	
	public function index()
	{
		$data['judul'] = 'Beranda - RUBERI';
		// $this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		// $this->load->view('templates/footer');
	}


	public function cpbh()
	{
		$data['judul'] = 'Cara Pendaftaran Bimbel - RUBERI';
		$this->load->model('Admin_model');
		$data['data_jenis_pendaftaran'] = $this->Admin_model->data_jenis_pendaftaran();
		// $this->load->view('templates/header', $data);
		$this->load->view('bantuan/cpbh', $data);
		// $this->load->view('templates/footer');
	}

	public function cpspph()
	{
		$this->load->model('Admin_model');
		$data['data_jenis_SPP'] = $this->Admin_model->data_jenis_SPP();
		
		$data['judul'] = 'Cara Pembayaran SPP - RUBERI';
		// $this->load->view('templates/header', $data);
		$this->load->view('bantuan/cpspph', $data);
		// $this->load->view('templates/footer');
	}

	public function tentang_kami(){
		$data['judul'] = 'Tentang Kami - RUBERI';
		// $this->load->view('templates/header', $data);
		$this->load->view('bantuan/kontak_kami', $data);
		// $this->load->view('templates/footer');
	}
}