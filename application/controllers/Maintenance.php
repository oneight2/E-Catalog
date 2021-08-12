<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('maintenance_model', 'pengajuan');
	}


	public function index()
	{
		$data = array(
			'title' => "Multimedia",
			'departemen' => $this->db->get('departemen')->result_array(),
			'jenis_project' => $this->db->get('project')->result_array(),
		);

		$menunggu = $this->db->query("SELECT * FROM `maintenance` JOIN `departemen`
                  ON `maintenance`.`id_departemen` = `departemen`.`id_departemen` WHERE `maintenance`.`status` = 'Menunggu Diproses'
                
                ");
		$diproses = $this->db->query("SELECT * FROM `maintenance` JOIN `departemen`
                  ON `maintenance`.`id_departemen` = `departemen`.`id_departemen` WHERE `maintenance`.`status` = 'Sedang Dikerjakan'
                
                ");
		$selesai = $this->db->query("SELECT * FROM `maintenance` JOIN `departemen`
                  ON `maintenance`.`id_departemen` = `departemen`.`id_departemen` WHERE `maintenance`.`status` = 'Selesai'
                
                ");


		$data['statusMenunggu'] = $menunggu->num_rows();
		$data['statusDikerjakan'] = $diproses->num_rows();
		$data['statusSelesai'] = $selesai->num_rows();
		$data['waktu'] =  date('d/m/Y - H:i');


		$data['pengajuan'] = $this->pengajuan->getPengajuan();
		$data['pengajuan_selesai'] = $this->pengajuan->getPengajuanSelesai();
		$data['kontak'] = $this->pengajuan->getKontak();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('maintenance', $data);
		$this->load->view('templates/auth_footer', $data);
	}

	public function project()
	{
		$data = array(
			'title' => "Multimedia",
			'departemen' => $this->db->get('departemen')->result_array()
		);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nama_perangkat', 'Nama Perangkat', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsikan Kerusakan', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No Whatsapp', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('pengajuan_maintenance', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {

			$nama = htmlspecialchars($this->input->post('nama', true));
			$id_departemen = htmlspecialchars($this->input->post('departemen', true));
			$id_pegawai = 1;
			$nama_perangkat = htmlspecialchars($this->input->post('nama_perangkat', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$no_telp = htmlspecialchars($this->input->post('no_telp', true));
			$urgensitas = $this->input->post('urgensitas', true);
			$waktu_pengajuan = date('d/m/Y - H:i');

			$this->db->set('nama_pengaju', $nama);
			$this->db->set('id_departemen', $id_departemen);
			$this->db->set('id_pegawai', $id_pegawai);
			$this->db->set('nama_perangkat', $nama_perangkat);
			$this->db->set('deskripsi', $deskripsi);
			$this->db->set('no_telp', $no_telp);
			$this->db->set('waktu_pengajuan', $waktu_pengajuan);
			$this->db->set('urgensitas', $urgensitas);
			$this->db->insert('maintenance');



			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih! perbaikan akan segera kami proses</div>');
			redirect('maintenance');
		}
	}
}
