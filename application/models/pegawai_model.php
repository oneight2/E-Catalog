<?php
class Pegawai_model extends CI_Model{

	function product_list(){
		$hasil=$this->db->get('pegawai');
		return $hasil->result();
	}

	function save_product(){
		$data = array(
				'nama_pegawai' 	=> $this->input->post('nama_pegawai'), 
				'no_telp' => $this->input->post('no_telp'), 
				'foto' => $this->input->post('foto'), 
			);
		$result=$this->db->insert('pegawai',$data);
		return $result;
	}

	function update_product(){
		$id=$this->input->post('id_pegawai');
		$nama=$this->input->post('nama_pegawai');
		$no_telp=$this->input->post('no_telp');
		$foto=$this->input->post('foto');

		$this->db->set('nama_pegawai', $nama);
		$this->db->set('no_telp', $no_telp);
		$this->db->set('foto', $foto);
		$this->db->where('id_pegawai', $id);
		$result=$this->db->update('pegawai');
		return $result;
	}

	function delete_product(){
		$id_pegawai=$this->input->post('id_pegawai');
		// $storyboard=$this->input->post('storyboard');
		// unlink($storyboard);
		$this->db->where('id_pegawai', $id_pegawai);
		$result=$this->db->delete('pegawai');
		return $result;
		

	}
	
}