<?php
class Product_model extends CI_Model
{


	// PENGAJUAN PROJECT CIMANGGIS
	function product_list()
	{

		$hasil = "SELECT * FROM `pengajuan` JOIN `departemen`
					ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen`
					JOIN `pegawai` ON `pengajuan`.`id_pegawai` = `pegawai`.`id_pegawai` WHERE `pengajuan`. `status` != 'Selesai' AND `pengajuan`.`tempat` = 'Cimanggis'
               ";
		return $this->db->query($hasil)->result();
	}

	function product_list_selesai()
	{

		$hasil = "SELECT * FROM `pengajuan` JOIN `departemen`
					ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen`
					JOIN `pegawai` ON `pengajuan`.`id_pegawai` = `pegawai`.`id_pegawai` WHERE `pengajuan`. `status` = 'Selesai' AND `pengajuan`.`tempat` = 'Cimanggis'
               ";
		return $this->db->query($hasil)->result();
	}


	// PENGAJUAN PROJECT TAPOS
	function product_list_tapos()
	{

		$hasil = "SELECT * FROM `pengajuan` JOIN `departemen`
					ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen`
					JOIN `pegawai` ON `pengajuan`.`id_pegawai` = `pegawai`.`id_pegawai` WHERE `pengajuan`. `status` != 'Selesai' AND `pengajuan`.`tempat` = 'Tapos'
               ";
		return $this->db->query($hasil)->result();
	}

	function product_list_selesai_tapos()
	{

		$hasil = "SELECT * FROM `pengajuan` JOIN `departemen`
					ON `pengajuan`.`id_departemen` = `departemen`.`id_departemen`
					JOIN `pegawai` ON `pengajuan`.`id_pegawai` = `pegawai`.`id_pegawai` WHERE `pengajuan`. `status` = 'Selesai' AND `pengajuan`.`tempat` = 'Tapos'
               ";
		return $this->db->query($hasil)->result();
	}



	// MODEL RUD SAMA AJA INI MAH BISA DUA DUANYA
	function save_product()
	{
		$data = array(
			'product_code' 	=> $this->input->post('product_code'),
			'product_name' 	=> $this->input->post('product_name'),
			'product_price' => $this->input->post('price'),
		);
		$result = $this->db->insert('product', $data);
		return $result;
	}

	function update_product()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$id_pegawai = $this->input->post('id_pegawai');

		$this->db->set('status', $status);
		$this->db->set('id_pegawai', $id_pegawai);
		$this->db->where('id', $id);
		$result = $this->db->update('pengajuan');
		return $result;
	}

	function delete_product()
	{
		$id = $this->input->post('id');
		// $storyboard=$this->input->post('storyboard');
		// unlink($storyboard);
		$this->db->where('id', $id);
		$result = $this->db->delete('pengajuan');
		return $result;
	}

	function data_pegawai()
	{

		$hasil = $this->db->get('pegawai');
		return $hasil->result();
	}
}
