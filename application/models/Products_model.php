<?php
class Products_model extends CI_Model
{

    function product_list()
    {
        $query = "SELECT * FROM `products` JOIN `category` ON `products`.`id_category` = `category`.`id_category` ";
        return $this->db->query($query)->result_array();
    }

    // function save_product(){
    // 	$data = array(
    // 			'nama_departemen' 	=> $this->input->post('nama_departemen'), 
    // 		);
    // 	$result=$this->db->insert('departemen',$data);
    // 	return $result;
    // }

    // function update_product(){
    // 	$id=$this->input->post('id_departemen');
    // 	$nama=$this->input->post('nama_departemen');

    // 	$this->db->set('nama_departemen', $nama);
    // 	$this->db->where('id_departemen', $id);
    // 	$result=$this->db->update('departemen');
    // 	return $result;
    // }

    function delete_product()
    {
        $id_carousel = $this->input->post('id_carousel');
        $img_carousel = $this->input->post('img_carousel');
        unlink('assets/carousel/' . $img_carousel);
        $this->db->where('id', $id_carousel);
        $result = $this->db->delete('carousel');
        return $result;
    }
}
