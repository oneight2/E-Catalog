<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ADMIN

class AdminMaintenance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('maintenance_model');
	}


	public function index()
	{
		$data = array(
			'title' => "Admin",
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
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('maintenance_admin', $data);
	}

	function product_data(){
		$data=$this->maintenance_model->product_list();
		echo json_encode($data);
	}
	function product_data_selesai(){
		$data=$this->maintenance_model->product_list_selesai();
		echo json_encode($data);
	}

	function save(){
		$data=$this->maintenance_model->save_product();
		echo json_encode($data);
	}

	function update(){
		$data=$this->maintenance_model->update_product();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->maintenance_model->delete_product();
		echo json_encode($data);
	}

	function data_pegawai(){
		$data=$this->maintenance_model->data_pegawai();
		echo json_encode($data);
	}


}
