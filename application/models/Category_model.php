<?php
class Category_model extends CI_Model{

	function product_list(){
		$hasil=$this->db->get('category');
		return $hasil->result();
	}

	function save_product(){
		$data = array(
				'name_category' 	=> $this->input->post('name_category'), 
			);
		$result=$this->db->insert('category',$data);
		return $result;
	}

	function update_product(){
		$id=$this->input->post('id_category');
		$name=$this->input->post('name_category');

		$this->db->set('name_category', $name);
		$this->db->where('id_category', $id);
		$result=$this->db->update('category');
		return $result;
	}

	function delete_product(){
		$id=$this->input->post('id_category');
		$this->db->where('id_category', $id);
		$result=$this->db->delete('category');
		return $result;
		

	}
	
}