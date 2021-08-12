<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('pengajuan_model', 'pengajuan');
	}


	public function index()
	{
		$data = array(
			'title' => "Multimedia",
			'departemen' => $this->db->get('departemen')->result_array(),
			'jenis_project' => $this->db->get('project')->result_array(),
		);

		$menunggu = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Menunggu Diproses'
                
                ");
		$diproses = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Sedang Dikerjakan'
                
                ");
		$selesai = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Selesai'
                
                ");


		$data['statusMenunggu'] = $menunggu->num_rows();
		$data['statusDikerjakan'] = $diproses->num_rows();
		$data['statusSelesai'] = $selesai->num_rows();
		$data['waktu'] =  date('d/m/Y - H:i');


		$data['pengajuan'] = $this->pengajuan->getPengajuan();
		$data['pengajuan_selesai'] = $this->pengajuan->getPengajuanSelesai();
		$data['kontak'] = $this->pengajuan->getKontak();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/auth_footer', $data);
	}

	public function project()
	{
		$data = array(
			'title' => "Multimedia",
			'departemen' => $this->db->get('departemen')->result_array(),
			'jenis_project' => $this->db->get('project')->result_array(),
		);
		$data['pegawai'] = $this->pengajuan->getKontak();

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('judul_project', 'Nama Project', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Project', 'trim|required');
		$this->form_validation->set_rules('waktu', 'Target Waktu Project', 'trim|required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('pengajuan_project', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$storyboard = $_FILES['storyboard'];

			if ($storyboard = '') {
			} else {
				$config['upload_path'] = './assets/storyboard';
				$config['allowed_types'] = 'pdf|doc|docx|jpg|png';
				$new_name = date('d-m-y') . '_' . $_FILES['storyboard']['name'];
				$config['file_name'] = $new_name;
				// $config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('storyboard')) {
					$storyboard = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}

			$nama = htmlspecialchars($this->input->post('nama', true));
			$id_departemen = htmlspecialchars($this->input->post('departemen', true));
			$id_pegawai = 1;
			$nama_project = htmlspecialchars($this->input->post('judul_project', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$target_project = htmlspecialchars($this->input->post('waktu', true));
			$link = htmlspecialchars($this->input->post('link', true));
			$waktu_pengajuan = date('d/m/Y - H:i');
			$storyboards = $storyboard;
			$tempat = $this->input->post('tempat', true);



			$a = $this->input->post('jenis_project', true);
			// $aa = array_flip($a);
			$id_jenis_project = json_encode($a);


			$this->db->set('nama', $nama);
			$this->db->set('id_departemen', $id_departemen);
			$this->db->set('id_pegawai', $id_pegawai);
			$this->db->set('nama_project', $nama_project);
			$this->db->set('deskripsi', $deskripsi);
			$this->db->set('target_project', $target_project);
			$this->db->set('link', $link);
			$this->db->set('waktu_pengajuan', $waktu_pengajuan);
			$this->db->set('storyboard', $storyboards);
			$this->db->set('id_jenis_project', $id_jenis_project);
			$this->db->set('tempat', $tempat);
			$this->db->insert('pengajuan');



			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih! pengajuan project akan segera kami proses</div>');
			redirect('home');
		}
	}
}
