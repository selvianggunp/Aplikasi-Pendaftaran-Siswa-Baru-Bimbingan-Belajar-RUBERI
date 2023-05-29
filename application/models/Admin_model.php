<?php
/**
 * 
 */
class Admin_model extends CI_Model
{
	
	public function hitung_seluruh_siswa(){
		return $this->db->get('t_siswa')->num_rows();
	}

	public function hitung_siswa_SD(){
		$query = $this->db->query('SELECT * FROM t_siswa WHERE jenjang = "SD"');
		$SD = $query->num_rows();
		return $SD;
	}

	public function hitung_siswa_SMP(){

		$query = $this->db->query('SELECT * FROM t_siswa WHERE jenjang = "SMP"');
		$SMP = $query->num_rows();
		return $SMP;
	}

	public function hitung_siswa_SMA(){

		$query = $this->db->query('SELECT * FROM t_siswa WHERE jenjang = "SMA"');
		$SMA = $query->num_rows();
		return $SMA;
	}

	public function data_siswa(){
		return $this->db->query('SELECT * FROM t_siswa')->result_array();
	}

	public function data_siswa_SD(){
		return $this->db->query("SELECT * FROM t_siswa WHERE jenjang = 'SD'")->result_array();
	}

	public function data_siswa_SMP(){
		return $this->db->query('SELECT * FROM t_siswa WHERE jenjang = "SMP"')->result_array();
	}

	public function data_siswa_SMA(){
		return $this->db->query('SELECT * FROM t_siswa WHERE jenjang = "SMA"')->result_array();
	}

	public function detail_siswa($id){
		return $this->db->query("SELECT * FROM t_siswa WHERE kd_siswa = '$id'")->row_array();
	}

	public function kartu_siswa($id){
		return $this->db->query("SELECT * FROM t_siswa WHERE kd_siswa = '$id'")->row_array();
	}

	public function data_user(){
		return $this->db->query('SELECT * FROM t_user')->result_array();
	}

	public function data_user_id($id){
		return $this->db->query("SELECT * FROM t_user WHERE kd_user = '$id'")->row_array();
	}

	public function edit_user(){
		$kd_user = $this->input->post('kd_user');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$level = $this->input->post('level');

	$this->db->query("UPDATE t_user SET username = '$username', email = '$email', level = '$level' WHERE kd_user = '$kd_user'");
	}

	public function hapus_data_user($id){
		return $this->db->query("DELETE FROM t_user WHERE kd_user = '$id'");
	}

	public function data_transaksi_pendaftaran(){
		return $this->db->query("SELECT 
			t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran, 
			t_jenis_pendaftaran.kd_jenis_pendaftaran, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_jenis_pendaftaran.biaya, 
			t_detail_transaksi_pendaftaran.metode_pembayaran, 
			t_detail_transaksi_pendaftaran.nama_bank,
			t_detail_transaksi_pendaftaran.pemilik_rekening,
			t_detail_transaksi_pendaftaran.no_rekening,
			t_detail_transaksi_pendaftaran.file_transfer,
			t_detail_transaksi_pendaftaran.tgl_bayar,
			t_detail_transaksi_pendaftaran.status
			FROM t_detail_transaksi_pendaftaran 
			JOIN t_siswa ON t_detail_transaksi_pendaftaran.kd_user = t_siswa.kd_user 
			JOIN t_jenis_pendaftaran ON t_detail_transaksi_pendaftaran.kd_jenis_pendaftaran = t_jenis_pendaftaran.kd_jenis_pendaftaran ORDER BY  t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran")->result_array();
	}

	public function detail_pendaftaran($id){
		return $this->db->query("SELECT 
			t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran, 
			t_jenis_pendaftaran.kd_jenis_pendaftaran, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_siswa.kd_user, 
			t_jenis_pendaftaran.biaya, 
			t_detail_transaksi_pendaftaran.metode_pembayaran, 
			t_detail_transaksi_pendaftaran.nama_bank,
			t_detail_transaksi_pendaftaran.pemilik_rekening,
			t_detail_transaksi_pendaftaran.no_rekening,
			t_detail_transaksi_pendaftaran.file_transfer,
			t_detail_transaksi_pendaftaran.tgl_bayar,
			t_detail_transaksi_pendaftaran.status
			FROM t_detail_transaksi_pendaftaran 
			JOIN t_siswa ON t_detail_transaksi_pendaftaran.kd_user = t_siswa.kd_user 
			JOIN t_jenis_pendaftaran ON t_detail_transaksi_pendaftaran.kd_jenis_pendaftaran = t_jenis_pendaftaran.kd_jenis_pendaftaran WHERE t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran = '$id'")->row_array();
	}

	public function laporan_data_transaksi_Pendaftaran(){
		return $this->db->query("SELECT 
			t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran, 
			t_jenis_pendaftaran.kd_jenis_pendaftaran, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_siswa.kelas, 
			t_siswa.sekolah, 
			t_jenis_pendaftaran.biaya, 
			t_detail_transaksi_pendaftaran.metode_pembayaran, 
			t_detail_transaksi_pendaftaran.tgl_bayar, 
			t_detail_transaksi_pendaftaran.nama_bank, 
			t_detail_transaksi_pendaftaran.pemilik_rekening, 
			t_detail_transaksi_pendaftaran.no_rekening,
			t_detail_transaksi_pendaftaran.status
			FROM t_detail_transaksi_pendaftaran 
			JOIN t_siswa ON t_detail_transaksi_pendaftaran.kd_user = t_siswa.kd_user 
			JOIN t_jenis_pendaftaran ON t_detail_transaksi_pendaftaran.kd_jenis_pendaftaran = t_jenis_pendaftaran.kd_jenis_pendaftaran")->result_array();
	}

	public function kwitansi_tp($id){
		return $this->db->query("SELECT 
			t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran, 
			t_jenis_pendaftaran.kd_jenis_pendaftaran, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_jenis_pendaftaran.biaya, 
			t_detail_transaksi_pendaftaran.metode_pembayaran, 
			t_detail_transaksi_pendaftaran.tgl_bayar 
			FROM t_detail_transaksi_pendaftaran 
			JOIN t_siswa ON t_detail_transaksi_pendaftaran.kd_user = t_siswa.kd_user 
			JOIN t_jenis_pendaftaran ON t_detail_transaksi_pendaftaran.kd_jenis_pendaftaran = t_jenis_pendaftaran.kd_jenis_pendaftaran 
			WHERE t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran = '$id'")->row_array();
		}

	public function data_transaksi_SPP(){
		return $this->db->query("SELECT 
			t_detail_transaksi_spp.kd_transaksi_spp,
			t_jenis_spp.kd_jenis_spp, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa,  
			t_siswa.kelas,
			t_jenis_spp.biaya, 
			t_detail_transaksi_spp.bulan,
			t_detail_transaksi_spp.metode_pembayaran,
			t_detail_transaksi_spp.nama_bank,
			t_detail_transaksi_spp.pemilik_rekening,
			t_detail_transaksi_spp.no_rekening,
			t_detail_transaksi_spp.file_transfer,
			t_detail_transaksi_spp.status,
			t_detail_transaksi_spp.tgl_bayar FROM t_detail_transaksi_spp JOIN t_siswa ON t_detail_transaksi_spp.kd_user = t_siswa.kd_user JOIN t_jenis_spp ON t_detail_transaksi_spp.kd_jenis_spp = t_jenis_spp.kd_jenis_spp ORDER BY t_detail_transaksi_spp.kd_transaksi_spp
			")->result_array();
	}

	public function laporan_data_transaksi_SPP(){
		return $this->db->query("SELECT 
			t_detail_transaksi_spp.kd_transaksi_spp, 
			t_jenis_spp.kd_jenis_spp, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_siswa.kelas, 
			t_siswa.sekolah, 
			t_jenis_spp.biaya, 
			t_detail_transaksi_spp.metode_pembayaran, 
			t_detail_transaksi_spp.no_rekening, 
			t_detail_transaksi_spp.pemilik_rekening, 
			t_detail_transaksi_spp.nama_bank, 
			t_detail_transaksi_spp.tgl_bayar,
			t_detail_transaksi_spp.status
			FROM t_detail_transaksi_spp 
			JOIN t_siswa ON t_detail_transaksi_spp.kd_user = t_siswa.kd_user 
			JOIN t_jenis_spp ON t_detail_transaksi_spp.kd_jenis_spp = t_jenis_spp.kd_jenis_spp ORDER BY t_detail_transaksi_spp.kd_transaksi_spp ")->result_array();
	}

	public function kwitansi_tspp($id){
		return $this->db->query("SELECT 
			t_detail_transaksi_spp.kd_transaksi_spp, 
			t_jenis_spp.kd_jenis_spp, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_jenis_spp.biaya, 
			t_detail_transaksi_spp.metode_pembayaran, 
			t_detail_transaksi_spp.tgl_bayar 
			FROM t_detail_transaksi_spp 
			JOIN t_siswa ON t_detail_transaksi_spp.kd_user = t_siswa.kd_user 
			JOIN t_jenis_spp ON t_detail_transaksi_spp.kd_jenis_spp = t_jenis_spp.kd_jenis_spp 
			WHERE t_detail_transaksi_spp.kd_transaksi_spp = '$id'")->row_array();
	}

	public function detail_spp($id){
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
			t_detail_transaksi_spp.status,
			t_detail_transaksi_spp.tgl_bayar FROM t_detail_transaksi_spp 
			JOIN t_siswa ON t_detail_transaksi_spp.kd_user = t_siswa.kd_user 
			JOIN t_jenis_spp ON t_detail_transaksi_spp.kd_jenis_spp = t_jenis_spp.kd_jenis_spp WHERE t_detail_transaksi_spp.kd_transaksi_spp =  '$id'")->row_array();
	}

	public function data_jenis_pendaftaran(){
		return $this->db->query('SELECT * FROM t_jenis_pendaftaran')->result_array();
	}

	public function data_jenis_SPP(){
		return $this->db->query('SELECT * FROM t_jenis_spp')->result_array();
	}

	public function update_dtp(){

		$kd_transaksi_pendaftaran = $this->input->post('kd_transaksi_pendaftaran');

		$nama_bank = $this->input->post('nama_bank');
		$pemilik_rek = $this->input->post('pemilik_rekening');
		$no_rek = $this->input->post('no_rekening');
		$status = $this->input->post('status');

	 	$this->db->query("UPDATE t_detail_transaksi_pendaftaran SET nama_bank = '$nama_bank', pemilik_rekening = '$pemilik_rek', no_rekening = '$no_rek', status = '$status' WHERE kd_transaksi_pendaftaran = '$kd_transaksi_pendaftaran'");
	}

	public function data_transaksi_pendaftaran_bk($kd){
		return $this->db->query("SELECT * FROM t_detail_transaksi_pendaftaran WHERE kd_transaksi_pendaftaran = '$kd'")->row_array();
		// return $this->db->get_where('t_detail_transaksi_pendaftaran', ['kd_transaksi_pendaftaran' => $kd])->
	}

	public function data_transaksi_spp_bk($kd){
		return $this->db->get_where('t_detail_transaksi_spp', ['kd_transaksi_spp' => $kd])->row_array();
	}

	public function update_dtspp(){
		$kd_transaksi_spp = $this->input->post('kd_transaksi_spp');
		
		$bulan = $this->input->post('bulan');
		$nama_bank = $this->input->post('nama_bank');
		$pemilik_rek = $this->input->post('pemilik_rekening');
		$no_rek = $this->input->post('no_rekening');
		$status = $this->input->post('status');	
		
		$this->db->set('bulan', $bulan);
		$this->db->set('nama_bank', $nama_bank);
		$this->db->set('pemilik_rekening', $pemilik_rek);
		$this->db->set('no_rekening', $no_rek);
		$this->db->set('status', $status);

	 	$this->db->where('kd_transaksi_spp', $kd_transaksi_spp);
	 	$this->db->update('t_detail_transaksi_spp');
	}

	public function djp_bk($kd){
		return $this->db->get_where('t_jenis_pendaftaran', ['kd_jenis_pendaftaran' => $kd])->row_array();
	}

	public function update_djp(){
		$kd_jenis_pendaftaran = $this->input->post('kd_jenis_pendaftaran');
		$biaya = $this->input->post('biaya');	
		
		$this->db->set('biaya', $biaya);

	 	$this->db->where('kd_jenis_pendaftaran', $kd_jenis_pendaftaran);
	 	$this->db->update('t_jenis_pendaftaran');
	}

	public function djspp_bk($kd){
		return $this->db->get_where('t_jenis_spp', ['kd_jenis_spp' => $kd])->row_array();
	}

	public function update_djspp(){
		$kd_jenis_spp = $this->input->post('kd_jenis_spp');
		$biaya = $this->input->post('biaya');	
		
		$this->db->set('biaya', $biaya);

	 	$this->db->where('kd_jenis_spp', $kd_jenis_spp);
	 	$this->db->update('t_jenis_spp');
	}

	public function data_siswa_n_djspp($kd){
		return $this->db->query("SELECT t_jenis_spp.kd_jenis_spp, t_jenis_spp.biaya, t_jenis_spp.jenjang, t_siswa.jenjang, t_siswa.nama_lengkap, t_siswa.kd_siswa, t_siswa.kd_user, t_siswa.kelas, t_siswa.sekolah FROM t_jenis_spp JOIN t_siswa ON t_siswa.jenjang = t_jenis_spp.jenjang WHERE t_siswa.kd_siswa = '$kd'")->row_array();
	}

	public function tambah_dtspp(){

		$datatransaksispp = [
        "kd_transaksi_spp" => $this->input->post('kd_transaksi_spp'),
        "kd_jenis_spp" => $this->input->post('kd_jenis_spp'),
        "kd_user" => $this->input->post('kd_user'),
        "tgl_bayar" => date("Y-m-d"),
        "bulan" => $this->input->post('bulan'),
        "metode_pembayaran" => "Non Transfer",
        "nama_bank" => "TIDAK ADA",
        "pemilik_rekening" => "TIDAK ADA",
        "no_rekening" => "TIDAK ADA",
        "file_transfer" => "TIDAK ADA",
        "status" => "diterima"
		];
		$this->db->insert('t_detail_transaksi_spp', $datatransaksispp);
	}

	public function data_siswa_bk($kd){
		return $this->db->get_where('t_siswa', ['kd_siswa' => $kd])->row_array();
	}

	public function update_data_siswa(){
		$kd_siswa = $this->input->post('kd_siswa');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jk = $this->input->post('jk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$agama = $this->input->post('agama');
		$kelas = $this->input->post('kelas');
		$jenjang = $this->input->post('jenjang');
		$sekolah = $this->input->post('sekolah');
		$alamat = $this->input->post('alamat');
		$nama_ayah = $this->input->post('nama_ayah');
		$telp_ayah = $this->input->post('telp_ayah');
		$pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
		$nama_ibu =  $this->input->post('nama_ibu');
		$telp_ibu =  $this->input->post('telp_ibu');
		$pekerjaan_ibu =  $this->input->post('pekerjaan_ibu');
		
		
		$this->db->set('nama_lengkap', $nama_lengkap);
		$this->db->set('jenis_kelamin', $jk);
		$this->db->set('tgl_lahir', $tgl_lahir);
		$this->db->set('tempat_lahir', $tempat_lahir);
		$this->db->set('agama', $agama);
		$this->db->set('jenjang', $jenjang);
		$this->db->set('kelas', $kelas);
		$this->db->set('sekolah', $sekolah);
		$this->db->set('alamat', $alamat);
		$this->db->set('nama_ayah', $nama_ayah);
		$this->db->set('telp_ayah', $telp_ayah);
		$this->db->set('pekerjaan_ayah', $pekerjaan_ayah);
		$this->db->set('nama_ibu', $nama_ibu);
		$this->db->set('telp_ibu', $telp_ibu);
		$this->db->set('pekerjaan_ibu', $pekerjaan_ibu);

	 	$this->db->where('kd_siswa', $kd_siswa);
	 	$this->db->update('t_siswa');
	}

	public function tambah_data_user(){
		
		$data = [
		"kd_user" => $this->input->post('kd_user', true),
        "username" => htmlspecialchars($this->input->post('username', true)),
        "email" => htmlspecialchars($this->input->post('email', true)),
        "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        "token" => "TIDAK ADA",
        "photo" => "default.png",
        "level" => htmlspecialchars($this->input->post('level', true))
		];

		$this->db->insert('t_user', $data);
	}
	
	public function akun($id)
	{
		return $this->db->query("SELECT * FROM t_user WHERE kd_user = '$id'")->row_array();
	}

	public function ganti_password(){
	 	$password_baru = $this->input->post('password_baru');
	 	$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
	 	$this->db->set('password', $password_hash);

	 	$this->db->where('email', $this->session->userdata('email'));
	 	$this->db->update('t_user');
	 }

	 public function rekap_data_ts(){
	 	$bulan = $this->input->post('bulan');
	 	$tahun = $this->input->post('tahun');
	 	return $this->db->query("SELECT 
			t_detail_transaksi_spp.kd_transaksi_spp, 
			t_jenis_spp.kd_jenis_spp, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_siswa.kelas, 
			t_siswa.sekolah, 
			t_jenis_spp.biaya, 
			t_detail_transaksi_spp.metode_pembayaran, 
			t_detail_transaksi_spp.bulan,
			t_detail_transaksi_spp.no_rekening, 
			t_detail_transaksi_spp.pemilik_rekening, 
			t_detail_transaksi_spp.nama_bank, 
			t_detail_transaksi_spp.tgl_bayar, 
			t_detail_transaksi_spp.status
			FROM t_detail_transaksi_spp 
			JOIN t_siswa ON t_detail_transaksi_spp.kd_user = t_siswa.kd_user 
			JOIN t_jenis_spp ON t_detail_transaksi_spp.kd_jenis_spp = t_jenis_spp.kd_jenis_spp WHERE bulan = '$bulan' AND year(tgl_bayar) = '$tahun' ORDER BY t_detail_transaksi_spp.kd_transaksi_spp")->result_array();
	 }

	  public function rekap_data_pendaftaran(){
	 	$bulan = $this->input->post('bulan');
	 	$tahun = $this->input->post('tahun');
	 	// var_dump($tanggal1); var_dump($tanggal2); die;
	 	return $this->db->query("SELECT 
			t_detail_transaksi_pendaftaran.kd_transaksi_pendaftaran, 
			t_jenis_pendaftaran.kd_jenis_pendaftaran, 
			t_siswa.nama_lengkap, 
			t_siswa.kd_siswa, 
			t_siswa.kelas, 
			t_siswa.sekolah, 
			t_jenis_pendaftaran.biaya, 
			t_detail_transaksi_pendaftaran.metode_pembayaran, 
			t_detail_transaksi_pendaftaran.tgl_bayar, 
			t_detail_transaksi_pendaftaran.nama_bank, 
			t_detail_transaksi_pendaftaran.pemilik_rekening, 
			t_detail_transaksi_pendaftaran.no_rekening, 
			t_detail_transaksi_pendaftaran.status
			FROM t_detail_transaksi_pendaftaran 
			JOIN t_siswa ON t_detail_transaksi_pendaftaran.kd_user = t_siswa.kd_user 
			JOIN t_jenis_pendaftaran ON t_detail_transaksi_pendaftaran.kd_jenis_pendaftaran = t_jenis_pendaftaran.kd_jenis_pendaftaran WHERE month(tgl_bayar) = '$bulan' AND year(tgl_bayar) = '$tahun'")->result_array();
	 }
 
 
}