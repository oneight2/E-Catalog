<?php
class Featured_model extends CI_Model{

	function product_list(){
		$hasil=$this->db->get('featured_products');
		return $hasil->result();
	}

	function save_product(){
		$data = array(
				'name_featured' 	=> $this->input->post('name_featured'), 
			);
		$result=$this->db->insert('featured_products',$data);
		return $result;
	}

	function update_product(){
		$id=$this->input->post('id_featured');
		$name=$this->input->post('name_featured');

		$this->db->set('name_featured', $name);
		$this->db->where('id_featured', $id);
		$result=$this->db->update('featured_Products');
		return $result;
	}

	function delete_product(){
		$id=$this->input->post('id_featured');
		$this->db->where('id_featured', $id);
		$result=$this->db->delete('featured_products');
		return $result;
		

	}
	
}