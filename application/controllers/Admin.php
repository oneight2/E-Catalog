<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

		// cimanggis

		$menungguCimanggis = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Menunggu Diproses' AND `pengajuan`.`tempat` = 'Cimanggis'
                
                ");
		$diprosesCimanggis = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Sedang Dikerjakan' AND `pengajuan`.`tempat` = 'Cimanggis'
                
                ");
		$selesaiCimanggis = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Selesai' AND `pengajuan`.`tempat` = 'Cimanggis'
                
                ");

		// Tapos

		$menungguTapos = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Menunggu Diproses' AND `pengajuan`.`tempat` = 'Tapos'
                
                ");
		$diprosesTapos = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Sedang Dikerjakan' AND `pengajuan`.`tempat` = 'Tapos'
                
                ");
		$selesaiTapos = $this->db->query("SELECT * FROM `pengajuan` JOIN `departemen`
                  ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen` WHERE `pengajuan`.`status` = 'Selesai' AND `pengajuan`.`tempat` = 'Tapos'
                
                ");

		// Maintenance

		$menungguPerbaikan = $this->db->query("SELECT * FROM `maintenance` JOIN `departemen`
                  ON `maintenance`.`id_departemen` = `departemen`.`id_departemen` WHERE `maintenance`.`status` = 'Menunggu Diproses' 
                
                ");
		$diprosesPerbaikan = $this->db->query("SELECT * FROM `maintenance` JOIN `departemen`
                  ON `maintenance`.`id_departemen` = `departemen`.`id_departemen` WHERE `maintenance`.`status` = 'Sedang Dikerjakan' 
                
                ");
		$selesaiPerbaikan= $this->db->query("SELECT * FROM `maintenance` JOIN `departemen`
                  ON `maintenance`.`id_departemen` = `departemen`.`id_departemen` WHERE `maintenance`.`status` = 'Selesai' 
                
                ");


		$data['statusMenungguCimanggis'] = $menungguCimanggis->num_rows();
		$data['statusDikerjakanCimanggis'] = $diprosesCimanggis->num_rows();
		$data['statusSelesaiCimanggis'] = $selesaiCimanggis->num_rows();

		$data['statusMenungguTapos'] = $menungguTapos->num_rows();
		$data['statusDikerjakanTapos'] = $diprosesTapos->num_rows();
		$data['statusSelesaiTapos'] = $selesaiTapos->num_rows();

		$data['statusMenungguPerbaikan'] = $menungguPerbaikan->num_rows();
		$data['statusDikerjakanPerbaikan'] = $diprosesPerbaikan->num_rows();
		$data['statusSelesaiPerbaikan'] = $selesaiPerbaikan->num_rows();
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard', $data);
	}

}
