<?php

/**
 * 
 */
class Cetak extends CI_Controller
{

	function __construct(){
	parent::__construct();
	require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
	require_once APPPATH.'third_party/fpdf/fpdf.php';
	if (!$this->session->userdata('email')){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" align="center">maaf anda belum login!</div>');
			redirect('auth');
		}elseif ($this->session->userdata('level') == 'siswa' && !$this->session->userdata('kd_siswa')) {
			redirect('userhome/index');
		}elseif ($this->session->userdata('level') == 'siswa') {
			redirect('user/user_in');
		}	
	}

	public function pdf_lss(){
		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa();

		$data['judul'] = "Laporan Seluruh Siswa";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage('L');

		$html = $this->load->view('admin/cetak_lss',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function pdf_lssd(){
		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa_SD();

		$data['judul'] = "Laporan Seluruh Siswa SD";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage('L');

		$html = $this->load->view('admin/cetak_laporan_siswa_sd',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function pdf_lssmp(){
		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa_SMP();

		$data['judul'] = "Laporan Seluruh Siswa SMP";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage('L');

		$html = $this->load->view('admin/cetak_laporan_siswa_smp',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function pdf_lssma(){
		$this->load->model('Admin_model');
		$data['data_siswa'] = $this->Admin_model->data_siswa_SMA();

		$data['judul'] = "Laporan Seluruh Siswa SMA";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage('L');

		$html = $this->load->view('admin/cetak_laporan_siswa_sma',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function pdf_lsbj(){
		$this->load->model('Admin_model');
		$data['data_siswa_SD'] = $this->Admin_model->data_siswa_SD();
		$data['data_siswa_SMP'] = $this->Admin_model->data_siswa_SMP();
		$data['data_siswa_SMA'] = $this->Admin_model->data_siswa_SMA();

		$data['judul'] = "Laporan Siswa Berdasarkan Jenjang";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');
		

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage('L');

		$html = $this->load->view('admin/cetak_lsbj',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function pdf_ldtp(){
		$this->load->model('Admin_model');
		$data['data_tp'] = $this->Admin_model->laporan_data_transaksi_Pendaftaran();
		
		$data['judul'] = "Laporan Data Transaksi Pendaftaran";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage('L');

		$html = $this->load->view('admin/cetak_ldtp',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function pdf_ldtspp(){
		$this->load->model('Admin_model');
		$data['data_tspp'] = $this->Admin_model->laporan_data_transaksi_SPP();		

		$data['judul'] = "Laporan Data Transaksi SPP";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage('L');

		$html = $this->load->view('admin/cetak_ldtspp',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function kartu_siswa($id){
		$this->load->model('Admin_model');
		$data_siswa = $this->Admin_model->kartu_siswa($id);
		
		$data['judul'] = "Kartu Siswa";
		$this->load->model('Admin_model');
		$data_siswa = $this->Admin_model->kartu_siswa($id);
		// var_dump($data_siswa); die;
		$username = $this->session->userdata('username');
		$waktu = date('d-m-yy');
		$dompdf = new Dompdf();
		$html = '<html>';
		$html .= '<title>Kartu Siswa</title> 	';
			
		$html .= '<table bgcolor="rgb(255, 204, 97)" width="385px" height="250px" cellpading= "10" width="100%">'.
				 

		$html .= '<tr>
				    <th align="center"><img src="assets/logo_ruberi.png" width="67px" height="76px">
				    </th>
				    <td align="center">
				    	<p><b> RUMAH BELAJAR MEKARSARI (RUBERI)</b></p>
				    </td>
				  </tr>
				  <tr><td colspan="2"><hr></td></tr>
				  <tr>
				  <th align="right"><img src="assets/photo/'.$data_siswa['photo'].'" width="82,624px" height="110,657px">
				  </th>
				  <th "><br><h2">KARTU SISWA</h2><br><h2>'.$data_siswa['nama_lengkap'].'<br>'. $data_siswa['kd_siswa']. "
				  </h2></th>	
				 </tr>";
		
		$html .= '</table></html>';

		$dompdf->load_html($html);
		// Setting ukuran dan orientasi kertas
		$dompdf->set_paper('A4', 'Portrait');
		// Rendering dari HTML Ke PDF
		$dompdf->render();
		// Melakukan output file Pdf
		$dompdf->stream('Kartu Siswa.pdf', array('Attachment'=>0));
	}

	public function kwitansi_tp($id){
		$this->load->model('Admin_model');
		$data['data_tp'] = $this->Admin_model->kwitansi_tp($id);
		
		$data['judul'] = "Kwitansi Transaksi Pendaftaran";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A5']);
		$mpdf->AddPage('P');

		$html = $this->load->view('admin/cetak_kwitansi_pendaftaran',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function kwitansi_tspp($id){
		$this->load->model('Admin_model');
		$data['data_tspp'] = $this->Admin_model->kwitansi_tspp($id);

		$data['judul'] = "Kwitansi Transaksi SPP";
		$data['username'] = $this->session->userdata('username');
		$data['waktu'] = date('d-m-yy');

		$mpdf = new \Mpdf\Mpdf(['format' => 'A5']);
		$mpdf->AddPage('P');

		$html = $this->load->view('admin/cetak_kwitansi_spp',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function rekap_data_ts(){

		if (isset($_POST['submit'])) {
			$this->load->model('Admin_model');
			$data['data_tspp'] = $this->Admin_model->rekap_data_ts();
			
			$data['bulan'] = $this->input->post('bulan');
			$data['tahun'] = $this->input->post('tahun');

			$data['judul'] = "Rekap Data";
			$data['username'] = $this->session->userdata('username');
			$data['waktu'] = date('d-m-yy');

			$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
			$mpdf->AddPage('L');

			$html = $this->load->view('admin/cetak_rekap_data_ts',$data,true);
			$mpdf->WriteHTML($html);
			$mpdf->Output();
		} 
	}


		public function rekap_data_pendaftaran(){
			if (isset($_POST['submit'])) {
				$this->load->model('Admin_model');
				$data['data_transaksi_pendaftaran'] = $this->Admin_model->rekap_data_pendaftaran();
				// var_dump($data['data_transaksi_pendaftaran']); die;
				
				// var_dump($data['data_tspp']); die;
				$data['bulan'] = $this->input->post('bulan');
				$data['tahun'] = $this->input->post('tahun');
				
				$data['judul'] = "Rekap Data";
				$data['username'] = $this->session->userdata('username');
				$data['waktu'] = date('d-m-yy');

				$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
				$mpdf->AddPage('L');

				$html = $this->load->view('admin/cetak_rekap_data_pendaftaran',$data,true);
				$mpdf->WriteHTML($html);
				$mpdf->Output();
			} 
		}
	
}