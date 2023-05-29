<?php 
/**
 * 
 */
class Pembayaran_pendaftaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">maaf anda belum login!</div>');
			redirect('auth');
		}elseif ($this->session->userdata('email') && $this->session->userdata('kd_siswa') && $this->session->userdata('kd_transaksi_pendaftaran') ) {
			redirect('user/user_in');
		}elseif ($this->session->userdata('level') == 'bendahara') {
			redirect('bendahara/dashboard');
		}elseif ($this->session->userdata('level') == 'pimpinan') {
			redirect('pimpinan/dashboard');
		}elseif ($this->session->userdata('level') == 'admin') {
			redirect('admin/dashboard');
		}			
	}
	
	public function transfer(){
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		
		$data['data'] = $this->db->query("SELECT 
				t_siswa.kd_user, t_siswa.jenjang, t_jenis_pendaftaran.jenjang, t_jenis_pendaftaran.kd_jenis_pendaftaran, t_jenis_pendaftaran.biaya, t_siswa.nama_lengkap FROM t_siswa JOIN t_jenis_pendaftaran ON t_jenis_pendaftaran.jenjang = t_siswa.jenjang WHERE t_siswa.kd_user = '$kd_user'")->row_array();
			$data['kd_user'] = $this->session->userdata('kd_user');
			$jenjang = $this->session->userdata('jenjang');
			$data['data_jp'] = $this->db->query("SELECT * FROM t_jenis_pendaftaran WHERE jenjang = '$jenjang'")->row_array();

			$this->load->model('Kd_otomatis_model', 'kd_otomatis_trd');
			$table = "t_detail_transaksi_pendaftaran";
			$field = "kd_transaksi_pendaftaran";
			$lastkode_trd = $this->kd_otomatis_trd->kode_otomatis_trd($table, $field);
			$noUrut_trd = substr($lastkode_trd, 3, 9);
			$noUrut_trd +=1;
			$str_trd = 'TRD';
			$data['newkode_trd'] = $str_trd . sprintf('%04s', $noUrut_trd);	

 			$data['judul'] = 'pembayaran pendaftaran - ruberi';
			$this->load->view('Pendaftaran/pembayaran_pendaftaran_transfer', $data);	
						
			if (isset($_POST['submit'])) {
				
				
				$this->load->model('User_model');
				$this->User_model->transaksi_pendaftaran_transfer();

				$data = ['kd_transaksi_pendaftaran' => $this->input->post('kd_transaksi_daftar')];
				$this->session->set_userdata($data);
				
				$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">Terima kasih sudah mendaftar di bimbel kami. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('User/user_in');
			}	
	}

	public function nontransfer()
	{
			$kd_user = $this->session->userdata('kd_user');
			$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();

			$data['kd_user'] = $this->session->userdata('kd_user');	
			$data['data'] = $this->db->query("SELECT 
				t_siswa.kd_user, t_siswa.jenjang, t_jenis_pendaftaran.jenjang, t_jenis_pendaftaran.kd_jenis_pendaftaran, t_jenis_pendaftaran.biaya, t_siswa.nama_lengkap FROM t_siswa JOIN t_jenis_pendaftaran ON t_jenis_pendaftaran.jenjang = t_siswa.jenjang WHERE t_siswa.kd_user = '$kd_user'")->row_array();
	
			$this->load->model('Kd_otomatis_model', 'kd_otomatis_trd');
			$table = "t_detail_transaksi_pendaftaran";
			$field = "kd_transaksi_pendaftaran";
			$lastkode_trd = $this->kd_otomatis_trd->kode_otomatis_trd($table, $field);
			$noUrut_trd = substr($lastkode_trd, 3, 9);
			$noUrut_trd +=1;
			$str_trd = 'TRD'; 
			$data['newkode_trd'] = $str_trd . sprintf('%04s', $noUrut_trd);	

 			$data['judul'] = 'pembayaran pendaftaran - ruberi';
			$this->load->view('Pendaftaran/pembayaran_pendaftaran_nontransfer', $data);	
						
			if (isset($_POST['submit'])) {
				$data = ['kd_transaksi_pendaftaran' => $this->input->post('kd_transaksi_pendaftaran')];
					$this->session->set_userdata($data);

				$this->load->model('User_model');
				$this->User_model->transaksi_pendaftaran_nontransfer();
				
				$this->session->set_flashdata('message', '<div class=" alert alert-success alert-dismissible fade show" role="alert" align="center">terima kasih sudah mendaftar di bimbel kami, silahkan melakukan pembayaran pendaftaran dengan datang ke kantor kami. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('user/user_in'); 
			}	
	}

	public function transaksi()
	{	
		$kd_user = $this->session->userdata('kd_user');
		$data['data_user'] = $this->db->query("SELECT * FROM t_user WHERE kd_user = '$kd_user'")->row_array();
		
		$jenjang = $this->session->userdata('jenjang');
		$data['data_jp'] = $this->db->query("SELECT * FROM t_jenis_pendaftaran WHERE jenjang = '$jenjang'")->row_array();
		// var_dump($data['data_jp']); die;
		$data['judul'] = 'pembayaran pendaftaran - ruberi';
		$this->load->view('Pendaftaran/transaksi', $data);	
	}
}