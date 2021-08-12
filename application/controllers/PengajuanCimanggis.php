<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengajuanCimanggis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('product_model');
	}
	public function index()
	{
		$data = array(
			'title' => "Admin",
		);

		$menunggu = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Menunggu Diproses' AND `pengajuan`.`tempat` = 'Cimanggis'
                
                ");
		$diproses = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Sedang Dikerjakan' AND `pengajuan`.`tempat` = 'Cimanggis'
                
                ");
		$selesai = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Selesai' AND `pengajuan`.`tempat` = 'Cimanggis'
                
                ");


		$data['statusMenunggu'] = $menunggu->num_rows();
		$data['statusDikerjakan'] = $diproses->num_rows();
		$data['statusSelesai'] = $selesai->num_rows();
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengajuan_cimanggis', $data);
	}

	function product_data(){
		$data=$this->product_model->product_list();
		echo json_encode($data);
	}
	function product_data_selesai(){
		$data=$this->product_model->product_list_selesai();
		echo json_encode($data);
	}

	function save(){
		$data=$this->product_model->save_product();
		echo json_encode($data);
	}

	function update(){
		$data=$this->product_model->update_product();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->product_model->delete_product();
		echo json_encode($data);
	}

	function data_pegawai(){
		$data=$this->product_model->data_pegawai();
		echo json_encode($data);
	}

}
